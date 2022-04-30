<?php
  /**
   * SimpleIPTC: IPTC convenience class (https://github.com/fawno/SimpleIPTC)
   * Copyright (c) Fernando Herrero (https://github.com/alpha)
   *
   * Licensed under The MIT License
   * For full copyright and license information, please see the LICENSE
   * Redistributions of files must retain the above copyright notice.
   *
   * @copyright     Fernando Herrero (https://github.com/alpha)
   * @link          https://github.com/fawno/SimpleIPTC SimpleIPTC
   * @since         0.0.1
   * @license       https://opensource.org/licenses/mit-license.php MIT License
   */
  declare(strict_types=1);

  namespace SimpleIPTC;

  /** @package SimpleIPTC */
  class SimpleIPTC {
    const IPTC_TAGS = [
      '1#000' => [
        'name' => 'EnvelopeRecordVersion',
        'format' => 'n', // int16u big endian
      ],
      '1#020' => [
        'name' => 'FileFormat',
        'format' => 'n', // int16u big endian
      ],
      '1#022' => [
        'name' => 'FileVersion',
        'format' => 'n', // int16u big endian
      ],
      '2#000' => [
        'name' => 'ApplicationRecordVersion',
        'format' => 'n', // int16u big endian
      ],
      '2#055' => [
        'name' => 'DateCreated',
        'format' => 'a*',
      ],
      '2#243' => [
        'name' => 'CustomData',
        'format' => 'a*',
      ],
    ];

    /**
     * @param string $bin
     * @return array
     */
    public static function bin2iptc (string $bin) : array {
      $iptc = [];

      $fp = fopen('php://memory','rb+');
      fwrite ($fp, $bin);
      rewind($fp);

      while ("\x1C" == fread($fp, 1)) {
        $parts = unpack('Crecord/Cid/nlength', fread($fp, 4));

        $tag = sprintf('%u#%03u', $parts['record'], $parts['id']);
        $format = self::IPTC_TAGS[$tag]['format'] ?? 'a*';

        if ($parts['length'] == 0x8004) {
          $parts = unpack('Nlength', fread($fp, 4));
        }

        $iptc[] = [
          'tag' => $tag,
          'name' => self::IPTC_TAGS[$tag]['name'] ?? null,
          'value' => current(unpack($format, fread($fp, $parts['length']))),
        ];
      }

      fclose($fp);

      return $iptc;
    }

    /**
     * @param array $iptc
     * @return string
     */
    public static function iptc2bin (array $iptc) : string {
      $data = '';

      foreach ($iptc as $record) {
        if (!empty($record['value'])) {
          $tag = $record['tag'] ?? null;
          $format = self::IPTC_TAGS[$tag]['format'] ?? 'a*';
          $value = pack($format, $record['value']);
          $length = strlen($value);

          $data .= pack('C*', 0x1C, ...explode('#', $tag));
          $data .= ($length < 0x8000) ? pack('n', $length) : pack('nN', 0x8004, $length);
          $data .= $value;
        } else {
          print_r($record);
        }
      }

      return $data;
    }
  }
