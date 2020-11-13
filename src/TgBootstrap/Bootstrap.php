<?php

namespace TgBootstrap;

/**
 * Provides the free Bootstrap library links.
 */
class Bootstrap {

	/**
	 * Returns the version of this library.
	 * @return string the version number
	 */
	public static function getVersion() {
		$config = file_get_contents(__DIR__.'/../../../../twbs/bootstrap/_config.yml');
		if ($config !== FALSE) {
			$matches = array();
			if (preg_match_all('/current_version:\s*([\\d\\.]+)/', $config, $matches)) {
				return $matches[1][0];
			}
		}
		throw new BootstrapException('Cannot detect Bootstrap version');
	}

    /**
     * Returns the CSS URI from where Bootstrap can be downloaded.
     *
     * @param string $module
     *            - module to return (optional, default is empty)
     * @param boolean $minified
     *            - whether the minified CSS shall be selected (optional, default is TRUE)
     * @return string the URI to the Bootstrap CSS definitions
     */
    public static function getCssUri($module = '', $minified = TRUE) {
        $localPath = realpath(__DIR__.'/../../../../twbs/bootstrap/dist');
        
        $localPath .= '/css/bootstrap'.($module ? '-'.$module : '').($minified ? '.min' : '').'.css';
        if (!file_exists($localPath)) {
            throw new BootstrapException('Unknown CSS module', $localPath);
        }
        
        // Contextualize
        return self::contextualize($localPath);
    }
        
   /**
     * Returns the Javascript URI from where Bootstrap can be downloaded.
     *
     * @param boolean $bundle
     *            - whether to return bundle (optional, default is TRUE)
     * @param boolean $minified
     *            - whether the minified CSS shall be selected (optional, default is TRUE)
     * @return string the URI to the Bootstrap Javascript library
     */
    public static function getJsUri($bundle = TRUE, $minified = TRUE) {
        $localPath = realpath(__DIR__.'/../../../../twbs/bootstrap/dist');
        
        $localPath .= '/js/bootstrap'.($bundle ? '.bundle' : '').($minified ? '.min' : '').'.js';
        if (!file_exists($localPath)) {
            throw new BootstrapException('Unknown Javascript module', $localPath);
        }

        // Contextualize
        return self::contextualize($localPath);
    }
   
    /**
     * Make the local path relative to document root.
     * @param string $localPath - the local path 
     * @return string the relative URL in webserver
     */
    private static function contextualize($localPath) {
		$docRoot = $_SERVER['CONTEXT_DOCUMENT_ROOT'] ? $_SERVER['CONTEXT_DOCUMENT_ROOT'] : $_SERVER['_DOCUMENT_ROOT'];
		$local   = '/';
		if (strpos($localPath, $docRoot) === 0) $local = substr($localPath, strlen($docRoot));
		else throw new BootstrapException('Cannot compute local path', $localPath);
		
		return $local;
    }

    /**
     * Returns the CSS stylesheet HTML tag to be included in HTML.
     *
     * @param string $module
     *            - module to return (optional, default is empty)
     * @param boolean $minified
     *            - whether the minified CSS shall be selected (optional, default is TRUE)
     * @return string the HTML stylesheet tag
     */
    public static function getCssLink($module = '', $minified = TRUE) {
        $uri = self::getCssUri($module, $minified);
        return '<link rel="stylesheet" href="'.$uri.'">';
    }
    
   /**
     * Returns the Javascript stylesheet HTML tag to be included in HTML.
     *
     * @param boolean $bundle
     *            - whether to return bundle (optional, default is TRUE)
     * @param boolean $minified
     *            - whether the minified CSS shall be selected (optional, default is TRUE)
     * @return string the HTML javascript tag
     */
    public static function getJsLink($bundle = TRUE, $minified = TRUE) {
        $uri = self::getJsUri($bundle, $minified);
        return '<script type="text/javascript src="'.$uri.'"></script>';
    }
}
