<?php

/**
 * @copyright	Copyright (C) 2016 Cédric KEIFLIN alias ced1870
 * http://www.joomlack.fr
 * http://www.template-creator.com
 * @license		GNU/GPL
 * */

defined('_JEXEC') or die('Restricted access');

class ImageeffectckHelper {

	private static $effectsList;

	public static $minParamsVersion = '2.0.0';
	/**
	 * 
	 * @param type $version (force to 1 for B/C)
	 * @return type
	 */
	public static function getEffectsList($version = 1) {
//		if (empty(self::$effectsList)) {
			if ($version == 1) {
				// B/C list
				self::$effectsList = array(
					 "effectck-lily"
					,"effectck-oscar" 
					,"effectck-sadie"
					,"effectck-honey"
					,"effectck-layla"
					,"effectck-zoe"
					,"effectck-marley"
					,"effectck-ruby"
					,"effectck-roxy"
					,"effectck-bubba"
					,"effectck-romeo"
					,"effectck-dexter"
					,"effectck-sarah"
					,"effectck-chico"
					,"effectck-milo"
					,"effectck-julia"
					,"effectck-goliath"
					,"effectck-selena"
					,"effectck-apollo"
					,"effectck-steve"
					,"effectck-moses"
					,"effectck-jazz"
					,"effectck-ming"
					,"effectck-duke"
					,"effectck-fadeck"
					,"effectck-edafck"
					,"effectck-puffck"
					);
			} else {
				self::$effectsList = array(
				"lily" => "effectck-lily"
				, "oscar" => "effectck-oscar" 
				, "sadie" => "effectck-sadie"
				, "honey" => "effectck-honey"
				, "layla" => "effectck-layla"
				, "zoe" => "effectck-zoe"
				, "marley" => "effectck-marley"
				, "ruby" => "effectck-ruby"
				, "roxy" => "effectck-roxy"
				, "bubba" => "effectck-bubba"
				, "romeo" => "effectck-romeo"
				, "dexter" => "effectck-dexter"
				, "sarah" => "effectck-sarah"
				, "chico" => "effectck-chico"
				, "milo" => "effectck-milo"
				, "julia" => "effectck-julia"
				, "goliath" => "effectck-goliath"
				, "selena" => "effectck-selena"
				, "apollo" => "effectck-apollo"
				, "steve" => "effectck-steve"
				, "moses" => "effectck-moses"
				, "jazz" => "effectck-jazz"
				, "ming" => "effectck-ming"
				, "duke" => "effectck-duke"
				, "fadeck" => "effectck-fadeck"
				, "edafck" => "effectck-edafck"
				, "puffck" => "effectck-puffck"
				);
			}
			// new feature introduced in V2
			if ($version > 2) {
				if ($override = self::getOverrideList()) {
					if ($override->onlythislist == "true") {
						self::$effectsList = $override->effectscklist;
					} else {
						self::$effectsList = array_merge(self::$effectsList, (array)$override->effectscklist);
					}
				}
				if ($customList = self::getCustomStylesList()) {
					if (JComponentHelper::getParams('com_imageeffectck')->get('customlistonly', '0') == '1') {
						self::$effectsList = $customList;
					} else {
						self::$effectsList = array_merge(self::$effectsList, $customList);
					}
					if (file_exists(JPATH_SITE . '/administrator/components/com_imageeffectck/helpers/imageeffectck.php')) {
						include_once JPATH_SITE . '/administrator/components/com_imageeffectck/helpers/imageeffectck.php';
						ImageeffectckHelper2::loadAssets();
					}
				}
			}
//		}

		return self::$effectsList;
	}

	private static function getOverrideList() {
		$overridelistsrc = JPATH_ROOT . '/templates/' . self::getDefaultTemplate() . '/css/plg_system_imageeffectck/imageeffectck.json';
		if (file_exists($overridelistsrc)) {
			$overridelistjson = @file_get_contents($overridelistsrc);
			if ($overridelistjson) {
				try {
					$tmp = json_decode($overridelistjson);
					return $tmp;
				} catch (Exception $e) {
					echo 'Error when getting the Override list from Image Effect CK : ',  $e->getMessage(), "\n";
				}
			}
		}
		return false;
	}

	// TODO : à intégrer pour récupérer liste des custom styles
	private static function getCustomStylesList() {
		$db = JFactory::getDBO();
		$query = "SELECT id,name FROM #__imageeffectck_styles WHERE state = 1";
		$db->setQuery($query);
		$styles = $db->loadObjectList();
		$list = array();
		foreach ($styles as $style) {
			$list[$style->name] = 'effectck-' . $style->id;
		}
		return $list;
	}

	private static function getDefaultTemplate() {
		$db = JFactory::getDBO();
		$query = "SELECT template FROM #__template_styles WHERE client_id = 0 AND home = 1";
		$db->setQuery($query);
		return $db->loadResult();
	}
}