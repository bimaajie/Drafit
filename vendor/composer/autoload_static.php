<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc66462835e4003b31c2b188d4c89330
{
    public static $files = array (
        '6124b4c8570aa390c21fafd04a26c69f' => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy/deep_copy.php',
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Mpdf\\' => 5,
        ),
        'D' => 
        array (
            'DeepCopy\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Mpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/mpdf/src',
        ),
        'DeepCopy\\' => 
        array (
            0 => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy',
        ),
    );

    public static $classMap = array (
        'FPDF_TPL' => __DIR__ . '/..' . '/setasign/fpdi/fpdf_tpl.php',
        'FPDI' => __DIR__ . '/..' . '/setasign/fpdi/fpdi.php',
        'FilterASCII85' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterASCII85.php',
        'FilterASCIIHexDecode' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterASCIIHexDecode.php',
        'FilterLZW' => __DIR__ . '/..' . '/setasign/fpdi/filters/FilterLZW.php',
        'PdfCrowd' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'PdfcrowdException' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\ConnectionHelper' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\Error' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\HtmlToImageClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\HtmlToPdfClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\ImageToImageClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\ImageToPdfClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'Pdfcrowd\\PdfToPdfClient' => __DIR__ . '/..' . '/pdfcrowd/pdfcrowd/pdfcrowd.php',
        'fpdi_pdf_parser' => __DIR__ . '/..' . '/setasign/fpdi/fpdi_pdf_parser.php',
        'pdf_context' => __DIR__ . '/..' . '/setasign/fpdi/pdf_context.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcc66462835e4003b31c2b188d4c89330::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcc66462835e4003b31c2b188d4c89330::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcc66462835e4003b31c2b188d4c89330::$classMap;

        }, null, ClassLoader::class);
    }
}