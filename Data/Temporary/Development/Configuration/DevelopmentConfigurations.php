<?php return array (
  'Settings' => 
  array (
    'TYPO3' => 
    array (
      'Flow' => 
      array (
        'aop' => 
        array (
          'globalObjects' => 
          array (
            'securityContext' => 'TYPO3\\Flow\\Security\\Context',
          ),
        ),
        'compatibility' => 
        array (
          'uriBuilder' => 
          array (
            'createRelativePaths' => false,
          ),
        ),
        'core' => 
        array (
          'context' => 'Development',
          'phpBinaryPathAndFilename' => '/usr/bin/php',
          'subRequestEnvironmentVariables' => 
          array (
            'XDEBUG_CONFIG' => 'idekey=FLOW_SUBREQUEST remote_port=9001',
          ),
          'subRequestPhpIniPathAndFilename' => NULL,
          'subRequestIniEntries' => 
          array (
          ),
        ),
        'error' => 
        array (
          'exceptionHandler' => 
          array (
            'className' => 'TYPO3\\Flow\\Error\\DebugExceptionHandler',
            'defaultRenderingOptions' => 
            array (
              'renderTechnicalDetails' => true,
              'logException' => true,
            ),
            'renderingGroups' => 
            array (
              'notFoundExceptions' => 
              array (
                'matchingStatusCodes' => 
                array (
                  0 => 404,
                ),
                'options' => 
                array (
                  'logException' => false,
                  'templatePathAndFilename' => 'resource://TYPO3.Flow/Private/Templates/Error/Default.html',
                  'variables' => 
                  array (
                    'errorDescription' => 'Sorry, the page you requested was not found.',
                  ),
                ),
              ),
              'databaseConnectionExceptions' => 
              array (
                'matchingExceptionClassNames' => 
                array (
                  0 => 'TYPO3\\Flow\\Persistence\\Doctrine\\Exception\\DatabaseException',
                ),
                'options' => 
                array (
                  'templatePathAndFilename' => 'resource://TYPO3.Flow/Private/Templates/Error/Default.html',
                  'variables' => 
                  array (
                    'errorDescription' => 'Sorry, the database connection couldn\'t be established.',
                  ),
                ),
              ),
            ),
          ),
          'errorHandler' => 
          array (
            'exceptionalErrors' => 
            array (
              0 => 256,
              1 => 4096,
              2 => 2,
              3 => 8,
              4 => 512,
              5 => 1024,
              6 => 2048,
            ),
          ),
          'debugger' => 
          array (
            'ignoredClasses' => 
            array (
              'TYPO3\\\\Flow\\\\Aop.*' => true,
              'TYPO3\\\\Flow\\\\Cac.*' => true,
              'TYPO3\\\\Flow\\\\Core\\\\.*' => true,
              'TYPO3\\\\Flow\\\\Con.*' => true,
              'TYPO3\\\\Flow\\\\Http\\\\RequestHandler' => true,
              'TYPO3\\\\Flow\\\\Uti.*' => true,
              'TYPO3\\\\Flow\\\\Mvc\\\\Routing.*' => true,
              'TYPO3\\\\Flow\\\\Log.*' => true,
              'TYPO3\\\\Flow\\\\Obj.*' => true,
              'TYPO3\\\\Flow\\\\Pac.*' => true,
              'TYPO3\\\\Flow\\\\Persistence\\\\(?!Doctrine\\\\Mapping).*' => true,
              'TYPO3\\\\Flow\\\\Pro.*' => true,
              'TYPO3\\\\Flow\\\\Ref.*' => true,
              'TYPO3\\\\Flow\\\\Sec.*' => true,
              'TYPO3\\\\Flow\\\\Sig.*' => true,
              'TYPO3\\\\Flow\\\\.*ResourceManager' => true,
              'TYPO3\\\\Fluid\\\\.*' => true,
              '.+Service$' => true,
              '.+Repository$' => true,
              'PHPUnit_Framework_MockObject_InvocationMocker' => true,
            ),
          ),
        ),
        'http' => 
        array (
          'baseUri' => NULL,
          'chain' => 
          array (
            'preprocess' => 
            array (
              'position' => 'before process',
              'chain' => 
              array (
              ),
            ),
            'process' => 
            array (
              'chain' => 
              array (
                'routing' => 
                array (
                  'position' => 'start',
                  'component' => 'TYPO3\\Flow\\Mvc\\Routing\\RoutingComponent',
                ),
                'dispatching' => 
                array (
                  'component' => 'TYPO3\\Flow\\Mvc\\DispatchComponent',
                ),
                'ajaxWidget' => 
                array (
                  'position' => 'before routing',
                  'component' => 'TYPO3\\Fluid\\Core\\Widget\\AjaxWidgetComponent',
                ),
              ),
            ),
            'postprocess' => 
            array (
              'chain' => 
              array (
                'standardsCompliance' => 
                array (
                  'position' => 'end',
                  'component' => 'TYPO3\\Flow\\Http\\Component\\StandardsComplianceComponent',
                ),
              ),
            ),
          ),
        ),
        'log' => 
        array (
          'systemLogger' => 
          array (
            'logger' => 'TYPO3\\Flow\\Log\\Logger',
            'backend' => 'TYPO3\\Flow\\Log\\Backend\\FileBackend',
            'backendOptions' => 
            array (
              'logFileURL' => '/var/www/html/flow-login/Data/Logs/System_Development.log',
              'createParentDirectories' => true,
              'severityThreshold' => 7,
              'maximumLogFileSize' => 10485760,
              'logFilesToKeep' => 1,
              'logMessageOrigin' => false,
            ),
          ),
          'securityLogger' => 
          array (
            'backend' => 'TYPO3\\Flow\\Log\\Backend\\FileBackend',
            'backendOptions' => 
            array (
              'logFileURL' => '/var/www/html/flow-login/Data/Logs/Security_Development.log',
              'createParentDirectories' => true,
              'severityThreshold' => 7,
              'maximumLogFileSize' => 10485760,
              'logFilesToKeep' => 1,
              'logIpAddress' => true,
            ),
          ),
          'sqlLogger' => 
          array (
            'backend' => 'TYPO3\\Flow\\Log\\Backend\\FileBackend',
            'backendOptions' => 
            array (
              'logFileURL' => '/var/www/html/flow-login/Data/Logs/Query_Development.log',
              'createParentDirectories' => true,
              'severityThreshold' => 7,
              'maximumLogFileSize' => 10485760,
              'logFilesToKeep' => 1,
            ),
          ),
          'i18nLogger' => 
          array (
            'backend' => 'TYPO3\\Flow\\Log\\Backend\\FileBackend',
            'backendOptions' => 
            array (
              'logFileURL' => '/var/www/html/flow-login/Data/Logs/I18n_Development.log',
              'createParentDirectories' => true,
              'severityThreshold' => 7,
              'maximumLogFileSize' => 1048576,
              'logFilesToKeep' => 1,
            ),
          ),
        ),
        'i18n' => 
        array (
          'defaultLocale' => 'en',
          'fallbackRule' => 
          array (
            'strict' => false,
            'order' => 
            array (
            ),
          ),
        ),
        'object' => 
        array (
          'registerFunctionalTestClasses' => false,
          'includeClasses' => 
          array (
          ),
        ),
        'package' => 
        array (
          'inactiveByDefault' => 
          array (
            0 => 'Composer.Installers',
          ),
          'packagesPathByType' => 
          array (
            'typo3-flow-package' => 'Application',
            'typo3-flow-framework' => 'Framework',
          ),
        ),
        'persistence' => 
        array (
          'backendOptions' => 
          array (
            'driver' => 'pdo_mysql',
            'host' => '127.0.0.1',
            'dbname' => 'onlineSurvey',
            'user' => 'root',
            'password' => 'skl',
            'charset' => 'utf8',
          ),
          'cacheAllQueryResults' => false,
          'doctrine' => 
          array (
            'enable' => true,
            'sqlLogger' => NULL,
            'filters' => 
            array (
              'Flow_Security_Entity_Filter' => 'TYPO3\\Flow\\Security\\Authorization\\Privilege\\Entity\\Doctrine\\SqlFilter',
            ),
            'dbal' => 
            array (
              'mappingTypes' => 
              array (
                'flow_json_array' => 
                array (
                  'dbType' => 'json_array',
                  'className' => 'TYPO3\\Flow\\Persistence\\Doctrine\\DataTypes\\JsonArrayType',
                ),
                'objectarray' => 
                array (
                  'dbType' => 'array',
                  'className' => 'TYPO3\\Flow\\Persistence\\Doctrine\\DataTypes\\ObjectArray',
                ),
              ),
            ),
            'eventSubscribers' => 
            array (
            ),
            'eventListeners' => 
            array (
            ),
          ),
        ),
        'reflection' => 
        array (
          'ignoredTags' => 
          array (
            'api' => true,
            'package' => true,
            'subpackage' => true,
            'license' => true,
            'copyright' => true,
            'author' => true,
            'const' => true,
            'see' => true,
            'todo' => true,
            'scope' => true,
            'fixme' => true,
            'test' => true,
            'expectedException' => true,
            'expectedExceptionMessage' => true,
            'expectedExceptionCode' => true,
            'depends' => true,
            'dataProvider' => true,
            'group' => true,
            'codeCoverageIgnore' => true,
            'requires' => true,
            'Given' => true,
            'When' => true,
            'Then' => true,
            'BeforeScenario' => true,
            'AfterScenario' => true,
            'fixtures' => true,
            'Isolated' => true,
            'AfterFeature' => true,
            'BeforeFeature' => true,
            'BeforeStep' => true,
            'AfterStep' => true,
            'WithoutSecurityChecks' => true,
            'covers' => true,
          ),
          'logIncorrectDocCommentHints' => false,
        ),
        'resource' => 
        array (
          'storages' => 
          array (
            'defaultPersistentResourcesStorage' => 
            array (
              'storage' => 'TYPO3\\Flow\\Resource\\Storage\\WritableFileSystemStorage',
              'storageOptions' => 
              array (
                'path' => '/var/www/html/flow-login/Data/Persistent/Resources/',
              ),
            ),
            'defaultStaticResourcesStorage' => 
            array (
              'storage' => 'TYPO3\\Flow\\Resource\\Storage\\PackageStorage',
            ),
          ),
          'collections' => 
          array (
            'static' => 
            array (
              'storage' => 'defaultStaticResourcesStorage',
              'target' => 'localWebDirectoryStaticResourcesTarget',
              'pathPatterns' => 
              array (
                0 => '*/Resources/Public/*',
              ),
            ),
            'persistent' => 
            array (
              'storage' => 'defaultPersistentResourcesStorage',
              'target' => 'localWebDirectoryPersistentResourcesTarget',
            ),
          ),
          'targets' => 
          array (
            'localWebDirectoryStaticResourcesTarget' => 
            array (
              'target' => 'TYPO3\\Flow\\Resource\\Target\\FileSystemSymlinkTarget',
              'targetOptions' => 
              array (
                'path' => '/var/www/html/flow-login/Web/_Resources/Static/Packages/',
                'baseUri' => '_Resources/Static/Packages/',
              ),
            ),
            'localWebDirectoryPersistentResourcesTarget' => 
            array (
              'target' => 'TYPO3\\Flow\\Resource\\Target\\FileSystemSymlinkTarget',
              'targetOptions' => 
              array (
                'path' => '/var/www/html/flow-login/Web/_Resources/Persistent/',
                'baseUri' => '_Resources/Persistent/',
                'subdivideHashPathSegment' => false,
              ),
            ),
          ),
        ),
        'security' => 
        array (
          'firewall' => 
          array (
            'rejectAll' => false,
            'filters' => 
            array (
              0 => 
              array (
                'patternType' => 'CsrfProtection',
                'patternValue' => NULL,
                'interceptor' => 'AccessDeny',
              ),
            ),
          ),
          'authentication' => 
          array (
            'providers' => 
            array (
            ),
            'authenticationStrategy' => 'atLeastOneToken',
          ),
          'authorization' => 
          array (
            'allowAccessIfAllVotersAbstain' => false,
          ),
          'csrf' => 
          array (
            'csrfStrategy' => 'onePerSession',
          ),
          'cryptography' => 
          array (
            'hashingStrategies' => 
            array (
              'default' => 'bcrypt',
              'fallback' => 'pbkdf2',
              'pbkdf2' => 'TYPO3\\Flow\\Security\\Cryptography\\Pbkdf2HashingStrategy',
              'bcrypt' => 'TYPO3\\Flow\\Security\\Cryptography\\BCryptHashingStrategy',
              'saltedmd5' => 'TYPO3\\Flow\\Security\\Cryptography\\SaltedMd5HashingStrategy',
            ),
            'Pbkdf2HashingStrategy' => 
            array (
              'dynamicSaltLength' => 8,
              'iterationCount' => 10000,
              'derivedKeyLength' => 64,
              'algorithm' => 'sha256',
            ),
            'BCryptHashingStrategy' => 
            array (
              'cost' => 14,
            ),
            'RSAWalletServicePHP' => 
            array (
              'keystorePath' => '/var/www/html/flow-login/Data/Persistent/RsaWalletData',
              'openSSLConfiguration' => 
              array (
              ),
            ),
          ),
        ),
        'session' => 
        array (
          'inactivityTimeout' => 3600,
          'name' => 'TYPO3_Flow_Session',
          'garbageCollection' => 
          array (
            'probability' => 1,
            'maximumPerRun' => 1000,
          ),
          'cookie' => 
          array (
            'lifetime' => 0,
            'path' => '/',
            'secure' => false,
            'httponly' => true,
            'domain' => NULL,
          ),
        ),
        'utility' => 
        array (
          'environment' => 
          array (
            'temporaryDirectoryBase' => '/var/www/html/flow-login/Data/Temporary/',
          ),
          'lockStrategyClassName' => 'TYPO3\\Flow\\Utility\\Lock\\FlockLockStrategy',
        ),
      ),
      'Fluid' => 
      array (
      ),
      'Eel' => 
      array (
      ),
      'Kickstart' => 
      array (
      ),
      'Welcome' => 
      array (
      ),
    ),
    'doctrine' => 
    array (
      'collections' => 
      array (
      ),
      'inflector' => 
      array (
      ),
      'cache' => 
      array (
      ),
      'lexer' => 
      array (
      ),
      'annotations' => 
      array (
      ),
      'migrations' => 
      array (
      ),
      'instantiator' => 
      array (
      ),
    ),
    'Doctrine' => 
    array (
      'Common' => 
      array (
      ),
      'DBAL' => 
      array (
      ),
      'ORM' => 
      array (
      ),
    ),
    'symfony' => 
    array (
      'console' => 
      array (
      ),
      'yaml' => 
      array (
      ),
      'domcrawler' => 
      array (
      ),
    ),
    'Composer' => 
    array (
      'Installers' => 
      array (
      ),
    ),
    'phpunit' => 
    array (
      'phpfileiterator' => 
      array (
      ),
      'phptokenstream' => 
      array (
      ),
      'phptexttemplate' => 
      array (
      ),
      'phpcodecoverage' => 
      array (
      ),
      'phptimer' => 
      array (
      ),
      'phpunitmockobjects' => 
      array (
      ),
      'phpunit' => 
      array (
      ),
    ),
    'sebastian' => 
    array (
      'environment' => 
      array (
      ),
      'version' => 
      array (
      ),
      'diff' => 
      array (
      ),
      'recursioncontext' => 
      array (
      ),
      'exporter' => 
      array (
      ),
      'comparator' => 
      array (
      ),
      'globalstate' => 
      array (
      ),
    ),
    'phpdocumentor' => 
    array (
      'reflectiondocblock' => 
      array (
      ),
    ),
    'phpspec' => 
    array (
      'prophecy' => 
      array (
      ),
    ),
    'mikey179' => 
    array (
      'vfsStream' => 
      array (
      ),
    ),
    'SKL' => 
    array (
      'Test' => 
      array (
      ),
    ),
  ),
  'Caches' => 
  array (
    'Fluid_TemplateCache' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\PhpFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Default' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\VariableFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
      'backendOptions' => 
      array (
        'defaultLifetime' => 0,
      ),
      'persistent' => false,
    ),
    'Flow_Cache_ResourceFiles' => 
    array (
    ),
    'Flow_Core' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_I18n_AvailableLocalesCache' => 
    array (
    ),
    'Flow_I18n_XmlModelCache' => 
    array (
    ),
    'Flow_I18n_Cldr_CldrModelCache' => 
    array (
    ),
    'Flow_I18n_Cldr_Reader_DatesReaderCache' => 
    array (
    ),
    'Flow_I18n_Cldr_Reader_NumbersReaderCache' => 
    array (
    ),
    'Flow_I18n_Cldr_Reader_PluralsReaderCache' => 
    array (
    ),
    'Flow_Monitor' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
    ),
    'Flow_Mvc_Routing_Route' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Flow_Mvc_Routing_Resolve' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Flow_Mvc_ViewConfigurations' => 
    array (
    ),
    'Flow_Object_Classes' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\PhpFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Object_Configuration' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Persistence_Doctrine' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Persistence_Doctrine_Results' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
      'backendOptions' => 
      array (
        'defaultLifetime' => 60,
      ),
    ),
    'Flow_Reflection_Status' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Reflection_CompiletimeData' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Flow_Reflection_RuntimeData' => 
    array (
    ),
    'Flow_Reflection_RuntimeClassSchemata' => 
    array (
    ),
    'Flow_Resource_Status' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
    ),
    'Flow_Security_Authorization_Privilege_Method' => 
    array (
    ),
    'Flow_Security_Cryptography_RSAWallet' => 
    array (
      'backendOptions' => 
      array (
        'defaultLifetime' => 30,
      ),
    ),
    'Flow_Security_Cryptography_HashService' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\StringFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
      'persistent' => true,
    ),
    'Flow_Session_MetaData' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Flow_Session_Storage' => 
    array (
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\FileBackend',
    ),
    'Flow_Aop_RuntimeExpressions' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\PhpFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
    'Eel_Expression_Code' => 
    array (
      'frontend' => 'TYPO3\\Flow\\Cache\\Frontend\\PhpFrontend',
      'backend' => 'TYPO3\\Flow\\Cache\\Backend\\SimpleFileBackend',
    ),
  ),
  'Routes' => 
  array (
    0 => 
    array (
      'name' => 'Online Question :: Welcome',
      'uriPattern' => '',
      'defaults' => 
      array (
        '@format' => 'html',
        '@package' => 'SKL.Test',
        '@controller' => 'Form',
        '@action' => 'index',
      ),
    ),
    1 => 
    array (
      'name' => 'Online Question :: Form action',
      'uriPattern' => 'forms/{form}',
      'defaults' => 
      array (
        '@format' => 'html',
        '@package' => 'SKL.Test',
        '@controller' => 'Form',
        '@action' => 'show',
      ),
      'routeParts' => 
      array (
        'form' => 
        array (
          'objectType' => 'SKL\\Test\\Domain\\Model\\Form',
          'uriPattern' => '{name}',
        ),
      ),
    ),
    2 => 
    array (
      'name' => 'Welcome :: Welcome screen',
      'uriPattern' => 'flow/welcome',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Welcome',
        '@controller' => 'Standard',
        '@action' => 'index',
        '@format' => 'html',
      ),
    ),
    3 => 
    array (
      'name' => 'Welcome :: Redirect to welcome screen',
      'uriPattern' => '',
      'defaults' => 
      array (
        '@package' => 'TYPO3.Welcome',
        '@controller' => 'Standard',
        '@action' => 'redirect',
        '@format' => 'html',
      ),
    ),
    4 => 
    array (
      'name' => 'Flow :: default with action and format',
      'uriPattern' => '{@package}/{@controller}/{@action}(.{@format})',
      'defaults' => 
      array (
        '@format' => 'html',
      ),
      'appendExceedingArguments' => true,
    ),
    5 => 
    array (
      'name' => 'Flow :: default',
      'uriPattern' => '{@package}/{@controller}(/{@action})',
      'defaults' => 
      array (
        '@format' => 'html',
        '@action' => 'index',
      ),
      'appendExceedingArguments' => true,
    ),
    6 => 
    array (
      'name' => 'Flow :: default with package',
      'uriPattern' => '{@package}',
      'defaults' => 
      array (
        '@format' => 'html',
        '@controller' => 'Standard',
        '@action' => 'index',
      ),
      'appendExceedingArguments' => true,
    ),
    7 => 
    array (
      'name' => 'Flow :: fallback',
      'uriPattern' => '',
      'defaults' => 
      array (
        '@format' => 'html',
        '@package' => 'TYPO3.Flow',
        '@subpackage' => 'Mvc',
        '@controller' => 'Standard',
        '@action' => 'index',
      ),
    ),
  ),
  'Policy' => 
  array (
    'roles' => 
    array (
      'TYPO3.Flow:Everybody' => 
      array (
        'abstract' => true,
      ),
      'TYPO3.Flow:Anonymous' => 
      array (
        'abstract' => true,
      ),
      'TYPO3.Flow:AuthenticatedUser' => 
      array (
        'abstract' => true,
      ),
    ),
  ),
);