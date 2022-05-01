<?php
  declare(strict_types=1);

  namespace SimpleIPTC;

  class IPTCTags {
    protected const IPTC_TAGS = [
      '1#000' => [
        'name' => 'EnvelopeRecordVersion',
        'format' => 'n', // int16u big endian
      ],
      '1#005' => [
        'name' => 'Destination',
        'format' => 'Z*', // string
      ],
      '1#020' => [
        'name' => 'FileFormat',
        'format' => 'n', // int16u big endian
      ],
      '1#022' => [
        'name' => 'FileVersion',
        'format' => 'n', // int16u big endian
      ],
      '1#030' => [
        'name' => 'ServiceIdentifier',
        'format' => 'Z*', // string
      ],
      '1#040' => [
        'name' => 'EnvelopeNumber',
        'format' => 'Z*', // digits
      ],
      '1#050' => [
        'name' => 'ProductID',
        'format' => 'Z*', // string
      ],
      '1#060' => [
        'name' => 'EnvelopePriority',
        'format' => 'Z*', // digits
      ],
      '1#070' => [
        'name' => 'DateSent',
        'format' => 'Z*', // digits
      ],
      '1#080' => [
        'name' => 'TimeSent',
        'format' => 'Z*', // string
      ],
      '1#090' => [
        'name' => 'CodedCharacterSet',
        'format' => 'Z*', // string
      ],
      '1#100' => [
        'name' => 'UniqueObjectName',
        'format' => 'Z*', // string
      ],
      '1#120' => [
        'name' => 'ARMIdentifier',
        'format' => 'n', // int16u big endian
      ],
      '1#122' => [
        'name' => 'ARMVersion',
        'format' => 'n', // int16u big endian
      ],
      '2#000' => [
        'name' => 'ApplicationRecordVersion',
        'format' => 'n', // int16u big endian
      ],
      '2#003' => [
        'name' => 'ObjectTypeReference',
        'format' => 'Z*', // string
      ],
      '2#004' => [
        'name' => 'ObjectAttributeReference',
        'format' => 'Z*', // string
      ],
      '2#005' => [
        'name' => 'ObjectName',
        'format' => 'Z*', // string
      ],
      '2#007' => [
        'name' => 'EditStatus',
        'format' => 'Z*', // string
      ],
      '2#008' => [
        'name' => 'EditorialUpdate',
        'format' => 'Z*', // digits
      ],
      '2#010' => [
        'name' => 'Urgency',
        'format' => 'Z*', // digits
      ],
      '2#012' => [
        'name' => 'SubjectReference',
        'format' => 'Z*', // string
      ],
      '2#015' => [
        'name' => 'Category',
        'format' => 'Z*', // string
      ],
      '2#020' => [
        'name' => 'SupplementalCategories',
        'format' => 'Z*', // string
      ],
      '2#022' => [
        'name' => 'FixtureIdentifier',
        'format' => 'Z*', // string
      ],
      '2#025' => [
        'name' => 'Keywords',
        'format' => 'Z*', // string
      ],
      '2#026' => [
        'name' => 'ContentLocationCode',
        'format' => 'Z*', // string
      ],
      '2#027' => [
        'name' => 'ContentLocationName',
        'format' => 'Z*', // string
      ],
      '2#030' => [
        'name' => 'ReleaseDate',
        'format' => 'Z*', // digits
      ],
      '2#035' => [
        'name' => 'ReleaseTime',
        'format' => 'Z*', // string
      ],
      '2#037' => [
        'name' => 'ExpirationDate',
        'format' => 'Z*', // digits
      ],
      '2#038' => [
        'name' => 'ExpirationTime',
        'format' => 'Z*', // string
      ],
      '2#040' => [
        'name' => 'SpecialInstructions',
        'format' => 'Z*', // string
      ],
      '2#042' => [
        'name' => 'ActionAdvised',
        'format' => 'Z*', // digits
      ],
      '2#045' => [
        'name' => 'ReferenceService',
        'format' => 'Z*', // string
      ],
      '2#047' => [
        'name' => 'ReferenceDate',
        'format' => 'Z*', // digits
      ],
      '2#050' => [
        'name' => 'ReferenceNumber',
        'format' => 'Z*', // digits
      ],
      '2#055' => [
        'name' => 'DateCreated',
        'format' => 'Z*', // digits
      ],
      '2#060' => [
        'name' => 'TimeCreated',
        'format' => 'Z*', // string
      ],
      '2#062' => [
        'name' => 'DigitalCreationDate',
        'format' => 'Z*', // digits
      ],
      '2#063' => [
        'name' => 'DigitalCreationTime',
        'format' => 'Z*', // string
      ],
      '2#065' => [
        'name' => 'OriginatingProgram',
        'format' => 'Z*', // string
      ],
      '2#070' => [
        'name' => 'ProgramVersion',
        'format' => 'Z*', // string
      ],
      '2#075' => [
        'name' => 'ObjectCycle',
        'format' => 'Z*', // string
      ],
      '2#080' => [
        'name' => 'By-line',
        'format' => 'Z*', // string
      ],
      '2#085' => [
        'name' => 'By-lineTitle',
        'format' => 'Z*', // string
      ],
      '2#090' => [
        'name' => 'City',
        'format' => 'Z*', // string
      ],
      '2#092' => [
        'name' => 'Sub-location',
        'format' => 'Z*', // string
      ],
      '2#095' => [
        'name' => 'Province-State',
        'format' => 'Z*', // string
      ],
      '2#100' => [
        'name' => 'Country-PrimaryLocationCode',
        'format' => 'Z*', // string
      ],
      '2#101' => [
        'name' => 'Country-PrimaryLocationName',
        'format' => 'Z*', // string
      ],
      '2#103' => [
        'name' => 'OriginalTransmissionReference',
        'format' => 'Z*', // string
      ],
      '2#105' => [
        'name' => 'Headline',
        'format' => 'Z*', // string
      ],
      '2#110' => [
        'name' => 'Credit',
        'format' => 'Z*', // string
      ],
      '2#115' => [
        'name' => 'Source',
        'format' => 'Z*', // string
      ],
      '2#116' => [
        'name' => 'CopyrightNotice',
        'format' => 'Z*', // string
      ],
      '2#118' => [
        'name' => 'Contact',
        'format' => 'Z*', // string
      ],
      '2#120' => [
        'name' => 'Caption-Abstract',
        'format' => 'Z*', // string
      ],
      '2#121' => [
        'name' => 'LocalCaption',
        'format' => 'Z*', // string
      ],
      '2#122' => [
        'name' => 'Writer-Editor',
        'format' => 'Z*', // string
      ],
      '2#125' => [
        'name' => 'RasterizedCaption',
        'format' => 'Z*', // string
      ],
      '2#130' => [
        'name' => 'ImageType',
        'format' => 'Z*', // string
      ],
      '2#131' => [
        'name' => 'ImageOrientation',
        'format' => 'Z*', // string
      ],
      '2#135' => [
        'name' => 'LanguageIdentifier',
        'format' => 'Z*', // string
      ],
      '2#150' => [
        'name' => 'AudioType',
        'format' => 'Z*', // string
      ],
      '2#151' => [
        'name' => 'AudioSamplingRate',
        'format' => 'Z*', // digits
      ],
      '2#152' => [
        'name' => 'AudioSamplingResolution',
        'format' => 'Z*', // digits
      ],
      '2#153' => [
        'name' => 'AudioDuration',
        'format' => 'Z*', // digits
      ],
      '2#154' => [
        'name' => 'AudioOutcue',
        'format' => 'Z*', // string
      ],
      '2#184' => [
        'name' => 'JobID',
        'format' => 'Z*', // string
      ],
      '2#185' => [
        'name' => 'MasterDocumentID',
        'format' => 'Z*', // string
      ],
      '2#186' => [
        'name' => 'ShortDocumentID',
        'format' => 'Z*', // string
      ],
      '2#187' => [
        'name' => 'UniqueDocumentID',
        'format' => 'Z*', // string
      ],
      '2#188' => [
        'name' => 'OwnerID',
        'format' => 'Z*', // string
      ],
      '2#200' => [
        'name' => 'ObjectPreviewFileFormat',
        'format' => 'n', // int16u big endian
      ],
      '2#201' => [
        'name' => 'ObjectPreviewFileVersion',
        'format' => 'n', // int16u big endian
      ],
      '2#202' => [
        'name' => 'ObjectPreviewData',
        'format' => 'Z*', // string
      ],
      '2#221' => [
        'name' => 'Prefs',
        'format' => 'Z*', // string
      ],
      '2#225' => [
        'name' => 'ClassifyState',
        'format' => 'Z*', // string
      ],
      '2#228' => [
        'name' => 'SimilarityIndex',
        'format' => 'Z*', // string
      ],
      '2#230' => [
        'name' => 'DocumentNotes',
        'format' => 'Z*', // string
      ],
      '2#231' => [
        'name' => 'DocumentHistory',
        'format' => 'Z*', // string
      ],
      '2#232' => [
        'name' => 'ExifCameraInfo',
        'format' => 'Z*', // string
      ],
      '2#243' => [
        'name' => 'CustomData',
        'format' => 'a*',
      ],
      '2#255' => [
        'name' => 'CatalogSets',
        'format' => 'Z*', // string
      ],
      '3#000' => [
        'name' => 'NewsPhotoVersion',
        'format' => 'n', // int16u big endian
      ],
      '3#010' => [
        'name' => 'IPTCPictureNumber',
        'format' => 'Z*', // string
      ],
      '3#020' => [
        'name' => 'IPTCImageWidth',
        'format' => 'n', // int16u big endian
      ],
      '3#030' => [
        'name' => 'IPTCImageHeight',
        'format' => 'n', // int16u big endian
      ],
      '3#040' => [
        'name' => 'IPTCPixelWidth',
        'format' => 'n', // int16u big endian
      ],
      '3#050' => [
        'name' => 'IPTCPixelHeight',
        'format' => 'n', // int16u big endian
      ],
      '3#055' => [
        'name' => 'SupplementalType',
        'format' => 'C', // int8u
      ],
      '3#060' => [
        'name' => 'ColorRepresentation',
        'format' => 'n', // int16u big endian
      ],
      '3#064' => [
        'name' => 'InterchangeColorSpace',
        'format' => 'C', // int8u
      ],
      '3#065' => [
        'name' => 'ColorSequence',
        'format' => 'C', // int8u
      ],
      '3#066' => [
        'name' => 'ICC_Profile',
        'format' => 'a*', // binary or unknow
      ],
      '3#070' => [
        'name' => 'ColorCalibrationMatrix',
        'format' => 'a*', // binary or unknow
      ],
      '3#080' => [
        'name' => 'LookupTable',
        'format' => 'a*', // binary or unknow
      ],
      '3#084' => [
        'name' => 'NumIndexEntries',
        'format' => 'n', // int16u big endian
      ],
      '3#085' => [
        'name' => 'ColorPalette',
        'format' => 'a*', // binary or unknow
      ],
      '3#086' => [
        'name' => 'IPTCBitsPerSample',
        'format' => 'C', // int8u
      ],
      '3#090' => [
        'name' => 'SampleStructure',
        'format' => 'C', // int8u
      ],
      '3#100' => [
        'name' => 'ScanningDirection',
        'format' => 'C', // int8u
      ],
      '3#102' => [
        'name' => 'IPTCImageRotation',
        'format' => 'C', // int8u
      ],
      '3#110' => [
        'name' => 'DataCompressionMethod',
        'format' => 'N', // int32u big endiand
      ],
      '3#120' => [
        'name' => 'QuantizationMethod',
        'format' => 'C', // int8u
      ],
      '3#125' => [
        'name' => 'EndPoints',
        'format' => 'a*', // binary or unknow
      ],
      '3#130' => [
        'name' => 'ExcursionTolerance',
        'format' => 'C', // int8u
      ],
      '3#135' => [
        'name' => 'BitsPerComponent',
        'format' => 'C', // int8u
      ],
      '3#140' => [
        'name' => 'MaximumDensityRange',
        'format' => 'n', // int16u big endian
      ],
      '3#145' => [
        'name' => 'GammaCompensatedValue',
        'format' => 'n', // int16u big endian
      ],
      '7#010' => [
        'name' => 'SizeMode',
        'format' => 'C', // int8u
      ],
      '7#020' => [
        'name' => 'MaxSubfileSize',
        'format' => 'N', // int32u big endiand
      ],
      '7#090' => [
        'name' => 'ObjectSizeAnnounced',
        'format' => 'N', // int32u big endiand
      ],
      '7#095' => [
        'name' => 'MaximumObjectSize',
        'format' => 'N', // int32u big endiand
      ],
      '8#010' => [
        'name' => 'SubFile',
        'format' => 'a*', // binary or unknow
      ],
      '9#010' => [
        'name' => 'ConfirmedObjectSize',
        'format' => 'N', // int32u big endiand
      ],
    ];

    public static function getTagName (string $tag) : string {
      return self::IPTC_TAGS[$tag]['name'] ?? $tag;
    }

    public static function getTagFormat (string $tag) : string {
      return self::IPTC_TAGS[$tag]['format'] ?? 'a*';
    }

    public static function getTagByName (string $name) : ?string {
      $tags = array_combine(array_column(self::IPTC_TAGS, 'name'), array_keys(self::IPTC_TAGS));
      return $tags[$name] ?? null;
    }
  }
