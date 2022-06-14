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

  use SimpleIPTC\IPTCTags;
  use SimpleIPTC\SimpleIPTCException;

  /** @package SimpleIPTC */
  class SimpleIPTC {
    /**
     * @param string $bin
     * @return array
     */
    public static function bin2iptc (string $bin) : array {
      $iptc = [];

      $app13 = unpack('Z13mark/x/a4bim/n2/Nlenght', $bin);
      if (preg_match('~Photoshop \d\.\d~', $app13['mark'])) {
        $start = 26;
        if ('8BIM' == substr($bin, 26 + $app13['lenght'], 4)) {
          $start = 38 + $app13['lenght'];
          $app13 = unpack('a4bim/n2/Nlenght', substr($bin, $start - 12, 12));
        }
        $bin = substr($bin, $start, $app13['lenght']);
      }

      $fp = fopen('php://memory','rb+');
      fwrite ($fp, $bin);
      rewind($fp);

      while (!feof($fp) and "\x1C" == fread($fp, 1)) {
        $parts = unpack('Crecord/Cid/nlength', fread($fp, 4));

        $tag = sprintf('%u#%03u', $parts['record'], $parts['id']);
        $format = IPTCTags::getTagFormat($tag);

        if ($parts['length'] == 0x8004) {
          $parts = unpack('Nlength', fread($fp, 4));
        }

				if ($parts['length'] == 0) {
          continue;
        }

        $bin = fread($fp, $parts['length']);
        if ($bin !== false) {
          $iptc[] = [
            'tag' => $tag,
            'name' => IPTCTags::getTagName($tag),
            'value' => current(unpack($format, $bin)),
          ];
        }
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

      foreach ($iptc as $key => $record) {
        if (!empty($record['value'])) {
          $tag = $record['tag'] ?? $key;
          $value = pack(IPTCTags::getTagFormat($tag), ($record['value'] ?? $record));
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

    public static function getImageIPTC (string $image) : array {
      if (is_file($image)) {
        if (!getimagesize($image, $info)) {
          throw new SimpleIPTCException(sprintf('Error getting info from image file: %s', $image));
        }
      } else {
        if (!getimagesizefromstring($image, $info)) {
          throw new SimpleIPTCException('Error getting info from image string');
        }
      }

      if (empty($info['APP13'])) {
        return [];
      }

      return self::bin2iptc($info['APP13']);
    }

    public static function writeImageIPTC (array $iptc, string $filename) : bool {
      $iptc = SimpleIPTC::iptc2bin($iptc);

      $image = iptcembed($iptc, $filename);

      if ($image === false) {
        throw new SimpleIPTCException('Error embedding binary IPTC data');
      }

      return (bool) file_put_contents($filename, $image);
    }
  }
