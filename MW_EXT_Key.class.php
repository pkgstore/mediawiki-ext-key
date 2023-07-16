<?php

namespace MediaWiki\Extension\PkgStore;

use MWException;
use OutputPage, Parser, PPFrame, Skin;

/**
 * Class MW_EXT_Key
 */
class MW_EXT_Key
{
  /**
   * Register tag function.
   *
   * @param Parser $parser
   *
   * @return void
   * @throws MWException
   */
  public static function onParserFirstCallInit(Parser $parser): void
  {
    $parser->setFunctionHook('key', [__CLASS__, 'onRenderTag'], Parser::SFH_OBJECT_ARGS);
  }

  /**
   * Render tag function.
   *
   * @param Parser $parser
   * @param PPFrame $frame
   * @param array $args
   *
   * @return string
   */
  public static function onRenderTag(Parser $parser, PPFrame $frame, array $args): string
  {
    $outHTML = '';
    $lastArg = end($args);

    foreach ($args as $arg) {
      $key = MW_EXT_Kernel::outClear($frame->expand($arg));

      if ($arg === $lastArg) {
        $plus = '';
      } else {
        $plus = '<span class="mw-key-plus">+</span>';
      }

      $outHTML .= '<kbd class="mw-key navigation-not-searchable">' . $key . '</kbd>' . $plus;
    }

    // Out parser.
    return $outHTML;
  }

  /**
   * Load resource function.
   *
   * @param OutputPage $out
   * @param Skin $skin
   *
   * @return void
   */
  public static function onBeforePageDisplay(OutputPage $out, Skin $skin): void
  {
    $out->addModuleStyles(['ext.mw.key.styles']);
  }
}
