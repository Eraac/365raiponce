<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * appDevDebugProjectContainer.
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class appDevDebugProjectContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $dir = __DIR__;
        for ($i = 1; $i <= 5; ++$i) {
            $this->targetDirs[$i] = $dir = dirname($dir);
        }
        $this->parameters = $this->getDefaultParameters();

        $this->services = array();
        $this->methodMap = array(
            'annotation_reader' => 'getAnnotationReaderService',
            'assets.context' => 'getAssets_ContextService',
            'assets.packages' => 'getAssets_PackagesService',
            'bazinga_hateoas.expression_language' => 'getBazingaHateoas_ExpressionLanguageService',
            'cache.app' => 'getCache_AppService',
            'cache.default_redis_provider' => 'getCache_DefaultRedisProviderService',
            'cache.system' => 'getCache_SystemService',
            'cache_clearer' => 'getCacheClearerService',
            'cache_warmer' => 'getCacheWarmerService',
            'config_cache_factory' => 'getConfigCacheFactoryService',
            'controller_name_converter' => 'getControllerNameConverterService',
            'core.event.listener.extended_view_response' => 'getCore_Event_Listener_ExtendedViewResponseService',
            'core.event.listener.log_request' => 'getCore_Event_Listener_LogRequestService',
            'core.locale_listener' => 'getCore_LocaleListenerService',
            'core.log_request_filter' => 'getCore_LogRequestFilterService',
            'core.log_request_repository' => 'getCore_LogRequestRepositoryService',
            'core.manager.serializer_groups' => 'getCore_Manager_SerializerGroupsService',
            'core.paginator' => 'getCore_PaginatorService',
            'data_collector.dump' => 'getDataCollector_DumpService',
            'data_collector.form' => 'getDataCollector_FormService',
            'data_collector.form.extractor' => 'getDataCollector_Form_ExtractorService',
            'data_collector.request' => 'getDataCollector_RequestService',
            'data_collector.router' => 'getDataCollector_RouterService',
            'data_collector.translation' => 'getDataCollector_TranslationService',
            'debug.argument_resolver' => 'getDebug_ArgumentResolverService',
            'debug.controller_resolver' => 'getDebug_ControllerResolverService',
            'debug.debug_handlers_listener' => 'getDebug_DebugHandlersListenerService',
            'debug.dump_listener' => 'getDebug_DumpListenerService',
            'debug.event_dispatcher' => 'getDebug_EventDispatcherService',
            'debug.security.access.decision_manager' => 'getDebug_Security_Access_DecisionManagerService',
            'debug.stopwatch' => 'getDebug_StopwatchService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.connection_factory' => 'getDoctrine_Dbal_ConnectionFactoryService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.dbal.logger.profiling.default' => 'getDoctrine_Dbal_Logger_Profiling_DefaultService',
            'doctrine.orm.default_entity_listener_resolver' => 'getDoctrine_Orm_DefaultEntityListenerResolverService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'doctrine.orm.default_entity_manager.property_info_extractor' => 'getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService',
            'doctrine.orm.default_listeners.attach_entity_listeners' => 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService',
            'doctrine.orm.default_manager_configurator' => 'getDoctrine_Orm_DefaultManagerConfiguratorService',
            'doctrine.orm.validator.unique' => 'getDoctrine_Orm_Validator_UniqueService',
            'doctrine.orm.validator_initializer' => 'getDoctrine_Orm_ValidatorInitializerService',
            'doctrine_cache.providers.doctrine.orm.default_metadata_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService',
            'doctrine_cache.providers.doctrine.orm.default_query_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService',
            'doctrine_cache.providers.doctrine.orm.default_result_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService',
            'file_locator' => 'getFileLocatorService',
            'filesystem' => 'getFilesystemService',
            'form.factory' => 'getForm_FactoryService',
            'form.registry' => 'getForm_RegistryService',
            'form.resolved_type_factory' => 'getForm_ResolvedTypeFactoryService',
            'form.server_params' => 'getForm_ServerParamsService',
            'form.type.birthday' => 'getForm_Type_BirthdayService',
            'form.type.button' => 'getForm_Type_ButtonService',
            'form.type.checkbox' => 'getForm_Type_CheckboxService',
            'form.type.choice' => 'getForm_Type_ChoiceService',
            'form.type.collection' => 'getForm_Type_CollectionService',
            'form.type.country' => 'getForm_Type_CountryService',
            'form.type.currency' => 'getForm_Type_CurrencyService',
            'form.type.date' => 'getForm_Type_DateService',
            'form.type.datetime' => 'getForm_Type_DatetimeService',
            'form.type.email' => 'getForm_Type_EmailService',
            'form.type.entity' => 'getForm_Type_EntityService',
            'form.type.file' => 'getForm_Type_FileService',
            'form.type.form' => 'getForm_Type_FormService',
            'form.type.hidden' => 'getForm_Type_HiddenService',
            'form.type.integer' => 'getForm_Type_IntegerService',
            'form.type.language' => 'getForm_Type_LanguageService',
            'form.type.locale' => 'getForm_Type_LocaleService',
            'form.type.money' => 'getForm_Type_MoneyService',
            'form.type.number' => 'getForm_Type_NumberService',
            'form.type.password' => 'getForm_Type_PasswordService',
            'form.type.percent' => 'getForm_Type_PercentService',
            'form.type.radio' => 'getForm_Type_RadioService',
            'form.type.range' => 'getForm_Type_RangeService',
            'form.type.repeated' => 'getForm_Type_RepeatedService',
            'form.type.reset' => 'getForm_Type_ResetService',
            'form.type.search' => 'getForm_Type_SearchService',
            'form.type.submit' => 'getForm_Type_SubmitService',
            'form.type.text' => 'getForm_Type_TextService',
            'form.type.textarea' => 'getForm_Type_TextareaService',
            'form.type.time' => 'getForm_Type_TimeService',
            'form.type.timezone' => 'getForm_Type_TimezoneService',
            'form.type.url' => 'getForm_Type_UrlService',
            'form.type_extension.csrf' => 'getForm_TypeExtension_CsrfService',
            'form.type_extension.form.data_collector' => 'getForm_TypeExtension_Form_DataCollectorService',
            'form.type_extension.form.http_foundation' => 'getForm_TypeExtension_Form_HttpFoundationService',
            'form.type_extension.form.validator' => 'getForm_TypeExtension_Form_ValidatorService',
            'form.type_extension.repeated.validator' => 'getForm_TypeExtension_Repeated_ValidatorService',
            'form.type_extension.submit.validator' => 'getForm_TypeExtension_Submit_ValidatorService',
            'form.type_extension.upload.validator' => 'getForm_TypeExtension_Upload_ValidatorService',
            'form.type_guesser.doctrine' => 'getForm_TypeGuesser_DoctrineService',
            'form.type_guesser.validator' => 'getForm_TypeGuesser_ValidatorService',
            'fos_oauth_server.access_token_manager.default' => 'getFosOauthServer_AccessTokenManager_DefaultService',
            'fos_oauth_server.auth_code_manager.default' => 'getFosOauthServer_AuthCodeManager_DefaultService',
            'fos_oauth_server.authorize.form' => 'getFosOauthServer_Authorize_FormService',
            'fos_oauth_server.authorize.form.handler.default' => 'getFosOauthServer_Authorize_Form_Handler_DefaultService',
            'fos_oauth_server.authorize.form.type' => 'getFosOauthServer_Authorize_Form_TypeService',
            'fos_oauth_server.client_manager.default' => 'getFosOauthServer_ClientManager_DefaultService',
            'fos_oauth_server.controller.token' => 'getFosOauthServer_Controller_TokenService',
            'fos_oauth_server.entity_manager' => 'getFosOauthServer_EntityManagerService',
            'fos_oauth_server.refresh_token_manager.default' => 'getFosOauthServer_RefreshTokenManager_DefaultService',
            'fos_oauth_server.server' => 'getFosOauthServer_ServerService',
            'fos_oauth_server.storage' => 'getFosOauthServer_StorageService',
            'fos_rest.body_listener' => 'getFosRest_BodyListenerService',
            'fos_rest.decoder.json' => 'getFosRest_Decoder_JsonService',
            'fos_rest.decoder.jsontoform' => 'getFosRest_Decoder_JsontoformService',
            'fos_rest.decoder.xml' => 'getFosRest_Decoder_XmlService',
            'fos_rest.decoder_provider' => 'getFosRest_DecoderProviderService',
            'fos_rest.inflector' => 'getFosRest_InflectorService',
            'fos_rest.normalizer.camel_keys' => 'getFosRest_Normalizer_CamelKeysService',
            'fos_rest.normalizer.camel_keys_with_leading_underscore' => 'getFosRest_Normalizer_CamelKeysWithLeadingUnderscoreService',
            'fos_rest.request.param_fetcher' => 'getFosRest_Request_ParamFetcherService',
            'fos_rest.request.param_fetcher.reader' => 'getFosRest_Request_ParamFetcher_ReaderService',
            'fos_rest.serializer' => 'getFosRest_SerializerService',
            'fos_rest.serializer.jms_handler_registry' => 'getFosRest_Serializer_JmsHandlerRegistryService',
            'fos_rest.versioning.listener' => 'getFosRest_Versioning_ListenerService',
            'fos_rest.view_handler' => 'getFosRest_ViewHandlerService',
            'fos_rest.view_response_listener' => 'getFosRest_ViewResponseListenerService',
            'fos_user.change_password.form.factory' => 'getFosUser_ChangePassword_Form_FactoryService',
            'fos_user.change_password.form.type' => 'getFosUser_ChangePassword_Form_TypeService',
            'fos_user.listener.authentication' => 'getFosUser_Listener_AuthenticationService',
            'fos_user.listener.flash' => 'getFosUser_Listener_FlashService',
            'fos_user.listener.resetting' => 'getFosUser_Listener_ResettingService',
            'fos_user.profile.form.factory' => 'getFosUser_Profile_Form_FactoryService',
            'fos_user.profile.form.type' => 'getFosUser_Profile_Form_TypeService',
            'fos_user.registration.form.factory' => 'getFosUser_Registration_Form_FactoryService',
            'fos_user.registration.form.type' => 'getFosUser_Registration_Form_TypeService',
            'fos_user.resetting.form.factory' => 'getFosUser_Resetting_Form_FactoryService',
            'fos_user.resetting.form.type' => 'getFosUser_Resetting_Form_TypeService',
            'fos_user.security.interactive_login_listener' => 'getFosUser_Security_InteractiveLoginListenerService',
            'fos_user.security.login_manager' => 'getFosUser_Security_LoginManagerService',
            'fos_user.user_manager' => 'getFosUser_UserManagerService',
            'fos_user.user_provider.username_email' => 'getFosUser_UserProvider_UsernameEmailService',
            'fos_user.username_form_type' => 'getFosUser_UsernameFormTypeService',
            'fos_user.util.canonical_fields_updater' => 'getFosUser_Util_CanonicalFieldsUpdaterService',
            'fos_user.util.email_canonicalizer' => 'getFosUser_Util_EmailCanonicalizerService',
            'fos_user.util.password_updater' => 'getFosUser_Util_PasswordUpdaterService',
            'fos_user.util.token_generator' => 'getFosUser_Util_TokenGeneratorService',
            'fos_user.util.user_manipulator' => 'getFosUser_Util_UserManipulatorService',
            'fragment.handler' => 'getFragment_HandlerService',
            'fragment.listener' => 'getFragment_ListenerService',
            'fragment.renderer.esi' => 'getFragment_Renderer_EsiService',
            'fragment.renderer.hinclude' => 'getFragment_Renderer_HincludeService',
            'fragment.renderer.inline' => 'getFragment_Renderer_InlineService',
            'fragment.renderer.ssi' => 'getFragment_Renderer_SsiService',
            'hateoas.configuration.provider.resolver' => 'getHateoas_Configuration_Provider_ResolverService',
            'hateoas.configuration.relations_repository' => 'getHateoas_Configuration_RelationsRepositoryService',
            'hateoas.embeds_factory' => 'getHateoas_EmbedsFactoryService',
            'hateoas.event_subscriber.json' => 'getHateoas_EventSubscriber_JsonService',
            'hateoas.event_subscriber.xml' => 'getHateoas_EventSubscriber_XmlService',
            'hateoas.expression.evaluator' => 'getHateoas_Expression_EvaluatorService',
            'hateoas.expression.link' => 'getHateoas_Expression_LinkService',
            'hateoas.generator.registry' => 'getHateoas_Generator_RegistryService',
            'hateoas.generator.symfony' => 'getHateoas_Generator_SymfonyService',
            'hateoas.helper.link' => 'getHateoas_Helper_LinkService',
            'hateoas.link_factory' => 'getHateoas_LinkFactoryService',
            'hateoas.links_factory' => 'getHateoas_LinksFactoryService',
            'hateoas.serializer.exclusion_manager' => 'getHateoas_Serializer_ExclusionManagerService',
            'hateoas.twig.link' => 'getHateoas_Twig_LinkService',
            'http_kernel' => 'getHttpKernelService',
            'jms_serializer' => 'getJmsSerializerService',
            'jms_serializer.array_collection_handler' => 'getJmsSerializer_ArrayCollectionHandlerService',
            'jms_serializer.constraint_violation_handler' => 'getJmsSerializer_ConstraintViolationHandlerService',
            'jms_serializer.datetime_handler' => 'getJmsSerializer_DatetimeHandlerService',
            'jms_serializer.doctrine_proxy_subscriber' => 'getJmsSerializer_DoctrineProxySubscriberService',
            'jms_serializer.form_error_handler' => 'getJmsSerializer_FormErrorHandlerService',
            'jms_serializer.handler_registry' => 'getJmsSerializer_HandlerRegistryService',
            'jms_serializer.json_deserialization_visitor' => 'getJmsSerializer_JsonDeserializationVisitorService',
            'jms_serializer.json_serialization_visitor' => 'getJmsSerializer_JsonSerializationVisitorService',
            'jms_serializer.metadata.file_locator' => 'getJmsSerializer_Metadata_FileLocatorService',
            'jms_serializer.metadata_driver' => 'getJmsSerializer_MetadataDriverService',
            'jms_serializer.metadata_factory' => 'getJmsSerializer_MetadataFactoryService',
            'jms_serializer.naming_strategy' => 'getJmsSerializer_NamingStrategyService',
            'jms_serializer.object_constructor' => 'getJmsSerializer_ObjectConstructorService',
            'jms_serializer.php_collection_handler' => 'getJmsSerializer_PhpCollectionHandlerService',
            'jms_serializer.stopwatch_subscriber' => 'getJmsSerializer_StopwatchSubscriberService',
            'jms_serializer.templating.helper.serializer' => 'getJmsSerializer_Templating_Helper_SerializerService',
            'jms_serializer.unserialize_object_constructor' => 'getJmsSerializer_UnserializeObjectConstructorService',
            'jms_serializer.xml_deserialization_visitor' => 'getJmsSerializer_XmlDeserializationVisitorService',
            'jms_serializer.xml_serialization_visitor' => 'getJmsSerializer_XmlSerializationVisitorService',
            'jms_serializer.yaml_serialization_visitor' => 'getJmsSerializer_YamlSerializationVisitorService',
            'kernel' => 'getKernelService',
            'kernel.class_cache.cache_warmer' => 'getKernel_ClassCache_CacheWarmerService',
            'locale_listener' => 'getLocaleListenerService',
            'logger' => 'getLoggerService',
            'monolog.handler.console' => 'getMonolog_Handler_ConsoleService',
            'monolog.handler.debug' => 'getMonolog_Handler_DebugService',
            'monolog.handler.main' => 'getMonolog_Handler_MainService',
            'monolog.logger.cache' => 'getMonolog_Logger_CacheService',
            'monolog.logger.doctrine' => 'getMonolog_Logger_DoctrineService',
            'monolog.logger.event' => 'getMonolog_Logger_EventService',
            'monolog.logger.php' => 'getMonolog_Logger_PhpService',
            'monolog.logger.profiler' => 'getMonolog_Logger_ProfilerService',
            'monolog.logger.request' => 'getMonolog_Logger_RequestService',
            'monolog.logger.router' => 'getMonolog_Logger_RouterService',
            'monolog.logger.security' => 'getMonolog_Logger_SecurityService',
            'monolog.logger.templating' => 'getMonolog_Logger_TemplatingService',
            'monolog.logger.translation' => 'getMonolog_Logger_TranslationService',
            'nelmio_api_doc.doc_comment_extractor' => 'getNelmioApiDoc_DocCommentExtractorService',
            'nelmio_api_doc.event_listener.request' => 'getNelmioApiDoc_EventListener_RequestService',
            'nelmio_api_doc.extractor.api_doc_extractor' => 'getNelmioApiDoc_Extractor_ApiDocExtractorService',
            'nelmio_api_doc.form.extension.description_form_type_extension' => 'getNelmioApiDoc_Form_Extension_DescriptionFormTypeExtensionService',
            'nelmio_api_doc.formatter.html_formatter' => 'getNelmioApiDoc_Formatter_HtmlFormatterService',
            'nelmio_api_doc.formatter.markdown_formatter' => 'getNelmioApiDoc_Formatter_MarkdownFormatterService',
            'nelmio_api_doc.formatter.simple_formatter' => 'getNelmioApiDoc_Formatter_SimpleFormatterService',
            'nelmio_api_doc.formatter.swagger_formatter' => 'getNelmioApiDoc_Formatter_SwaggerFormatterService',
            'nelmio_api_doc.parser.collection_parser' => 'getNelmioApiDoc_Parser_CollectionParserService',
            'nelmio_api_doc.parser.form_errors_parser' => 'getNelmioApiDoc_Parser_FormErrorsParserService',
            'nelmio_api_doc.parser.form_type_parser' => 'getNelmioApiDoc_Parser_FormTypeParserService',
            'nelmio_api_doc.parser.jms_metadata_parser' => 'getNelmioApiDoc_Parser_JmsMetadataParserService',
            'nelmio_api_doc.parser.json_serializable_parser' => 'getNelmioApiDoc_Parser_JsonSerializableParserService',
            'nelmio_api_doc.parser.validation_parser' => 'getNelmioApiDoc_Parser_ValidationParserService',
            'nelmio_api_doc.twig.extension.extra_markdown' => 'getNelmioApiDoc_Twig_Extension_ExtraMarkdownService',
            'nelmio_cors.cors_listener' => 'getNelmioCors_CorsListenerService',
            'nelmio_cors.options_provider.config' => 'getNelmioCors_OptionsProvider_ConfigService',
            'pagerfanta.convert_not_valid_current_page_to_not_found_listener' => 'getPagerfanta_ConvertNotValidCurrentPageToNotFoundListenerService',
            'pagerfanta.convert_not_valid_max_per_page_to_not_found_listener' => 'getPagerfanta_ConvertNotValidMaxPerPageToNotFoundListenerService',
            'profiler' => 'getProfilerService',
            'profiler_listener' => 'getProfilerListenerService',
            'property_accessor' => 'getPropertyAccessorService',
            'request_stack' => 'getRequestStackService',
            'response_listener' => 'getResponseListenerService',
            'router' => 'getRouterService',
            'router.request_context' => 'getRouter_RequestContextService',
            'router_listener' => 'getRouterListenerService',
            'routing.loader' => 'getRouting_LoaderService',
            'security.access_listener' => 'getSecurity_AccessListenerService',
            'security.access_map' => 'getSecurity_AccessMapService',
            'security.authentication.guard_handler' => 'getSecurity_Authentication_GuardHandlerService',
            'security.authentication.manager' => 'getSecurity_Authentication_ManagerService',
            'security.authentication.session_strategy' => 'getSecurity_Authentication_SessionStrategyService',
            'security.authentication.trust_resolver' => 'getSecurity_Authentication_TrustResolverService',
            'security.authentication_utils' => 'getSecurity_AuthenticationUtilsService',
            'security.authorization_checker' => 'getSecurity_AuthorizationCheckerService',
            'security.channel_listener' => 'getSecurity_ChannelListenerService',
            'security.csrf.token_manager' => 'getSecurity_Csrf_TokenManagerService',
            'security.encoder_factory' => 'getSecurity_EncoderFactoryService',
            'security.firewall' => 'getSecurity_FirewallService',
            'security.firewall.map.context.api' => 'getSecurity_Firewall_Map_Context_ApiService',
            'security.firewall.map.context.dev' => 'getSecurity_Firewall_Map_Context_DevService',
            'security.firewall.map.context.oauth_authorize' => 'getSecurity_Firewall_Map_Context_OauthAuthorizeService',
            'security.firewall.map.context.oauth_token' => 'getSecurity_Firewall_Map_Context_OauthTokenService',
            'security.http_utils' => 'getSecurity_HttpUtilsService',
            'security.logout_url_generator' => 'getSecurity_LogoutUrlGeneratorService',
            'security.password_encoder' => 'getSecurity_PasswordEncoderService',
            'security.rememberme.response_listener' => 'getSecurity_Rememberme_ResponseListenerService',
            'security.role_hierarchy' => 'getSecurity_RoleHierarchyService',
            'security.token_storage' => 'getSecurity_TokenStorageService',
            'security.user_checker.oauth_authorize' => 'getSecurity_UserChecker_OauthAuthorizeService',
            'security.validator.user_password' => 'getSecurity_Validator_UserPasswordService',
            'sensio_distribution.security_checker' => 'getSensioDistribution_SecurityCheckerService',
            'sensio_distribution.security_checker.command' => 'getSensioDistribution_SecurityChecker_CommandService',
            'sensio_framework_extra.cache.listener' => 'getSensioFrameworkExtra_Cache_ListenerService',
            'sensio_framework_extra.controller.listener' => 'getSensioFrameworkExtra_Controller_ListenerService',
            'sensio_framework_extra.converter.datetime' => 'getSensioFrameworkExtra_Converter_DatetimeService',
            'sensio_framework_extra.converter.doctrine.orm' => 'getSensioFrameworkExtra_Converter_Doctrine_OrmService',
            'sensio_framework_extra.converter.listener' => 'getSensioFrameworkExtra_Converter_ListenerService',
            'sensio_framework_extra.converter.manager' => 'getSensioFrameworkExtra_Converter_ManagerService',
            'sensio_framework_extra.security.listener' => 'getSensioFrameworkExtra_Security_ListenerService',
            'sensio_framework_extra.view.guesser' => 'getSensioFrameworkExtra_View_GuesserService',
            'sensio_framework_extra.view.listener' => 'getSensioFrameworkExtra_View_ListenerService',
            'service_container' => 'getServiceContainerService',
            'session' => 'getSessionService',
            'session.handler' => 'getSession_HandlerService',
            'session.save_listener' => 'getSession_SaveListenerService',
            'session.storage.filesystem' => 'getSession_Storage_FilesystemService',
            'session.storage.metadata_bag' => 'getSession_Storage_MetadataBagService',
            'session.storage.native' => 'getSession_Storage_NativeService',
            'session.storage.php_bridge' => 'getSession_Storage_PhpBridgeService',
            'session_listener' => 'getSessionListenerService',
            'stof_doctrine_extensions.uploadable.manager' => 'getStofDoctrineExtensions_Uploadable_ManagerService',
            'streamed_response_listener' => 'getStreamedResponseListenerService',
            'swiftmailer.email_sender.listener' => 'getSwiftmailer_EmailSender_ListenerService',
            'swiftmailer.mailer.default' => 'getSwiftmailer_Mailer_DefaultService',
            'swiftmailer.mailer.default.plugin.messagelogger' => 'getSwiftmailer_Mailer_Default_Plugin_MessageloggerService',
            'swiftmailer.mailer.default.spool' => 'getSwiftmailer_Mailer_Default_SpoolService',
            'swiftmailer.mailer.default.transport' => 'getSwiftmailer_Mailer_Default_TransportService',
            'swiftmailer.mailer.default.transport.eventdispatcher' => 'getSwiftmailer_Mailer_Default_Transport_EventdispatcherService',
            'swiftmailer.mailer.default.transport.real' => 'getSwiftmailer_Mailer_Default_Transport_RealService',
            'swiftmailer.plugin.impersonate' => 'getSwiftmailer_Plugin_ImpersonateService',
            'templating' => 'getTemplatingService',
            'templating.filename_parser' => 'getTemplating_FilenameParserService',
            'templating.helper.logout_url' => 'getTemplating_Helper_LogoutUrlService',
            'templating.helper.security' => 'getTemplating_Helper_SecurityService',
            'templating.loader' => 'getTemplating_LoaderService',
            'templating.locator' => 'getTemplating_LocatorService',
            'templating.name_parser' => 'getTemplating_NameParserService',
            'translation.dumper.csv' => 'getTranslation_Dumper_CsvService',
            'translation.dumper.ini' => 'getTranslation_Dumper_IniService',
            'translation.dumper.json' => 'getTranslation_Dumper_JsonService',
            'translation.dumper.mo' => 'getTranslation_Dumper_MoService',
            'translation.dumper.php' => 'getTranslation_Dumper_PhpService',
            'translation.dumper.po' => 'getTranslation_Dumper_PoService',
            'translation.dumper.qt' => 'getTranslation_Dumper_QtService',
            'translation.dumper.res' => 'getTranslation_Dumper_ResService',
            'translation.dumper.xliff' => 'getTranslation_Dumper_XliffService',
            'translation.dumper.yml' => 'getTranslation_Dumper_YmlService',
            'translation.extractor' => 'getTranslation_ExtractorService',
            'translation.extractor.php' => 'getTranslation_Extractor_PhpService',
            'translation.loader' => 'getTranslation_LoaderService',
            'translation.loader.csv' => 'getTranslation_Loader_CsvService',
            'translation.loader.dat' => 'getTranslation_Loader_DatService',
            'translation.loader.ini' => 'getTranslation_Loader_IniService',
            'translation.loader.json' => 'getTranslation_Loader_JsonService',
            'translation.loader.mo' => 'getTranslation_Loader_MoService',
            'translation.loader.php' => 'getTranslation_Loader_PhpService',
            'translation.loader.po' => 'getTranslation_Loader_PoService',
            'translation.loader.qt' => 'getTranslation_Loader_QtService',
            'translation.loader.res' => 'getTranslation_Loader_ResService',
            'translation.loader.xliff' => 'getTranslation_Loader_XliffService',
            'translation.loader.yml' => 'getTranslation_Loader_YmlService',
            'translation.writer' => 'getTranslation_WriterService',
            'translator' => 'getTranslatorService',
            'translator.default' => 'getTranslator_DefaultService',
            'translator_listener' => 'getTranslatorListenerService',
            'twig' => 'getTwigService',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService',
            'twig.controller.preview_error' => 'getTwig_Controller_PreviewErrorService',
            'twig.exception_listener' => 'getTwig_ExceptionListenerService',
            'twig.loader' => 'getTwig_LoaderService',
            'twig.profile' => 'getTwig_ProfileService',
            'twig.translation.extractor' => 'getTwig_Translation_ExtractorService',
            'uri_signer' => 'getUriSignerService',
            'user.command.create_client' => 'getUser_Command_CreateClientService',
            'user.mailer' => 'getUser_MailerService',
            'user.user_edit_admin_type' => 'getUser_UserEditAdminTypeService',
            'user.user_filter' => 'getUser_UserFilterService',
            'user.user_listener' => 'getUser_UserListenerService',
            'user.user_repository' => 'getUser_UserRepositoryService',
            'validate_request_listener' => 'getValidateRequestListenerService',
            'validator' => 'getValidatorService',
            'validator.builder' => 'getValidator_BuilderService',
            'validator.email' => 'getValidator_EmailService',
            'validator.expression' => 'getValidator_ExpressionService',
            'var_dumper.cli_dumper' => 'getVarDumper_CliDumperService',
            'var_dumper.cloner' => 'getVarDumper_ClonerService',
            'web_profiler.controller.exception' => 'getWebProfiler_Controller_ExceptionService',
            'web_profiler.controller.profiler' => 'getWebProfiler_Controller_ProfilerService',
            'web_profiler.controller.router' => 'getWebProfiler_Controller_RouterService',
            'web_profiler.debug_toolbar' => 'getWebProfiler_DebugToolbarService',
            'white_october_pagerfanta.view_factory' => 'getWhiteOctoberPagerfanta_ViewFactoryService',
        );
        $this->aliases = array(
            'console.command.sensiolabs_security_command_securitycheckercommand' => 'sensio_distribution.security_checker.command',
            'console.command.userbundle_command_createclientcommand' => 'user.command.create_client',
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.default_metadata_cache' => 'doctrine_cache.providers.doctrine.orm.default_metadata_cache',
            'doctrine.orm.default_query_cache' => 'doctrine_cache.providers.doctrine.orm.default_query_cache',
            'doctrine.orm.default_result_cache' => 'doctrine_cache.providers.doctrine.orm.default_result_cache',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'event_dispatcher' => 'debug.event_dispatcher',
            'fos_oauth_server.access_token_manager' => 'fos_oauth_server.access_token_manager.default',
            'fos_oauth_server.auth_code_manager' => 'fos_oauth_server.auth_code_manager.default',
            'fos_oauth_server.authorize.form.handler' => 'fos_oauth_server.authorize.form.handler.default',
            'fos_oauth_server.client_manager' => 'fos_oauth_server.client_manager.default',
            'fos_oauth_server.refresh_token_manager' => 'fos_oauth_server.refresh_token_manager.default',
            'fos_rest.router' => 'router',
            'fos_rest.templating' => 'templating',
            'fos_user.mailer' => 'user.mailer',
            'fos_user.util.username_canonicalizer' => 'fos_user.util.email_canonicalizer',
            'mailer' => 'swiftmailer.mailer.default',
            'security.user_checker.api' => 'security.user_checker.oauth_authorize',
            'serializer' => 'jms_serializer',
            'session.storage' => 'session.storage.native',
            'swiftmailer.mailer' => 'swiftmailer.mailer.default',
            'swiftmailer.plugin.messagelogger' => 'swiftmailer.mailer.default.plugin.messagelogger',
            'swiftmailer.spool' => 'swiftmailer.mailer.default.spool',
            'swiftmailer.transport' => 'swiftmailer.mailer.default.transport',
            'swiftmailer.transport.real' => 'swiftmailer.mailer.default.transport.real',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped frozen container.');
    }

    /**
     * {@inheritdoc}
     */
    public function isFrozen()
    {
        return true;
    }

    /**
     * Gets the 'annotation_reader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Common\Annotations\CachedReader A Doctrine\Common\Annotations\CachedReader instance
     */
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\CachedReader(new \Doctrine\Common\Annotations\AnnotationReader(), new \Doctrine\Common\Cache\FilesystemCache((__DIR__.'/annotations')), true);
    }

    /**
     * Gets the 'assets.context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Asset\Context\RequestStackContext A Symfony\Component\Asset\Context\RequestStackContext instance
     */
    protected function getAssets_ContextService()
    {
        return $this->services['assets.context'] = new \Symfony\Component\Asset\Context\RequestStackContext($this->get('request_stack'));
    }

    /**
     * Gets the 'assets.packages' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Asset\Packages A Symfony\Component\Asset\Packages instance
     */
    protected function getAssets_PackagesService()
    {
        return $this->services['assets.packages'] = new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', new \Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy(), $this->get('assets.context')), array());
    }

    /**
     * Gets the 'bazinga_hateoas.expression_language' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Bazinga\Bundle\HateoasBundle\ExpressionLanguage\ExpressionLanguage A Bazinga\Bundle\HateoasBundle\ExpressionLanguage\ExpressionLanguage instance
     */
    protected function getBazingaHateoas_ExpressionLanguageService()
    {
        return $this->services['bazinga_hateoas.expression_language'] = new \Bazinga\Bundle\HateoasBundle\ExpressionLanguage\ExpressionLanguage();
    }

    /**
     * Gets the 'cache.app' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Cache\Adapter\FilesystemAdapter A Symfony\Component\Cache\Adapter\FilesystemAdapter instance
     */
    protected function getCache_AppService()
    {
        $this->services['cache.app'] = $instance = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('LqPhGuKGzq', 0, (__DIR__.'/pools'));

        if ($this->has('monolog.logger.cache')) {
            $instance->setLogger($this->get('monolog.logger.cache', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }

        return $instance;
    }

    /**
     * Gets the 'cache.default_redis_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Redis A Redis instance
     */
    protected function getCache_DefaultRedisProviderService()
    {
        return $this->services['cache.default_redis_provider'] = \Symfony\Component\Cache\Adapter\RedisAdapter::createConnection('redis://localhost');
    }

    /**
     * Gets the 'cache.system' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface A Symfony\Component\Cache\Adapter\AdapterInterface instance
     */
    protected function getCache_SystemService()
    {
        return $this->services['cache.system'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('OkxxGw7frW', 0, 'jLafE4eUmM1k59F2gPA4EA', (__DIR__.'/pools'), $this->get('monolog.logger.cache', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'cache_clearer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer A Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer instance
     */
    protected function getCacheClearerService()
    {
        $a = $this->get('monolog.logger.cache', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        $b = new \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer();
        $b->addPool($this->get('cache.app'));
        $b->addPool($this->get('cache.system'));
        $b->addPool(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('V39gSgcFUU', 0, 'jLafE4eUmM1k59F2gPA4EA', (__DIR__.'/pools'), $a));
        $b->addPool(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('mQmryZGCiz', 0, 'jLafE4eUmM1k59F2gPA4EA', (__DIR__.'/pools'), $a));

        return $this->services['cache_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer(array(0 => $b));
    }

    /**
     * Gets the 'cache_warmer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate A Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate instance
     */
    protected function getCacheWarmerService()
    {
        $a = $this->get('kernel');
        $b = $this->get('templating.filename_parser');

        $c = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplateFinder($a, $b, ($this->targetDirs[3].'/app/Resources'));

        return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(array(0 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplatePathsCacheWarmer($c, $this->get('templating.locator')), 1 => $this->get('kernel.class_cache.cache_warmer'), 2 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TranslationsCacheWarmer($this->get('translator.default')), 3 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer($this->get('router')), 4 => new \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheCacheWarmer($this, $c, array()), 5 => new \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheWarmer($this->get('twig'), new \Symfony\Bundle\TwigBundle\TemplateIterator($a, ($this->targetDirs[3].'/app'), array())), 6 => new \Symfony\Bridge\Doctrine\CacheWarmer\ProxyCacheWarmer($this->get('doctrine'))));
    }

    /**
     * Gets the 'config_cache_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Config\ResourceCheckerConfigCacheFactory A Symfony\Component\Config\ResourceCheckerConfigCacheFactory instance
     */
    protected function getConfigCacheFactoryService()
    {
        return $this->services['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(array(0 => new \Symfony\Component\Config\Resource\SelfCheckingResourceChecker()));
    }

    /**
     * Gets the 'core.event.listener.extended_view_response' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \CoreBundle\EventListener\ExtendedViewResponseListener A CoreBundle\EventListener\ExtendedViewResponseListener instance
     */
    protected function getCore_Event_Listener_ExtendedViewResponseService()
    {
        return $this->services['core.event.listener.extended_view_response'] = new \CoreBundle\EventListener\ExtendedViewResponseListener($this->get('security.authorization_checker'), $this->get('core.manager.serializer_groups'));
    }

    /**
     * Gets the 'core.event.listener.log_request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \CoreBundle\EventListener\LogRequestListener A CoreBundle\EventListener\LogRequestListener instance
     */
    protected function getCore_Event_Listener_LogRequestService()
    {
        return $this->services['core.event.listener.log_request'] = new \CoreBundle\EventListener\LogRequestListener($this->get('logger'), $this->get('security.token_storage'), $this->get('doctrine.orm.default_entity_manager'), true);
    }

    /**
     * Gets the 'core.locale_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \CoreBundle\EventListener\LocaleListener A CoreBundle\EventListener\LocaleListener instance
     */
    protected function getCore_LocaleListenerService()
    {
        return $this->services['core.locale_listener'] = new \CoreBundle\EventListener\LocaleListener('en');
    }

    /**
     * Gets the 'core.log_request_filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \CoreBundle\Filter\LogRequestFilter A CoreBundle\Filter\LogRequestFilter instance
     */
    protected function getCore_LogRequestFilterService()
    {
        return $this->services['core.log_request_filter'] = new \CoreBundle\Filter\LogRequestFilter($this->get('translator.default'), $this->get('core.log_request_repository'));
    }

    /**
     * Gets the 'core.log_request_repository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\ORM\EntityRepository A Doctrine\ORM\EntityRepository instance
     */
    protected function getCore_LogRequestRepositoryService()
    {
        return $this->services['core.log_request_repository'] = $this->get('doctrine.orm.default_entity_manager')->getRepository('CoreBundle:LogRequest');
    }

    /**
     * Gets the 'core.manager.serializer_groups' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \CoreBundle\Service\SerializerGroupsManager A CoreBundle\Service\SerializerGroupsManager instance
     */
    protected function getCore_Manager_SerializerGroupsService()
    {
        return $this->services['core.manager.serializer_groups'] = new \CoreBundle\Service\SerializerGroupsManager($this->get('request_stack'));
    }

    /**
     * Gets the 'core.paginator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \CoreBundle\Service\Paginator A CoreBundle\Service\Paginator instance
     */
    protected function getCore_PaginatorService()
    {
        return $this->services['core.paginator'] = new \CoreBundle\Service\Paginator();
    }

    /**
     * Gets the 'data_collector.dump' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector A Symfony\Component\HttpKernel\DataCollector\DumpDataCollector instance
     */
    protected function getDataCollector_DumpService()
    {
        return $this->services['data_collector.dump'] = new \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector($this->get('debug.stopwatch', ContainerInterface::NULL_ON_INVALID_REFERENCE), NULL, 'UTF-8', $this->get('request_stack'), NULL);
    }

    /**
     * Gets the 'data_collector.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataCollector A Symfony\Component\Form\Extension\DataCollector\FormDataCollector instance
     */
    protected function getDataCollector_FormService()
    {
        return $this->services['data_collector.form'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataCollector($this->get('data_collector.form.extractor'));
    }

    /**
     * Gets the 'data_collector.form.extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor A Symfony\Component\Form\Extension\DataCollector\FormDataExtractor instance
     */
    protected function getDataCollector_Form_ExtractorService()
    {
        return $this->services['data_collector.form.extractor'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor();
    }

    /**
     * Gets the 'data_collector.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector A Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector instance
     */
    protected function getDataCollector_RequestService()
    {
        return $this->services['data_collector.request'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RequestDataCollector();
    }

    /**
     * Gets the 'data_collector.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector A Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector instance
     */
    protected function getDataCollector_RouterService()
    {
        return $this->services['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector();
    }

    /**
     * Gets the 'data_collector.translation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\DataCollector\TranslationDataCollector A Symfony\Component\Translation\DataCollector\TranslationDataCollector instance
     */
    protected function getDataCollector_TranslationService()
    {
        return $this->services['data_collector.translation'] = new \Symfony\Component\Translation\DataCollector\TranslationDataCollector($this->get('translator'));
    }

    /**
     * Gets the 'debug.argument_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver A Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver instance
     */
    protected function getDebug_ArgumentResolverService()
    {
        return $this->services['debug.argument_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver(new \Symfony\Component\HttpKernel\Controller\ArgumentResolver(new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory(), array(0 => new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver(), 1 => new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver(), 2 => new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver(), 3 => new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver())), $this->get('debug.stopwatch'));
    }

    /**
     * Gets the 'debug.controller_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver A Symfony\Component\HttpKernel\Controller\TraceableControllerResolver instance
     */
    protected function getDebug_ControllerResolverService()
    {
        return $this->services['debug.controller_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver(new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, $this->get('controller_name_converter'), $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE)), $this->get('debug.stopwatch'), $this->get('debug.argument_resolver'));
    }

    /**
     * Gets the 'debug.debug_handlers_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener A Symfony\Component\HttpKernel\EventListener\DebugHandlersListener instance
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        return $this->services['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, $this->get('monolog.logger.php', ContainerInterface::NULL_ON_INVALID_REFERENCE), 28586, NULL, true, NULL);
    }

    /**
     * Gets the 'debug.dump_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DumpListener A Symfony\Component\HttpKernel\EventListener\DumpListener instance
     */
    protected function getDebug_DumpListenerService()
    {
        return $this->services['debug.dump_listener'] = new \Symfony\Component\HttpKernel\EventListener\DumpListener($this->get('var_dumper.cloner'), $this->get('var_dumper.cli_dumper'));
    }

    /**
     * Gets the 'debug.event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher A Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher instance
     */
    protected function getDebug_EventDispatcherService()
    {
        $this->services['debug.event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this), $this->get('debug.stopwatch'), $this->get('monolog.logger.event', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        $instance->addListenerService('kernel.view', array(0 => 'core.event.listener.extended_view_response', 1 => 'onKernelView'), 101);
        $instance->addListenerService('kernel.terminate', array(0 => 'core.event.listener.log_request', 1 => 'onKernelTerminate'), -255);
        $instance->addListenerService('kernel.request', array(0 => 'core.locale_listener', 1 => 'onKernelRequest'), 16);
        $instance->addListenerService('kernel.controller', array(0 => 'data_collector.router', 1 => 'onKernelController'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'fos_rest.body_listener', 1 => 'onKernelRequest'), 10);
        $instance->addListenerService('kernel.request', array(0 => 'fos_rest.versioning.listener', 1 => 'onKernelRequest'), 33);
        $instance->addListenerService('kernel.request', array(0 => 'nelmio_api_doc.event_listener.request', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'nelmio_cors.cors_listener', 1 => 'onKernelRequest'), 10000);
        $instance->addSubscriberService('response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener');
        $instance->addSubscriberService('streamed_response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener');
        $instance->addSubscriberService('locale_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener');
        $instance->addSubscriberService('translator_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\TranslatorListener');
        $instance->addSubscriberService('validate_request_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ValidateRequestListener');
        $instance->addSubscriberService('session_listener', 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener');
        $instance->addSubscriberService('session.save_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\SaveSessionListener');
        $instance->addSubscriberService('fragment.listener', 'Symfony\\Component\\HttpKernel\\EventListener\\FragmentListener');
        $instance->addSubscriberService('profiler_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ProfilerListener');
        $instance->addSubscriberService('data_collector.request', 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\RequestDataCollector');
        $instance->addSubscriberService('router_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');
        $instance->addSubscriberService('debug.debug_handlers_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\DebugHandlersListener');
        $instance->addSubscriberService('security.firewall', 'Symfony\\Component\\Security\\Http\\Firewall');
        $instance->addSubscriberService('security.rememberme.response_listener', 'Symfony\\Component\\Security\\Http\\RememberMe\\ResponseListener');
        $instance->addSubscriberService('twig.exception_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ExceptionListener');
        $instance->addSubscriberService('monolog.handler.console', 'Symfony\\Bridge\\Monolog\\Handler\\ConsoleHandler');
        $instance->addSubscriberService('swiftmailer.email_sender.listener', 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener');
        $instance->addSubscriberService('sensio_framework_extra.controller.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener');
        $instance->addSubscriberService('sensio_framework_extra.converter.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener');
        $instance->addSubscriberService('sensio_framework_extra.view.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener');
        $instance->addSubscriberService('sensio_framework_extra.cache.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\HttpCacheListener');
        $instance->addSubscriberService('sensio_framework_extra.security.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\SecurityListener');
        $instance->addSubscriberService('fos_user.security.interactive_login_listener', 'FOS\\UserBundle\\EventListener\\LastLoginListener');
        $instance->addSubscriberService('fos_user.listener.authentication', 'FOS\\UserBundle\\EventListener\\AuthenticationListener');
        $instance->addSubscriberService('fos_user.listener.flash', 'FOS\\UserBundle\\EventListener\\FlashListener');
        $instance->addSubscriberService('fos_user.listener.resetting', 'FOS\\UserBundle\\EventListener\\ResettingListener');
        $instance->addSubscriberService('fos_rest.view_response_listener', 'FOS\\RestBundle\\EventListener\\ViewResponseListener');
        $instance->addSubscriberService('pagerfanta.convert_not_valid_max_per_page_to_not_found_listener', 'WhiteOctober\\PagerfantaBundle\\EventListener\\ConvertNotValidMaxPerPageToNotFoundListener');
        $instance->addSubscriberService('pagerfanta.convert_not_valid_current_page_to_not_found_listener', 'WhiteOctober\\PagerfantaBundle\\EventListener\\ConvertNotValidCurrentPageToNotFoundListener');
        $instance->addSubscriberService('debug.dump_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\DumpListener');
        $instance->addSubscriberService('web_profiler.debug_toolbar', 'Symfony\\Bundle\\WebProfilerBundle\\EventListener\\WebDebugToolbarListener');

        return $instance;
    }

    /**
     * Gets the 'debug.stopwatch' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Stopwatch\Stopwatch A Symfony\Component\Stopwatch\Stopwatch instance
     */
    protected function getDebug_StopwatchService()
    {
        return $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch();
    }

    /**
     * Gets the 'doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry A Doctrine\Bundle\DoctrineBundle\Registry instance
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, array('default' => 'doctrine.dbal.default_connection'), array('default' => 'doctrine.orm.default_entity_manager'), 'default', 'default');
    }

    /**
     * Gets the 'doctrine.dbal.connection_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ConnectionFactory A Doctrine\Bundle\DoctrineBundle\ConnectionFactory instance
     */
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory(array());
    }

    /**
     * Gets the 'doctrine.dbal.default_connection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\DBAL\Connection A Doctrine\DBAL\Connection instance
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Logging\LoggerChain();
        $a->addLogger(new \Symfony\Bridge\Doctrine\Logger\DbalLogger($this->get('monolog.logger.doctrine', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('debug.stopwatch', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $a->addLogger($this->get('doctrine.dbal.logger.profiling.default'));

        $b = new \Doctrine\DBAL\Configuration();
        $b->setSQLLogger($a);

        $c = new \Gedmo\Timestampable\TimestampableListener();
        $c->setAnnotationReader($this->get('annotation_reader'));

        $d = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $d->addEventSubscriber($c);
        $d->addEventSubscriber(new \FOS\UserBundle\Doctrine\UserListener($this->get('fos_user.util.password_updater'), $this->get('fos_user.util.canonical_fields_updater')));
        $d->addEventListener(array(0 => 'loadClassMetadata'), $this->get('doctrine.orm.default_listeners.attach_entity_listeners'));

        return $this->services['doctrine.dbal.default_connection'] = $this->get('doctrine.dbal.connection_factory')->createConnection(array('driver' => 'pdo_mysql', 'host' => '127.0.0.1', 'port' => NULL, 'dbname' => 'rest', 'user' => 'rest', 'password' => 'Ium2F2CZHMdEj7OP8L5mcT1xfawNc2dt', 'charset' => 'UTF8', 'driverOptions' => array(), 'serverVersion' => 5.5999999999999996, 'defaultTableOptions' => array()), $b, $d, array('enum' => 'string'));
    }

    /**
     * Gets the 'doctrine.orm.default_entity_listener_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\ORM\Mapping\DefaultEntityListenerResolver A Doctrine\ORM\Mapping\DefaultEntityListenerResolver instance
     */
    protected function getDoctrine_Orm_DefaultEntityListenerResolverService()
    {
        $this->services['doctrine.orm.default_entity_listener_resolver'] = $instance = new \Doctrine\ORM\Mapping\DefaultEntityListenerResolver();

        $instance->register($this->get('user.user_listener'));

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.default_entity_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @param bool    $lazyLoad whether to try lazy-loading the service with a proxy
     *
     * @return \Doctrine\ORM\EntityManager A Doctrine\ORM\EntityManager instance
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService($lazyLoad = true)
    {
        $a = $this->get('annotation_reader');

        $b = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($a, array(0 => ($this->targetDirs[3].'/src/UserBundle/Entity'), 1 => ($this->targetDirs[3].'/src/CoreBundle/Entity')));

        $c = new \Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver(array(($this->targetDirs[3].'/vendor/friendsofsymfony/oauth-server-bundle/Resources/config/doctrine') => 'FOS\\OAuthServerBundle\\Entity'));
        $c->setGlobalBasename('mapping');

        $d = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();
        $d->addDriver($b, 'UserBundle\\Entity');
        $d->addDriver($b, 'CoreBundle\\Entity');
        $d->addDriver($c, 'FOS\\OAuthServerBundle\\Entity');
        $d->addDriver(new \Doctrine\ORM\Mapping\Driver\XmlDriver(new \Doctrine\Common\Persistence\Mapping\Driver\SymfonyFileLocator(array(($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/config/doctrine-mapping') => 'FOS\\UserBundle\\Model'), '.orm.xml')), 'FOS\\UserBundle\\Model');

        $e = new \Doctrine\ORM\Configuration();
        $e->setEntityNamespaces(array('UserBundle' => 'UserBundle\\Entity', 'CoreBundle' => 'CoreBundle\\Entity', 'FOSOAuthServerBundle' => 'FOS\\OAuthServerBundle\\Entity'));
        $e->setMetadataCacheImpl($this->get('doctrine_cache.providers.doctrine.orm.default_metadata_cache'));
        $e->setQueryCacheImpl($this->get('doctrine_cache.providers.doctrine.orm.default_query_cache'));
        $e->setResultCacheImpl($this->get('doctrine_cache.providers.doctrine.orm.default_result_cache'));
        $e->setMetadataDriverImpl($d);
        $e->setProxyDir((__DIR__.'/doctrine/orm/Proxies'));
        $e->setProxyNamespace('Proxies');
        $e->setAutoGenerateProxyClasses(true);
        $e->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $e->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $e->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy());
        $e->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $e->setEntityListenerResolver($this->get('doctrine.orm.default_entity_listener_resolver'));

        $this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create($this->get('doctrine.dbal.default_connection'), $e);

        $this->get('doctrine.orm.default_manager_configurator')->configure($instance);

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.default_entity_manager.property_info_extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor A Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor instance
     */
    protected function getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService()
    {
        return $this->services['doctrine.orm.default_entity_manager.property_info_extractor'] = new \Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor($this->get('doctrine.orm.default_entity_manager')->getMetadataFactory());
    }

    /**
     * Gets the 'doctrine.orm.default_listeners.attach_entity_listeners' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\ORM\Tools\AttachEntityListenersListener A Doctrine\ORM\Tools\AttachEntityListenersListener instance
     */
    protected function getDoctrine_Orm_DefaultListeners_AttachEntityListenersService()
    {
        $this->services['doctrine.orm.default_listeners.attach_entity_listeners'] = $instance = new \Doctrine\ORM\Tools\AttachEntityListenersListener();

        $instance->addEntityListener('UserBundle\\Entity\\User', 'UserBundle\\EventListener\\UserListener', 'prePersist', 'prePersistHandler');

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.default_manager_configurator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator A Doctrine\Bundle\DoctrineBundle\ManagerConfigurator instance
     */
    protected function getDoctrine_Orm_DefaultManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array());
    }

    /**
     * Gets the 'doctrine.orm.validator.unique' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator A Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator instance
     */
    protected function getDoctrine_Orm_Validator_UniqueService()
    {
        return $this->services['doctrine.orm.validator.unique'] = new \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator($this->get('doctrine'));
    }

    /**
     * Gets the 'doctrine.orm.validator_initializer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer A Symfony\Bridge\Doctrine\Validator\DoctrineInitializer instance
     */
    protected function getDoctrine_Orm_ValidatorInitializerService()
    {
        return $this->services['doctrine.orm.validator_initializer'] = new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer($this->get('doctrine'));
    }

    /**
     * Gets the 'doctrine_cache.providers.doctrine.orm.default_metadata_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache A Doctrine\Common\Cache\ArrayCache instance
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf2orm_default_391683847fb92bacd8dd4a9ac15b206165d4915e504026aa11441f1a71c7b769');

        return $instance;
    }

    /**
     * Gets the 'doctrine_cache.providers.doctrine.orm.default_query_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache A Doctrine\Common\Cache\ArrayCache instance
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf2orm_default_391683847fb92bacd8dd4a9ac15b206165d4915e504026aa11441f1a71c7b769');

        return $instance;
    }

    /**
     * Gets the 'doctrine_cache.providers.doctrine.orm.default_result_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache A Doctrine\Common\Cache\ArrayCache instance
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_result_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf2orm_default_391683847fb92bacd8dd4a9ac15b206165d4915e504026aa11441f1a71c7b769');

        return $instance;
    }

    /**
     * Gets the 'file_locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Config\FileLocator A Symfony\Component\HttpKernel\Config\FileLocator instance
     */
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator($this->get('kernel'), ($this->targetDirs[3].'/app/Resources'));
    }

    /**
     * Gets the 'filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Filesystem\Filesystem A Symfony\Component\Filesystem\Filesystem instance
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }

    /**
     * Gets the 'form.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\FormFactory A Symfony\Component\Form\FormFactory instance
     */
    protected function getForm_FactoryService()
    {
        return $this->services['form.factory'] = new \Symfony\Component\Form\FormFactory($this->get('form.registry'), $this->get('form.resolved_type_factory'));
    }

    /**
     * Gets the 'form.registry' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\FormRegistry A Symfony\Component\Form\FormRegistry instance
     */
    protected function getForm_RegistryService()
    {
        return $this->services['form.registry'] = new \Symfony\Component\Form\FormRegistry(array(0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension($this, array('UserBundle\\Form\\UserEditAdminType' => 'user.user_edit_admin_type', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => 'form.type.form', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => 'form.type.choice', 'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => 'form.type.entity', 'FOS\\UserBundle\\Form\\Type\\UsernameFormType' => 'fos_user.username_form_type', 'FOS\\UserBundle\\Form\\Type\\ProfileFormType' => 'fos_user.profile.form.type', 'FOS\\UserBundle\\Form\\Type\\RegistrationFormType' => 'fos_user.registration.form.type', 'FOS\\UserBundle\\Form\\Type\\ChangePasswordFormType' => 'fos_user.change_password.form.type', 'FOS\\UserBundle\\Form\\Type\\ResettingFormType' => 'fos_user.resetting.form.type', 'FOS\\OAuthServerBundle\\Form\\Type\\AuthorizeFormType' => 'fos_oauth_server.authorize.form.type'), array('Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => array(0 => 'form.type_extension.form.http_foundation', 1 => 'form.type_extension.form.validator', 2 => 'form.type_extension.upload.validator', 3 => 'form.type_extension.csrf', 4 => 'form.type_extension.form.data_collector', 5 => 'nelmio_api_doc.form.extension.description_form_type_extension'), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => array(0 => 'form.type_extension.repeated.validator'), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => array(0 => 'form.type_extension.submit.validator')), array(0 => 'form.type_guesser.validator', 1 => 'form.type_guesser.doctrine'))), $this->get('form.resolved_type_factory'));
    }

    /**
     * Gets the 'form.resolved_type_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\Proxy\ResolvedTypeFactoryDataCollectorProxy A Symfony\Component\Form\Extension\DataCollector\Proxy\ResolvedTypeFactoryDataCollectorProxy instance
     */
    protected function getForm_ResolvedTypeFactoryService()
    {
        return $this->services['form.resolved_type_factory'] = new \Symfony\Component\Form\Extension\DataCollector\Proxy\ResolvedTypeFactoryDataCollectorProxy(new \Symfony\Component\Form\ResolvedFormTypeFactory(), $this->get('data_collector.form'));
    }

    /**
     * Gets the 'form.type.birthday' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\BirthdayType A Symfony\Component\Form\Extension\Core\Type\BirthdayType instance
     *
     * @deprecated The "form.type.birthday" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_BirthdayService()
    {
        @trigger_error('The "form.type.birthday" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.birthday'] = new \Symfony\Component\Form\Extension\Core\Type\BirthdayType();
    }

    /**
     * Gets the 'form.type.button' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\ButtonType A Symfony\Component\Form\Extension\Core\Type\ButtonType instance
     *
     * @deprecated The "form.type.button" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_ButtonService()
    {
        @trigger_error('The "form.type.button" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.button'] = new \Symfony\Component\Form\Extension\Core\Type\ButtonType();
    }

    /**
     * Gets the 'form.type.checkbox' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\CheckboxType A Symfony\Component\Form\Extension\Core\Type\CheckboxType instance
     *
     * @deprecated The "form.type.checkbox" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_CheckboxService()
    {
        @trigger_error('The "form.type.checkbox" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.checkbox'] = new \Symfony\Component\Form\Extension\Core\Type\CheckboxType();
    }

    /**
     * Gets the 'form.type.choice' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\ChoiceType A Symfony\Component\Form\Extension\Core\Type\ChoiceType instance
     */
    protected function getForm_Type_ChoiceService()
    {
        return $this->services['form.type.choice'] = new \Symfony\Component\Form\Extension\Core\Type\ChoiceType(new \Symfony\Component\Form\ChoiceList\Factory\CachingFactoryDecorator(new \Symfony\Component\Form\ChoiceList\Factory\PropertyAccessDecorator(new \Symfony\Component\Form\ChoiceList\Factory\DefaultChoiceListFactory(), $this->get('property_accessor'))));
    }

    /**
     * Gets the 'form.type.collection' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\CollectionType A Symfony\Component\Form\Extension\Core\Type\CollectionType instance
     *
     * @deprecated The "form.type.collection" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_CollectionService()
    {
        @trigger_error('The "form.type.collection" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.collection'] = new \Symfony\Component\Form\Extension\Core\Type\CollectionType();
    }

    /**
     * Gets the 'form.type.country' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\CountryType A Symfony\Component\Form\Extension\Core\Type\CountryType instance
     *
     * @deprecated The "form.type.country" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_CountryService()
    {
        @trigger_error('The "form.type.country" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.country'] = new \Symfony\Component\Form\Extension\Core\Type\CountryType();
    }

    /**
     * Gets the 'form.type.currency' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\CurrencyType A Symfony\Component\Form\Extension\Core\Type\CurrencyType instance
     *
     * @deprecated The "form.type.currency" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_CurrencyService()
    {
        @trigger_error('The "form.type.currency" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.currency'] = new \Symfony\Component\Form\Extension\Core\Type\CurrencyType();
    }

    /**
     * Gets the 'form.type.date' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\DateType A Symfony\Component\Form\Extension\Core\Type\DateType instance
     *
     * @deprecated The "form.type.date" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_DateService()
    {
        @trigger_error('The "form.type.date" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.date'] = new \Symfony\Component\Form\Extension\Core\Type\DateType();
    }

    /**
     * Gets the 'form.type.datetime' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\DateTimeType A Symfony\Component\Form\Extension\Core\Type\DateTimeType instance
     *
     * @deprecated The "form.type.datetime" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_DatetimeService()
    {
        @trigger_error('The "form.type.datetime" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.datetime'] = new \Symfony\Component\Form\Extension\Core\Type\DateTimeType();
    }

    /**
     * Gets the 'form.type.email' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\EmailType A Symfony\Component\Form\Extension\Core\Type\EmailType instance
     *
     * @deprecated The "form.type.email" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_EmailService()
    {
        @trigger_error('The "form.type.email" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.email'] = new \Symfony\Component\Form\Extension\Core\Type\EmailType();
    }

    /**
     * Gets the 'form.type.entity' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\Form\Type\EntityType A Symfony\Bridge\Doctrine\Form\Type\EntityType instance
     */
    protected function getForm_Type_EntityService()
    {
        return $this->services['form.type.entity'] = new \Symfony\Bridge\Doctrine\Form\Type\EntityType($this->get('doctrine'));
    }

    /**
     * Gets the 'form.type.file' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\FileType A Symfony\Component\Form\Extension\Core\Type\FileType instance
     *
     * @deprecated The "form.type.file" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_FileService()
    {
        @trigger_error('The "form.type.file" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.file'] = new \Symfony\Component\Form\Extension\Core\Type\FileType();
    }

    /**
     * Gets the 'form.type.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\FormType A Symfony\Component\Form\Extension\Core\Type\FormType instance
     */
    protected function getForm_Type_FormService()
    {
        return $this->services['form.type.form'] = new \Symfony\Component\Form\Extension\Core\Type\FormType($this->get('property_accessor'));
    }

    /**
     * Gets the 'form.type.hidden' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\HiddenType A Symfony\Component\Form\Extension\Core\Type\HiddenType instance
     *
     * @deprecated The "form.type.hidden" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_HiddenService()
    {
        @trigger_error('The "form.type.hidden" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.hidden'] = new \Symfony\Component\Form\Extension\Core\Type\HiddenType();
    }

    /**
     * Gets the 'form.type.integer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\IntegerType A Symfony\Component\Form\Extension\Core\Type\IntegerType instance
     *
     * @deprecated The "form.type.integer" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_IntegerService()
    {
        @trigger_error('The "form.type.integer" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.integer'] = new \Symfony\Component\Form\Extension\Core\Type\IntegerType();
    }

    /**
     * Gets the 'form.type.language' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\LanguageType A Symfony\Component\Form\Extension\Core\Type\LanguageType instance
     *
     * @deprecated The "form.type.language" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_LanguageService()
    {
        @trigger_error('The "form.type.language" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.language'] = new \Symfony\Component\Form\Extension\Core\Type\LanguageType();
    }

    /**
     * Gets the 'form.type.locale' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\LocaleType A Symfony\Component\Form\Extension\Core\Type\LocaleType instance
     *
     * @deprecated The "form.type.locale" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_LocaleService()
    {
        @trigger_error('The "form.type.locale" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.locale'] = new \Symfony\Component\Form\Extension\Core\Type\LocaleType();
    }

    /**
     * Gets the 'form.type.money' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\MoneyType A Symfony\Component\Form\Extension\Core\Type\MoneyType instance
     *
     * @deprecated The "form.type.money" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_MoneyService()
    {
        @trigger_error('The "form.type.money" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.money'] = new \Symfony\Component\Form\Extension\Core\Type\MoneyType();
    }

    /**
     * Gets the 'form.type.number' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\NumberType A Symfony\Component\Form\Extension\Core\Type\NumberType instance
     *
     * @deprecated The "form.type.number" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_NumberService()
    {
        @trigger_error('The "form.type.number" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.number'] = new \Symfony\Component\Form\Extension\Core\Type\NumberType();
    }

    /**
     * Gets the 'form.type.password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\PasswordType A Symfony\Component\Form\Extension\Core\Type\PasswordType instance
     *
     * @deprecated The "form.type.password" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_PasswordService()
    {
        @trigger_error('The "form.type.password" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.password'] = new \Symfony\Component\Form\Extension\Core\Type\PasswordType();
    }

    /**
     * Gets the 'form.type.percent' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\PercentType A Symfony\Component\Form\Extension\Core\Type\PercentType instance
     *
     * @deprecated The "form.type.percent" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_PercentService()
    {
        @trigger_error('The "form.type.percent" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.percent'] = new \Symfony\Component\Form\Extension\Core\Type\PercentType();
    }

    /**
     * Gets the 'form.type.radio' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\RadioType A Symfony\Component\Form\Extension\Core\Type\RadioType instance
     *
     * @deprecated The "form.type.radio" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_RadioService()
    {
        @trigger_error('The "form.type.radio" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.radio'] = new \Symfony\Component\Form\Extension\Core\Type\RadioType();
    }

    /**
     * Gets the 'form.type.range' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\RangeType A Symfony\Component\Form\Extension\Core\Type\RangeType instance
     *
     * @deprecated The "form.type.range" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_RangeService()
    {
        @trigger_error('The "form.type.range" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.range'] = new \Symfony\Component\Form\Extension\Core\Type\RangeType();
    }

    /**
     * Gets the 'form.type.repeated' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\RepeatedType A Symfony\Component\Form\Extension\Core\Type\RepeatedType instance
     *
     * @deprecated The "form.type.repeated" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_RepeatedService()
    {
        @trigger_error('The "form.type.repeated" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.repeated'] = new \Symfony\Component\Form\Extension\Core\Type\RepeatedType();
    }

    /**
     * Gets the 'form.type.reset' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\ResetType A Symfony\Component\Form\Extension\Core\Type\ResetType instance
     *
     * @deprecated The "form.type.reset" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_ResetService()
    {
        @trigger_error('The "form.type.reset" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.reset'] = new \Symfony\Component\Form\Extension\Core\Type\ResetType();
    }

    /**
     * Gets the 'form.type.search' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\SearchType A Symfony\Component\Form\Extension\Core\Type\SearchType instance
     *
     * @deprecated The "form.type.search" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_SearchService()
    {
        @trigger_error('The "form.type.search" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.search'] = new \Symfony\Component\Form\Extension\Core\Type\SearchType();
    }

    /**
     * Gets the 'form.type.submit' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\SubmitType A Symfony\Component\Form\Extension\Core\Type\SubmitType instance
     *
     * @deprecated The "form.type.submit" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_SubmitService()
    {
        @trigger_error('The "form.type.submit" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.submit'] = new \Symfony\Component\Form\Extension\Core\Type\SubmitType();
    }

    /**
     * Gets the 'form.type.text' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TextType A Symfony\Component\Form\Extension\Core\Type\TextType instance
     *
     * @deprecated The "form.type.text" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_TextService()
    {
        @trigger_error('The "form.type.text" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.text'] = new \Symfony\Component\Form\Extension\Core\Type\TextType();
    }

    /**
     * Gets the 'form.type.textarea' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TextareaType A Symfony\Component\Form\Extension\Core\Type\TextareaType instance
     *
     * @deprecated The "form.type.textarea" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_TextareaService()
    {
        @trigger_error('The "form.type.textarea" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.textarea'] = new \Symfony\Component\Form\Extension\Core\Type\TextareaType();
    }

    /**
     * Gets the 'form.type.time' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TimeType A Symfony\Component\Form\Extension\Core\Type\TimeType instance
     *
     * @deprecated The "form.type.time" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_TimeService()
    {
        @trigger_error('The "form.type.time" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.time'] = new \Symfony\Component\Form\Extension\Core\Type\TimeType();
    }

    /**
     * Gets the 'form.type.timezone' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TimezoneType A Symfony\Component\Form\Extension\Core\Type\TimezoneType instance
     *
     * @deprecated The "form.type.timezone" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_TimezoneService()
    {
        @trigger_error('The "form.type.timezone" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.timezone'] = new \Symfony\Component\Form\Extension\Core\Type\TimezoneType();
    }

    /**
     * Gets the 'form.type.url' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\UrlType A Symfony\Component\Form\Extension\Core\Type\UrlType instance
     *
     * @deprecated The "form.type.url" service is deprecated since Symfony 3.1 and will be removed in 4.0.
     */
    protected function getForm_Type_UrlService()
    {
        @trigger_error('The "form.type.url" service is deprecated since Symfony 3.1 and will be removed in 4.0.', E_USER_DEPRECATED);

        return $this->services['form.type.url'] = new \Symfony\Component\Form\Extension\Core\Type\UrlType();
    }

    /**
     * Gets the 'form.type_extension.csrf' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension A Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension instance
     */
    protected function getForm_TypeExtension_CsrfService()
    {
        return $this->services['form.type_extension.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension($this->get('security.csrf.token_manager'), true, '_token', $this->get('translator.default'), 'validators', $this->get('form.server_params'));
    }

    /**
     * Gets the 'form.type_extension.form.data_collector' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\Type\DataCollectorTypeExtension A Symfony\Component\Form\Extension\DataCollector\Type\DataCollectorTypeExtension instance
     */
    protected function getForm_TypeExtension_Form_DataCollectorService()
    {
        return $this->services['form.type_extension.form.data_collector'] = new \Symfony\Component\Form\Extension\DataCollector\Type\DataCollectorTypeExtension($this->get('data_collector.form'));
    }

    /**
     * Gets the 'form.type_extension.form.http_foundation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension A Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension instance
     */
    protected function getForm_TypeExtension_Form_HttpFoundationService()
    {
        return $this->services['form.type_extension.form.http_foundation'] = new \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension(new \Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler($this->get('form.server_params')));
    }

    /**
     * Gets the 'form.type_extension.form.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension A Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension instance
     */
    protected function getForm_TypeExtension_Form_ValidatorService()
    {
        return $this->services['form.type_extension.form.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension($this->get('validator'));
    }

    /**
     * Gets the 'form.type_extension.repeated.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension A Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension instance
     */
    protected function getForm_TypeExtension_Repeated_ValidatorService()
    {
        return $this->services['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension();
    }

    /**
     * Gets the 'form.type_extension.submit.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension A Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension instance
     */
    protected function getForm_TypeExtension_Submit_ValidatorService()
    {
        return $this->services['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension();
    }

    /**
     * Gets the 'form.type_extension.upload.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\UploadValidatorExtension A Symfony\Component\Form\Extension\Validator\Type\UploadValidatorExtension instance
     */
    protected function getForm_TypeExtension_Upload_ValidatorService()
    {
        return $this->services['form.type_extension.upload.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\UploadValidatorExtension($this->get('translator'), 'validators');
    }

    /**
     * Gets the 'form.type_guesser.doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser A Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser instance
     */
    protected function getForm_TypeGuesser_DoctrineService()
    {
        return $this->services['form.type_guesser.doctrine'] = new \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser($this->get('doctrine'));
    }

    /**
     * Gets the 'form.type_guesser.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser A Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser instance
     */
    protected function getForm_TypeGuesser_ValidatorService()
    {
        return $this->services['form.type_guesser.validator'] = new \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser($this->get('validator'));
    }

    /**
     * Gets the 'fos_oauth_server.access_token_manager.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\OAuthServerBundle\Entity\AccessTokenManager A FOS\OAuthServerBundle\Entity\AccessTokenManager instance
     */
    protected function getFosOauthServer_AccessTokenManager_DefaultService()
    {
        return $this->services['fos_oauth_server.access_token_manager.default'] = new \FOS\OAuthServerBundle\Entity\AccessTokenManager($this->get('fos_oauth_server.entity_manager'), 'UserBundle\\Entity\\AccessToken');
    }

    /**
     * Gets the 'fos_oauth_server.auth_code_manager.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\OAuthServerBundle\Entity\AuthCodeManager A FOS\OAuthServerBundle\Entity\AuthCodeManager instance
     */
    protected function getFosOauthServer_AuthCodeManager_DefaultService()
    {
        return $this->services['fos_oauth_server.auth_code_manager.default'] = new \FOS\OAuthServerBundle\Entity\AuthCodeManager($this->get('fos_oauth_server.entity_manager'), 'UserBundle\\Entity\\AuthCode');
    }

    /**
     * Gets the 'fos_oauth_server.authorize.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Form A Symfony\Component\Form\Form instance
     */
    protected function getFosOauthServer_Authorize_FormService()
    {
        return $this->services['fos_oauth_server.authorize.form'] = $this->get('form.factory')->createNamed('fos_oauth_server_authorize_form', 'FOS\\OAuthServerBundle\\Form\\Type\\AuthorizeFormType', NULL, array('validation_groups' => array(0 => 'Authorize', 1 => 'Default')));
    }

    /**
     * Gets the 'fos_oauth_server.authorize.form.handler.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\OAuthServerBundle\Form\Handler\AuthorizeFormHandler A FOS\OAuthServerBundle\Form\Handler\AuthorizeFormHandler instance
     */
    protected function getFosOauthServer_Authorize_Form_Handler_DefaultService()
    {
        return $this->services['fos_oauth_server.authorize.form.handler.default'] = new \FOS\OAuthServerBundle\Form\Handler\AuthorizeFormHandler($this->get('fos_oauth_server.authorize.form'), $this->get('request_stack', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'fos_oauth_server.authorize.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\OAuthServerBundle\Form\Type\AuthorizeFormType A FOS\OAuthServerBundle\Form\Type\AuthorizeFormType instance
     */
    protected function getFosOauthServer_Authorize_Form_TypeService()
    {
        return $this->services['fos_oauth_server.authorize.form.type'] = new \FOS\OAuthServerBundle\Form\Type\AuthorizeFormType();
    }

    /**
     * Gets the 'fos_oauth_server.client_manager.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\OAuthServerBundle\Entity\ClientManager A FOS\OAuthServerBundle\Entity\ClientManager instance
     */
    protected function getFosOauthServer_ClientManager_DefaultService()
    {
        return $this->services['fos_oauth_server.client_manager.default'] = new \FOS\OAuthServerBundle\Entity\ClientManager($this->get('fos_oauth_server.entity_manager'), 'UserBundle\\Entity\\Client');
    }

    /**
     * Gets the 'fos_oauth_server.controller.token' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\OAuthServerBundle\Controller\TokenController A FOS\OAuthServerBundle\Controller\TokenController instance
     */
    protected function getFosOauthServer_Controller_TokenService()
    {
        return $this->services['fos_oauth_server.controller.token'] = new \FOS\OAuthServerBundle\Controller\TokenController($this->get('fos_oauth_server.server'));
    }

    /**
     * Gets the 'fos_oauth_server.refresh_token_manager.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\OAuthServerBundle\Entity\RefreshTokenManager A FOS\OAuthServerBundle\Entity\RefreshTokenManager instance
     */
    protected function getFosOauthServer_RefreshTokenManager_DefaultService()
    {
        return $this->services['fos_oauth_server.refresh_token_manager.default'] = new \FOS\OAuthServerBundle\Entity\RefreshTokenManager($this->get('fos_oauth_server.entity_manager'), 'UserBundle\\Entity\\RefreshToken');
    }

    /**
     * Gets the 'fos_oauth_server.server' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \OAuth2\OAuth2 A OAuth2\OAuth2 instance
     */
    protected function getFosOauthServer_ServerService()
    {
        return $this->services['fos_oauth_server.server'] = new \OAuth2\OAuth2($this->get('fos_oauth_server.storage'), array());
    }

    /**
     * Gets the 'fos_oauth_server.storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\OAuthServerBundle\Storage\OAuthStorage A FOS\OAuthServerBundle\Storage\OAuthStorage instance
     */
    protected function getFosOauthServer_StorageService()
    {
        return $this->services['fos_oauth_server.storage'] = new \FOS\OAuthServerBundle\Storage\OAuthStorage($this->get('fos_oauth_server.client_manager.default'), $this->get('fos_oauth_server.access_token_manager.default'), $this->get('fos_oauth_server.refresh_token_manager.default'), $this->get('fos_oauth_server.auth_code_manager.default'), $this->get('fos_user.user_provider.username_email', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.encoder_factory'));
    }

    /**
     * Gets the 'fos_rest.body_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\EventListener\BodyListener A FOS\RestBundle\EventListener\BodyListener instance
     */
    protected function getFosRest_BodyListenerService()
    {
        $this->services['fos_rest.body_listener'] = $instance = new \FOS\RestBundle\EventListener\BodyListener($this->get('fos_rest.decoder_provider'), false);

        $instance->setDefaultFormat(NULL);

        return $instance;
    }

    /**
     * Gets the 'fos_rest.decoder.json' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Decoder\JsonDecoder A FOS\RestBundle\Decoder\JsonDecoder instance
     */
    protected function getFosRest_Decoder_JsonService()
    {
        return $this->services['fos_rest.decoder.json'] = new \FOS\RestBundle\Decoder\JsonDecoder();
    }

    /**
     * Gets the 'fos_rest.decoder.jsontoform' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Decoder\JsonToFormDecoder A FOS\RestBundle\Decoder\JsonToFormDecoder instance
     */
    protected function getFosRest_Decoder_JsontoformService()
    {
        return $this->services['fos_rest.decoder.jsontoform'] = new \FOS\RestBundle\Decoder\JsonToFormDecoder();
    }

    /**
     * Gets the 'fos_rest.decoder.xml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Decoder\XmlDecoder A FOS\RestBundle\Decoder\XmlDecoder instance
     */
    protected function getFosRest_Decoder_XmlService()
    {
        return $this->services['fos_rest.decoder.xml'] = new \FOS\RestBundle\Decoder\XmlDecoder();
    }

    /**
     * Gets the 'fos_rest.decoder_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Decoder\ContainerDecoderProvider A FOS\RestBundle\Decoder\ContainerDecoderProvider instance
     */
    protected function getFosRest_DecoderProviderService()
    {
        return $this->services['fos_rest.decoder_provider'] = new \FOS\RestBundle\Decoder\ContainerDecoderProvider($this, array('json' => 'fos_rest.decoder.json', 'xml' => 'fos_rest.decoder.xml'));
    }

    /**
     * Gets the 'fos_rest.inflector' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Inflector\DoctrineInflector A FOS\RestBundle\Inflector\DoctrineInflector instance
     */
    protected function getFosRest_InflectorService()
    {
        return $this->services['fos_rest.inflector'] = new \FOS\RestBundle\Inflector\DoctrineInflector();
    }

    /**
     * Gets the 'fos_rest.normalizer.camel_keys' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Normalizer\CamelKeysNormalizer A FOS\RestBundle\Normalizer\CamelKeysNormalizer instance
     */
    protected function getFosRest_Normalizer_CamelKeysService()
    {
        return $this->services['fos_rest.normalizer.camel_keys'] = new \FOS\RestBundle\Normalizer\CamelKeysNormalizer();
    }

    /**
     * Gets the 'fos_rest.normalizer.camel_keys_with_leading_underscore' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Normalizer\CamelKeysNormalizerWithLeadingUnderscore A FOS\RestBundle\Normalizer\CamelKeysNormalizerWithLeadingUnderscore instance
     */
    protected function getFosRest_Normalizer_CamelKeysWithLeadingUnderscoreService()
    {
        return $this->services['fos_rest.normalizer.camel_keys_with_leading_underscore'] = new \FOS\RestBundle\Normalizer\CamelKeysNormalizerWithLeadingUnderscore();
    }

    /**
     * Gets the 'fos_rest.request.param_fetcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Request\ParamFetcher A FOS\RestBundle\Request\ParamFetcher instance
     */
    protected function getFosRest_Request_ParamFetcherService()
    {
        return $this->services['fos_rest.request.param_fetcher'] = new \FOS\RestBundle\Request\ParamFetcher($this, $this->get('fos_rest.request.param_fetcher.reader'), $this->get('request_stack'), $this->get('validator', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'fos_rest.serializer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @param bool    $lazyLoad whether to try lazy-loading the service with a proxy
     *
     * @return \FOS\RestBundle\Serializer\JMSSerializerAdapter A FOS\RestBundle\Serializer\JMSSerializerAdapter instance
     */
    protected function getFosRest_SerializerService($lazyLoad = true)
    {
        return $this->services['fos_rest.serializer'] = new \FOS\RestBundle\Serializer\JMSSerializerAdapter($this->get('jms_serializer'));
    }

    /**
     * Gets the 'fos_rest.versioning.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\EventListener\VersionListener A FOS\RestBundle\EventListener\VersionListener instance
     */
    protected function getFosRest_Versioning_ListenerService()
    {
        $a = new \FOS\RestBundle\Version\ChainVersionResolver(array());
        $a->addResolver(new \FOS\RestBundle\Version\Resolver\HeaderVersionResolver('X-Accept-Version'));

        return $this->services['fos_rest.versioning.listener'] = new \FOS\RestBundle\EventListener\VersionListener($this->get('fos_rest.view_handler'), $a, NULL);
    }

    /**
     * Gets the 'fos_rest.view_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\View\ViewHandler A FOS\RestBundle\View\ViewHandler instance
     */
    protected function getFosRest_ViewHandlerService()
    {
        $this->services['fos_rest.view_handler'] = $instance = new \FOS\RestBundle\View\ViewHandler($this->get('router'), $this->get('fos_rest.serializer'), $this->get('templating'), $this->get('request_stack'), array('json' => false, 'html' => true), 400, 204, false, array('html' => 302), 'twig');

        $instance->setSerializeNullStrategy(true);

        return $instance;
    }

    /**
     * Gets the 'fos_rest.view_response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\EventListener\ViewResponseListener A FOS\RestBundle\EventListener\ViewResponseListener instance
     */
    protected function getFosRest_ViewResponseListenerService()
    {
        return $this->services['fos_rest.view_response_listener'] = new \FOS\RestBundle\EventListener\ViewResponseListener($this->get('fos_rest.view_handler'), false);
    }

    /**
     * Gets the 'fos_user.change_password.form.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Factory\FormFactory A FOS\UserBundle\Form\Factory\FormFactory instance
     */
    protected function getFosUser_ChangePassword_Form_FactoryService()
    {
        return $this->services['fos_user.change_password.form.factory'] = new \FOS\UserBundle\Form\Factory\FormFactory($this->get('form.factory'), 'fos_user_change_password_form', 'FOS\\UserBundle\\Form\\Type\\ChangePasswordFormType', array(0 => 'ChangePassword', 1 => 'Default'));
    }

    /**
     * Gets the 'fos_user.change_password.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Type\ChangePasswordFormType A FOS\UserBundle\Form\Type\ChangePasswordFormType instance
     */
    protected function getFosUser_ChangePassword_Form_TypeService()
    {
        return $this->services['fos_user.change_password.form.type'] = new \FOS\UserBundle\Form\Type\ChangePasswordFormType('UserBundle\\Entity\\User');
    }

    /**
     * Gets the 'fos_user.listener.authentication' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\EventListener\AuthenticationListener A FOS\UserBundle\EventListener\AuthenticationListener instance
     */
    protected function getFosUser_Listener_AuthenticationService()
    {
        return $this->services['fos_user.listener.authentication'] = new \FOS\UserBundle\EventListener\AuthenticationListener($this->get('fos_user.security.login_manager'), 'main');
    }

    /**
     * Gets the 'fos_user.listener.flash' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\EventListener\FlashListener A FOS\UserBundle\EventListener\FlashListener instance
     */
    protected function getFosUser_Listener_FlashService()
    {
        return $this->services['fos_user.listener.flash'] = new \FOS\UserBundle\EventListener\FlashListener($this->get('session'), $this->get('translator'));
    }

    /**
     * Gets the 'fos_user.listener.resetting' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\EventListener\ResettingListener A FOS\UserBundle\EventListener\ResettingListener instance
     */
    protected function getFosUser_Listener_ResettingService()
    {
        return $this->services['fos_user.listener.resetting'] = new \FOS\UserBundle\EventListener\ResettingListener($this->get('router'), 86400);
    }

    /**
     * Gets the 'fos_user.profile.form.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Factory\FormFactory A FOS\UserBundle\Form\Factory\FormFactory instance
     */
    protected function getFosUser_Profile_Form_FactoryService()
    {
        return $this->services['fos_user.profile.form.factory'] = new \FOS\UserBundle\Form\Factory\FormFactory($this->get('form.factory'), 'fos_user_profile_form', 'FOS\\UserBundle\\Form\\Type\\ProfileFormType', array(0 => 'Profile', 1 => 'Default'));
    }

    /**
     * Gets the 'fos_user.profile.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Type\ProfileFormType A FOS\UserBundle\Form\Type\ProfileFormType instance
     */
    protected function getFosUser_Profile_Form_TypeService()
    {
        return $this->services['fos_user.profile.form.type'] = new \FOS\UserBundle\Form\Type\ProfileFormType('UserBundle\\Entity\\User');
    }

    /**
     * Gets the 'fos_user.registration.form.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Factory\FormFactory A FOS\UserBundle\Form\Factory\FormFactory instance
     */
    protected function getFosUser_Registration_Form_FactoryService()
    {
        return $this->services['fos_user.registration.form.factory'] = new \FOS\UserBundle\Form\Factory\FormFactory($this->get('form.factory'), 'fos_user_registration_form', 'FOS\\UserBundle\\Form\\Type\\RegistrationFormType', array(0 => 'Registration', 1 => 'Default'));
    }

    /**
     * Gets the 'fos_user.registration.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Type\RegistrationFormType A FOS\UserBundle\Form\Type\RegistrationFormType instance
     */
    protected function getFosUser_Registration_Form_TypeService()
    {
        return $this->services['fos_user.registration.form.type'] = new \FOS\UserBundle\Form\Type\RegistrationFormType('UserBundle\\Entity\\User');
    }

    /**
     * Gets the 'fos_user.resetting.form.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Factory\FormFactory A FOS\UserBundle\Form\Factory\FormFactory instance
     */
    protected function getFosUser_Resetting_Form_FactoryService()
    {
        return $this->services['fos_user.resetting.form.factory'] = new \FOS\UserBundle\Form\Factory\FormFactory($this->get('form.factory'), 'fos_user_resetting_form', 'FOS\\UserBundle\\Form\\Type\\ResettingFormType', array(0 => 'ResetPassword', 1 => 'Default'));
    }

    /**
     * Gets the 'fos_user.resetting.form.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Type\ResettingFormType A FOS\UserBundle\Form\Type\ResettingFormType instance
     */
    protected function getFosUser_Resetting_Form_TypeService()
    {
        return $this->services['fos_user.resetting.form.type'] = new \FOS\UserBundle\Form\Type\ResettingFormType('UserBundle\\Entity\\User');
    }

    /**
     * Gets the 'fos_user.security.interactive_login_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\EventListener\LastLoginListener A FOS\UserBundle\EventListener\LastLoginListener instance
     */
    protected function getFosUser_Security_InteractiveLoginListenerService()
    {
        return $this->services['fos_user.security.interactive_login_listener'] = new \FOS\UserBundle\EventListener\LastLoginListener($this->get('fos_user.user_manager'));
    }

    /**
     * Gets the 'fos_user.security.login_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Security\LoginManager A FOS\UserBundle\Security\LoginManager instance
     */
    protected function getFosUser_Security_LoginManagerService()
    {
        return $this->services['fos_user.security.login_manager'] = new \FOS\UserBundle\Security\LoginManager($this->get('security.token_storage'), $this->get('security.user_checker.oauth_authorize'), $this->get('security.authentication.session_strategy'), $this->get('request_stack'), NULL);
    }

    /**
     * Gets the 'fos_user.user_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Doctrine\UserManager A FOS\UserBundle\Doctrine\UserManager instance
     */
    protected function getFosUser_UserManagerService()
    {
        return $this->services['fos_user.user_manager'] = new \FOS\UserBundle\Doctrine\UserManager($this->get('fos_user.util.password_updater'), $this->get('fos_user.util.canonical_fields_updater'), $this->get('doctrine')->getManager(NULL), 'UserBundle\\Entity\\User');
    }

    /**
     * Gets the 'fos_user.username_form_type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Form\Type\UsernameFormType A FOS\UserBundle\Form\Type\UsernameFormType instance
     */
    protected function getFosUser_UsernameFormTypeService()
    {
        return $this->services['fos_user.username_form_type'] = new \FOS\UserBundle\Form\Type\UsernameFormType(new \FOS\UserBundle\Form\DataTransformer\UserToUsernameTransformer($this->get('fos_user.user_manager')));
    }

    /**
     * Gets the 'fos_user.util.email_canonicalizer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Util\Canonicalizer A FOS\UserBundle\Util\Canonicalizer instance
     */
    protected function getFosUser_Util_EmailCanonicalizerService()
    {
        return $this->services['fos_user.util.email_canonicalizer'] = new \FOS\UserBundle\Util\Canonicalizer();
    }

    /**
     * Gets the 'fos_user.util.token_generator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Util\TokenGenerator A FOS\UserBundle\Util\TokenGenerator instance
     */
    protected function getFosUser_Util_TokenGeneratorService()
    {
        return $this->services['fos_user.util.token_generator'] = new \FOS\UserBundle\Util\TokenGenerator($this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'fos_user.util.user_manipulator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\UserBundle\Util\UserManipulator A FOS\UserBundle\Util\UserManipulator instance
     */
    protected function getFosUser_Util_UserManipulatorService()
    {
        return $this->services['fos_user.util.user_manipulator'] = new \FOS\UserBundle\Util\UserManipulator($this->get('fos_user.user_manager'), $this->get('debug.event_dispatcher'), $this->get('request_stack'));
    }

    /**
     * Gets the 'fragment.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler A Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler instance
     */
    protected function getFragment_HandlerService()
    {
        $this->services['fragment.handler'] = $instance = new \Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler($this, $this->get('request_stack'), true);

        $instance->addRendererService('inline', 'fragment.renderer.inline');
        $instance->addRendererService('hinclude', 'fragment.renderer.hinclude');
        $instance->addRendererService('hinclude', 'fragment.renderer.hinclude');
        $instance->addRendererService('esi', 'fragment.renderer.esi');
        $instance->addRendererService('ssi', 'fragment.renderer.ssi');

        return $instance;
    }

    /**
     * Gets the 'fragment.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\FragmentListener A Symfony\Component\HttpKernel\EventListener\FragmentListener instance
     */
    protected function getFragment_ListenerService()
    {
        return $this->services['fragment.listener'] = new \Symfony\Component\HttpKernel\EventListener\FragmentListener($this->get('uri_signer'), '/_fragment');
    }

    /**
     * Gets the 'fragment.renderer.esi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer A Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer instance
     */
    protected function getFragment_Renderer_EsiService()
    {
        $this->services['fragment.renderer.esi'] = $instance = new \Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer(NULL, $this->get('fragment.renderer.inline'), $this->get('uri_signer'));

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.hinclude' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer A Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer instance
     */
    protected function getFragment_Renderer_HincludeService()
    {
        $this->services['fragment.renderer.hinclude'] = $instance = new \Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer($this->get('twig'), $this->get('uri_signer'), NULL);

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.inline' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer A Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer instance
     */
    protected function getFragment_Renderer_InlineService()
    {
        $this->services['fragment.renderer.inline'] = $instance = new \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer($this->get('http_kernel'), $this->get('debug.event_dispatcher'));

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.ssi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\SsiFragmentRenderer A Symfony\Component\HttpKernel\Fragment\SsiFragmentRenderer instance
     */
    protected function getFragment_Renderer_SsiService()
    {
        $this->services['fragment.renderer.ssi'] = $instance = new \Symfony\Component\HttpKernel\Fragment\SsiFragmentRenderer(NULL, $this->get('fragment.renderer.inline'), $this->get('uri_signer'));

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /**
     * Gets the 'hateoas.configuration.provider.resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\Configuration\Provider\Resolver\ChainResolver A Hateoas\Configuration\Provider\Resolver\ChainResolver instance
     */
    protected function getHateoas_Configuration_Provider_ResolverService()
    {
        return $this->services['hateoas.configuration.provider.resolver'] = new \Hateoas\Configuration\Provider\Resolver\ChainResolver(array(0 => new \Hateoas\Configuration\Provider\Resolver\MethodResolver(), 1 => new \Hateoas\Configuration\Provider\Resolver\StaticMethodResolver(), 2 => new \Hateoas\Configuration\Provider\Resolver\SymfonyContainerResolver($this)));
    }

    /**
     * Gets the 'hateoas.event_subscriber.json' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\Serializer\EventSubscriber\JsonEventSubscriber A Hateoas\Serializer\EventSubscriber\JsonEventSubscriber instance
     */
    protected function getHateoas_EventSubscriber_JsonService()
    {
        $a = $this->get('jms_serializer.metadata_factory');

        return $this->services['hateoas.event_subscriber.json'] = new \Hateoas\Serializer\EventSubscriber\JsonEventSubscriber(new \Hateoas\Serializer\JsonHalSerializer(), $this->get('hateoas.links_factory'), $this->get('hateoas.embeds_factory'), new \Hateoas\Serializer\Metadata\InlineDeferrer($a), new \Hateoas\Serializer\Metadata\InlineDeferrer($a));
    }

    /**
     * Gets the 'hateoas.event_subscriber.xml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\Serializer\EventSubscriber\XmlEventSubscriber A Hateoas\Serializer\EventSubscriber\XmlEventSubscriber instance
     */
    protected function getHateoas_EventSubscriber_XmlService()
    {
        $a = new \Hateoas\Serializer\XmlSerializer();
        $a->setMetadataFactory($this->get('jms_serializer.metadata_factory'));

        return $this->services['hateoas.event_subscriber.xml'] = new \Hateoas\Serializer\EventSubscriber\XmlEventSubscriber($a, $this->get('hateoas.links_factory'), $this->get('hateoas.embeds_factory'));
    }

    /**
     * Gets the 'hateoas.expression.evaluator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Bazinga\Bundle\HateoasBundle\Hateoas\Expression\LazyFunctionExpressionEvaluator A Bazinga\Bundle\HateoasBundle\Hateoas\Expression\LazyFunctionExpressionEvaluator instance
     */
    protected function getHateoas_Expression_EvaluatorService()
    {
        $this->services['hateoas.expression.evaluator'] = $instance = new \Bazinga\Bundle\HateoasBundle\Hateoas\Expression\LazyFunctionExpressionEvaluator($this->get('bazinga_hateoas.expression_language'), array(), $this);

        $instance->setContextVariable('container', $this);
        $instance->registerFunctionId('hateoas.expression.link');

        return $instance;
    }

    /**
     * Gets the 'hateoas.expression.link' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\Expression\LinkExpressionFunction A Hateoas\Expression\LinkExpressionFunction instance
     */
    protected function getHateoas_Expression_LinkService()
    {
        return $this->services['hateoas.expression.link'] = new \Hateoas\Expression\LinkExpressionFunction($this->get('hateoas.helper.link'));
    }

    /**
     * Gets the 'hateoas.generator.registry' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\UrlGenerator\UrlGeneratorRegistry A Hateoas\UrlGenerator\UrlGeneratorRegistry instance
     */
    protected function getHateoas_Generator_RegistryService()
    {
        return $this->services['hateoas.generator.registry'] = new \Hateoas\UrlGenerator\UrlGeneratorRegistry($this->get('hateoas.generator.symfony'));
    }

    /**
     * Gets the 'hateoas.generator.symfony' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\UrlGenerator\SymfonyUrlGenerator A Hateoas\UrlGenerator\SymfonyUrlGenerator instance
     */
    protected function getHateoas_Generator_SymfonyService()
    {
        return $this->services['hateoas.generator.symfony'] = new \Hateoas\UrlGenerator\SymfonyUrlGenerator($this->get('router'));
    }

    /**
     * Gets the 'hateoas.helper.link' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\Helper\LinkHelper A Hateoas\Helper\LinkHelper instance
     */
    protected function getHateoas_Helper_LinkService()
    {
        return $this->services['hateoas.helper.link'] = new \Hateoas\Helper\LinkHelper($this->get('hateoas.link_factory'), $this->get('hateoas.configuration.relations_repository'));
    }

    /**
     * Gets the 'hateoas.serializer.exclusion_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\Serializer\ExclusionManager A Hateoas\Serializer\ExclusionManager instance
     */
    protected function getHateoas_Serializer_ExclusionManagerService()
    {
        return $this->services['hateoas.serializer.exclusion_manager'] = new \Hateoas\Serializer\ExclusionManager($this->get('hateoas.expression.evaluator'));
    }

    /**
     * Gets the 'hateoas.twig.link' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Hateoas\Twig\Extension\LinkExtension A Hateoas\Twig\Extension\LinkExtension instance
     */
    protected function getHateoas_Twig_LinkService()
    {
        return $this->services['hateoas.twig.link'] = new \Hateoas\Twig\Extension\LinkExtension($this->get('hateoas.helper.link'));
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel A Symfony\Component\HttpKernel\HttpKernel instance
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel($this->get('debug.event_dispatcher'), $this->get('debug.controller_resolver'), $this->get('request_stack'), $this->get('debug.argument_resolver'));
    }

    /**
     * Gets the 'jms_serializer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Serializer A JMS\Serializer\Serializer instance
     */
    protected function getJmsSerializerService()
    {
        $a = new \JMS\Serializer\EventDispatcher\LazyEventDispatcher($this);
        $a->setListeners(array('serializer.pre_serialize' => array(0 => array(0 => array(0 => 'jms_serializer.stopwatch_subscriber', 1 => 'onPreSerialize'), 1 => NULL, 2 => NULL), 1 => array(0 => array(0 => 'jms_serializer.doctrine_proxy_subscriber', 1 => 'onPreSerialize'), 1 => NULL, 2 => NULL)), 'serializer.post_serialize' => array(0 => array(0 => array(0 => 'hateoas.event_subscriber.xml', 1 => 'onPostSerialize'), 1 => NULL, 2 => 'xml'), 1 => array(0 => array(0 => 'hateoas.event_subscriber.json', 1 => 'onPostSerialize'), 1 => NULL, 2 => 'json'), 2 => array(0 => array(0 => 'jms_serializer.stopwatch_subscriber', 1 => 'onPostSerialize'), 1 => NULL, 2 => NULL))));

        return $this->services['jms_serializer'] = new \JMS\Serializer\Serializer($this->get('jms_serializer.metadata_factory'), $this->get('jms_serializer.handler_registry'), $this->get('jms_serializer.unserialize_object_constructor'), new \PhpCollection\Map(array('json' => $this->get('jms_serializer.json_serialization_visitor'), 'xml' => $this->get('jms_serializer.xml_serialization_visitor'), 'yml' => $this->get('jms_serializer.yaml_serialization_visitor'))), new \PhpCollection\Map(array('json' => $this->get('jms_serializer.json_deserialization_visitor'), 'xml' => $this->get('jms_serializer.xml_deserialization_visitor'))), $a);
    }

    /**
     * Gets the 'jms_serializer.array_collection_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\ArrayCollectionHandler A JMS\Serializer\Handler\ArrayCollectionHandler instance
     */
    protected function getJmsSerializer_ArrayCollectionHandlerService()
    {
        return $this->services['jms_serializer.array_collection_handler'] = new \JMS\Serializer\Handler\ArrayCollectionHandler();
    }

    /**
     * Gets the 'jms_serializer.constraint_violation_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\ConstraintViolationHandler A JMS\Serializer\Handler\ConstraintViolationHandler instance
     */
    protected function getJmsSerializer_ConstraintViolationHandlerService()
    {
        return $this->services['jms_serializer.constraint_violation_handler'] = new \JMS\Serializer\Handler\ConstraintViolationHandler();
    }

    /**
     * Gets the 'jms_serializer.datetime_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\DateHandler A JMS\Serializer\Handler\DateHandler instance
     */
    protected function getJmsSerializer_DatetimeHandlerService()
    {
        return $this->services['jms_serializer.datetime_handler'] = new \JMS\Serializer\Handler\DateHandler('Y-m-d\\TH:i:sO', 'Europe/Paris', true);
    }

    /**
     * Gets the 'jms_serializer.doctrine_proxy_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber A JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber instance
     */
    protected function getJmsSerializer_DoctrineProxySubscriberService()
    {
        return $this->services['jms_serializer.doctrine_proxy_subscriber'] = new \JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber();
    }

    /**
     * Gets the 'jms_serializer.form_error_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\FormErrorHandler A JMS\Serializer\Handler\FormErrorHandler instance
     */
    protected function getJmsSerializer_FormErrorHandlerService()
    {
        return $this->services['jms_serializer.form_error_handler'] = new \JMS\Serializer\Handler\FormErrorHandler($this->get('translator'));
    }

    /**
     * Gets the 'jms_serializer.handler_registry' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \FOS\RestBundle\Serializer\JMSHandlerRegistry A FOS\RestBundle\Serializer\JMSHandlerRegistry instance
     */
    protected function getJmsSerializer_HandlerRegistryService()
    {
        return $this->services['jms_serializer.handler_registry'] = new \FOS\RestBundle\Serializer\JMSHandlerRegistry($this->get('fos_rest.serializer.jms_handler_registry'));
    }

    /**
     * Gets the 'jms_serializer.json_deserialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\JsonDeserializationVisitor A JMS\Serializer\JsonDeserializationVisitor instance
     */
    protected function getJmsSerializer_JsonDeserializationVisitorService()
    {
        return $this->services['jms_serializer.json_deserialization_visitor'] = new \JMS\Serializer\JsonDeserializationVisitor($this->get('jms_serializer.naming_strategy'), $this->get('jms_serializer.unserialize_object_constructor'));
    }

    /**
     * Gets the 'jms_serializer.json_serialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\JsonSerializationVisitor A JMS\Serializer\JsonSerializationVisitor instance
     */
    protected function getJmsSerializer_JsonSerializationVisitorService()
    {
        $this->services['jms_serializer.json_serialization_visitor'] = $instance = new \JMS\Serializer\JsonSerializationVisitor($this->get('jms_serializer.naming_strategy'));

        $instance->setOptions(0);

        return $instance;
    }

    /**
     * Gets the 'jms_serializer.metadata_driver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Metadata\Driver\DoctrineTypeDriver A JMS\Serializer\Metadata\Driver\DoctrineTypeDriver instance
     */
    protected function getJmsSerializer_MetadataDriverService()
    {
        $a = $this->get('jms_serializer.metadata.file_locator');

        return $this->services['jms_serializer.metadata_driver'] = new \JMS\Serializer\Metadata\Driver\DoctrineTypeDriver(new \Metadata\Driver\DriverChain(array(0 => new \JMS\Serializer\Metadata\Driver\YamlDriver($a), 1 => new \JMS\Serializer\Metadata\Driver\XmlDriver($a), 2 => new \JMS\Serializer\Metadata\Driver\PhpDriver($a), 3 => new \JMS\Serializer\Metadata\Driver\AnnotationDriver($this->get('annotation_reader')))), $this->get('doctrine'));
    }

    /**
     * Gets the 'jms_serializer.naming_strategy' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Naming\CacheNamingStrategy A JMS\Serializer\Naming\CacheNamingStrategy instance
     */
    protected function getJmsSerializer_NamingStrategyService()
    {
        return $this->services['jms_serializer.naming_strategy'] = new \JMS\Serializer\Naming\CacheNamingStrategy(new \JMS\Serializer\Naming\SerializedNameAnnotationStrategy(new \JMS\Serializer\Naming\CamelCaseNamingStrategy('_', true)));
    }

    /**
     * Gets the 'jms_serializer.object_constructor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Construction\DoctrineObjectConstructor A JMS\Serializer\Construction\DoctrineObjectConstructor instance
     */
    protected function getJmsSerializer_ObjectConstructorService()
    {
        return $this->services['jms_serializer.object_constructor'] = new \JMS\Serializer\Construction\DoctrineObjectConstructor($this->get('doctrine'), $this->get('jms_serializer.unserialize_object_constructor'));
    }

    /**
     * Gets the 'jms_serializer.php_collection_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\Handler\PhpCollectionHandler A JMS\Serializer\Handler\PhpCollectionHandler instance
     */
    protected function getJmsSerializer_PhpCollectionHandlerService()
    {
        return $this->services['jms_serializer.php_collection_handler'] = new \JMS\Serializer\Handler\PhpCollectionHandler();
    }

    /**
     * Gets the 'jms_serializer.stopwatch_subscriber' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SerializerBundle\Serializer\StopwatchEventSubscriber A JMS\SerializerBundle\Serializer\StopwatchEventSubscriber instance
     */
    protected function getJmsSerializer_StopwatchSubscriberService()
    {
        return $this->services['jms_serializer.stopwatch_subscriber'] = new \JMS\SerializerBundle\Serializer\StopwatchEventSubscriber($this->get('debug.stopwatch'));
    }

    /**
     * Gets the 'jms_serializer.templating.helper.serializer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\SerializerBundle\Templating\SerializerHelper A JMS\SerializerBundle\Templating\SerializerHelper instance
     */
    protected function getJmsSerializer_Templating_Helper_SerializerService()
    {
        return $this->services['jms_serializer.templating.helper.serializer'] = new \JMS\SerializerBundle\Templating\SerializerHelper($this->get('jms_serializer'));
    }

    /**
     * Gets the 'jms_serializer.xml_deserialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\XmlDeserializationVisitor A JMS\Serializer\XmlDeserializationVisitor instance
     */
    protected function getJmsSerializer_XmlDeserializationVisitorService()
    {
        $this->services['jms_serializer.xml_deserialization_visitor'] = $instance = new \JMS\Serializer\XmlDeserializationVisitor($this->get('jms_serializer.naming_strategy'), $this->get('jms_serializer.unserialize_object_constructor'));

        $instance->setDoctypeWhitelist(array());

        return $instance;
    }

    /**
     * Gets the 'jms_serializer.xml_serialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\XmlSerializationVisitor A JMS\Serializer\XmlSerializationVisitor instance
     */
    protected function getJmsSerializer_XmlSerializationVisitorService()
    {
        return $this->services['jms_serializer.xml_serialization_visitor'] = new \JMS\Serializer\XmlSerializationVisitor($this->get('jms_serializer.naming_strategy'));
    }

    /**
     * Gets the 'jms_serializer.yaml_serialization_visitor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \JMS\Serializer\YamlSerializationVisitor A JMS\Serializer\YamlSerializationVisitor instance
     */
    protected function getJmsSerializer_YamlSerializationVisitorService()
    {
        return $this->services['jms_serializer.yaml_serialization_visitor'] = new \JMS\Serializer\YamlSerializationVisitor($this->get('jms_serializer.naming_strategy'));
    }

    /**
     * Gets the 'kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getKernelService()
    {
        throw new RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'kernel.class_cache.cache_warmer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\CacheWarmer\ClassCacheCacheWarmer A Symfony\Bundle\FrameworkBundle\CacheWarmer\ClassCacheCacheWarmer instance
     */
    protected function getKernel_ClassCache_CacheWarmerService()
    {
        return $this->services['kernel.class_cache.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\ClassCacheCacheWarmer();
    }

    /**
     * Gets the 'locale_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener A Symfony\Component\HttpKernel\EventListener\LocaleListener instance
     */
    protected function getLocaleListenerService()
    {
        return $this->services['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener($this->get('request_stack'), 'en', $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'logger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getLoggerService()
    {
        $this->services['logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');

        $instance->useMicrosecondTimestamps(true);
        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.handler.console' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\ConsoleHandler A Symfony\Bridge\Monolog\Handler\ConsoleHandler instance
     */
    protected function getMonolog_Handler_ConsoleService()
    {
        return $this->services['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, array());
    }

    /**
     * Gets the 'monolog.handler.debug' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\DebugHandler A Symfony\Bridge\Monolog\Handler\DebugHandler instance
     */
    protected function getMonolog_Handler_DebugService()
    {
        return $this->services['monolog.handler.debug'] = new \Symfony\Bridge\Monolog\Handler\DebugHandler(100, true);
    }

    /**
     * Gets the 'monolog.handler.main' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Monolog\Handler\StreamHandler A Monolog\Handler\StreamHandler instance
     */
    protected function getMonolog_Handler_MainService()
    {
        return $this->services['monolog.handler.main'] = new \Monolog\Handler\StreamHandler(($this->targetDirs[2].'/logs/dev.log'), 100, true, NULL);
    }

    /**
     * Gets the 'monolog.logger.cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_CacheService()
    {
        $this->services['monolog.logger.cache'] = $instance = new \Symfony\Bridge\Monolog\Logger('cache');

        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.doctrine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_DoctrineService()
    {
        $this->services['monolog.logger.doctrine'] = $instance = new \Symfony\Bridge\Monolog\Logger('doctrine');

        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.event' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_EventService()
    {
        $this->services['monolog.logger.event'] = $instance = new \Symfony\Bridge\Monolog\Logger('event');

        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_PhpService()
    {
        $this->services['monolog.logger.php'] = $instance = new \Symfony\Bridge\Monolog\Logger('php');

        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.profiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_ProfilerService()
    {
        $this->services['monolog.logger.profiler'] = $instance = new \Symfony\Bridge\Monolog\Logger('profiler');

        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_RouterService()
    {
        $this->services['monolog.logger.router'] = $instance = new \Symfony\Bridge\Monolog\Logger('router');

        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.security' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_SecurityService()
    {
        $this->services['monolog.logger.security'] = $instance = new \Symfony\Bridge\Monolog\Logger('security');

        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.templating' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_TemplatingService()
    {
        $this->services['monolog.logger.templating'] = $instance = new \Symfony\Bridge\Monolog\Logger('templating');

        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'monolog.logger.translation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Monolog\Logger A Symfony\Bridge\Monolog\Logger instance
     */
    protected function getMonolog_Logger_TranslationService()
    {
        $this->services['monolog.logger.translation'] = $instance = new \Symfony\Bridge\Monolog\Logger('translation');

        $instance->pushHandler($this->get('monolog.handler.console'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.debug'));

        return $instance;
    }

    /**
     * Gets the 'nelmio_api_doc.doc_comment_extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Util\DocCommentExtractor A Nelmio\ApiDocBundle\Util\DocCommentExtractor instance
     */
    protected function getNelmioApiDoc_DocCommentExtractorService()
    {
        return $this->services['nelmio_api_doc.doc_comment_extractor'] = new \Nelmio\ApiDocBundle\Util\DocCommentExtractor();
    }

    /**
     * Gets the 'nelmio_api_doc.event_listener.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\EventListener\RequestListener A Nelmio\ApiDocBundle\EventListener\RequestListener instance
     */
    protected function getNelmioApiDoc_EventListener_RequestService()
    {
        return $this->services['nelmio_api_doc.event_listener.request'] = new \Nelmio\ApiDocBundle\EventListener\RequestListener($this->get('nelmio_api_doc.extractor.api_doc_extractor'), $this->get('nelmio_api_doc.formatter.html_formatter'), '_doc');
    }

    /**
     * Gets the 'nelmio_api_doc.extractor.api_doc_extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Extractor\ApiDocExtractor A Nelmio\ApiDocBundle\Extractor\ApiDocExtractor instance
     */
    protected function getNelmioApiDoc_Extractor_ApiDocExtractorService()
    {
        $a = $this->get('nelmio_api_doc.doc_comment_extractor');
        $b = $this->get('nelmio_api_doc.parser.form_type_parser');
        $c = $this->get('nelmio_api_doc.parser.validation_parser');

        $this->services['nelmio_api_doc.extractor.api_doc_extractor'] = $instance = new \Nelmio\ApiDocBundle\Extractor\ApiDocExtractor($this, $this->get('router'), $this->get('annotation_reader'), $a, new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($this->get('kernel')), array(0 => new \Nelmio\ApiDocBundle\Extractor\Handler\FosRestHandler(), 1 => new \Nelmio\ApiDocBundle\Extractor\Handler\JmsSecurityExtraHandler(), 2 => new \Nelmio\ApiDocBundle\Extractor\Handler\SensioFrameworkExtraHandler(), 3 => new \Nelmio\ApiDocBundle\Extractor\Handler\PhpDocHandler($a)), array());

        $instance->addParser(new \CoreBundle\Parser\Parser($b, $c, $this->get('form.factory'), $a));
        $instance->addParser($this->get('nelmio_api_doc.parser.json_serializable_parser'));
        $instance->addParser($this->get('nelmio_api_doc.parser.collection_parser'));
        $instance->addParser($this->get('nelmio_api_doc.parser.form_errors_parser'));
        $instance->addParser($b);
        $instance->addParser($c);
        $instance->addParser($this->get('nelmio_api_doc.parser.jms_metadata_parser'));

        return $instance;
    }

    /**
     * Gets the 'nelmio_api_doc.form.extension.description_form_type_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Form\Extension\DescriptionFormTypeExtension A Nelmio\ApiDocBundle\Form\Extension\DescriptionFormTypeExtension instance
     */
    protected function getNelmioApiDoc_Form_Extension_DescriptionFormTypeExtensionService()
    {
        return $this->services['nelmio_api_doc.form.extension.description_form_type_extension'] = new \Nelmio\ApiDocBundle\Form\Extension\DescriptionFormTypeExtension();
    }

    /**
     * Gets the 'nelmio_api_doc.formatter.html_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Formatter\HtmlFormatter A Nelmio\ApiDocBundle\Formatter\HtmlFormatter instance
     */
    protected function getNelmioApiDoc_Formatter_HtmlFormatterService()
    {
        $this->services['nelmio_api_doc.formatter.html_formatter'] = $instance = new \Nelmio\ApiDocBundle\Formatter\HtmlFormatter();

        $instance->setTemplatingEngine($this->get('templating'));
        $instance->setMotdTemplate('NelmioApiDocBundle::Components/motd.html.twig');
        $instance->setApiName('API documentation');
        $instance->setEnableSandbox(true);
        $instance->setEndpoint(NULL);
        $instance->setRequestFormatMethod('format_param');
        $instance->setRequestFormats(array('json' => 'application/json', 'xml' => 'application/xml'));
        $instance->setDefaultRequestFormat('json');
        $instance->setAcceptType(NULL);
        $instance->setBodyFormats(array(0 => 'form', 1 => 'json'));
        $instance->setDefaultBodyFormat('form');
        $instance->setAuthentication(NULL);
        $instance->setDefaultSectionsOpened(true);

        return $instance;
    }

    /**
     * Gets the 'nelmio_api_doc.formatter.markdown_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Formatter\MarkdownFormatter A Nelmio\ApiDocBundle\Formatter\MarkdownFormatter instance
     */
    protected function getNelmioApiDoc_Formatter_MarkdownFormatterService()
    {
        return $this->services['nelmio_api_doc.formatter.markdown_formatter'] = new \Nelmio\ApiDocBundle\Formatter\MarkdownFormatter();
    }

    /**
     * Gets the 'nelmio_api_doc.formatter.simple_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Formatter\SimpleFormatter A Nelmio\ApiDocBundle\Formatter\SimpleFormatter instance
     */
    protected function getNelmioApiDoc_Formatter_SimpleFormatterService()
    {
        return $this->services['nelmio_api_doc.formatter.simple_formatter'] = new \Nelmio\ApiDocBundle\Formatter\SimpleFormatter();
    }

    /**
     * Gets the 'nelmio_api_doc.formatter.swagger_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Formatter\SwaggerFormatter A Nelmio\ApiDocBundle\Formatter\SwaggerFormatter instance
     */
    protected function getNelmioApiDoc_Formatter_SwaggerFormatterService()
    {
        $this->services['nelmio_api_doc.formatter.swagger_formatter'] = $instance = new \Nelmio\ApiDocBundle\Formatter\SwaggerFormatter('dot_notation');

        $instance->setBasePath('/api');
        $instance->setApiVersion('0.1');
        $instance->setSwaggerVersion('1.2');
        $instance->setInfo(array('title' => 'Symfony2', 'description' => 'My awesome Symfony2 app!', 'TermsOfServiceUrl' => NULL, 'contact' => NULL, 'license' => NULL, 'licenseUrl' => NULL));

        return $instance;
    }

    /**
     * Gets the 'nelmio_api_doc.parser.collection_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Parser\CollectionParser A Nelmio\ApiDocBundle\Parser\CollectionParser instance
     */
    protected function getNelmioApiDoc_Parser_CollectionParserService()
    {
        return $this->services['nelmio_api_doc.parser.collection_parser'] = new \Nelmio\ApiDocBundle\Parser\CollectionParser();
    }

    /**
     * Gets the 'nelmio_api_doc.parser.form_errors_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Parser\FormErrorsParser A Nelmio\ApiDocBundle\Parser\FormErrorsParser instance
     */
    protected function getNelmioApiDoc_Parser_FormErrorsParserService()
    {
        return $this->services['nelmio_api_doc.parser.form_errors_parser'] = new \Nelmio\ApiDocBundle\Parser\FormErrorsParser();
    }

    /**
     * Gets the 'nelmio_api_doc.parser.form_type_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Parser\FormTypeParser A Nelmio\ApiDocBundle\Parser\FormTypeParser instance
     */
    protected function getNelmioApiDoc_Parser_FormTypeParserService()
    {
        return $this->services['nelmio_api_doc.parser.form_type_parser'] = new \Nelmio\ApiDocBundle\Parser\FormTypeParser($this->get('form.factory'), true);
    }

    /**
     * Gets the 'nelmio_api_doc.parser.jms_metadata_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Parser\JmsMetadataParser A Nelmio\ApiDocBundle\Parser\JmsMetadataParser instance
     */
    protected function getNelmioApiDoc_Parser_JmsMetadataParserService()
    {
        return $this->services['nelmio_api_doc.parser.jms_metadata_parser'] = new \Nelmio\ApiDocBundle\Parser\JmsMetadataParser($this->get('jms_serializer.metadata_factory'), $this->get('jms_serializer.naming_strategy'), $this->get('nelmio_api_doc.doc_comment_extractor'));
    }

    /**
     * Gets the 'nelmio_api_doc.parser.json_serializable_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Parser\JsonSerializableParser A Nelmio\ApiDocBundle\Parser\JsonSerializableParser instance
     */
    protected function getNelmioApiDoc_Parser_JsonSerializableParserService()
    {
        return $this->services['nelmio_api_doc.parser.json_serializable_parser'] = new \Nelmio\ApiDocBundle\Parser\JsonSerializableParser();
    }

    /**
     * Gets the 'nelmio_api_doc.parser.validation_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Parser\ValidationParser A Nelmio\ApiDocBundle\Parser\ValidationParser instance
     */
    protected function getNelmioApiDoc_Parser_ValidationParserService()
    {
        return $this->services['nelmio_api_doc.parser.validation_parser'] = new \Nelmio\ApiDocBundle\Parser\ValidationParser($this->get('validator'));
    }

    /**
     * Gets the 'nelmio_api_doc.twig.extension.extra_markdown' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\ApiDocBundle\Twig\Extension\MarkdownExtension A Nelmio\ApiDocBundle\Twig\Extension\MarkdownExtension instance
     */
    protected function getNelmioApiDoc_Twig_Extension_ExtraMarkdownService()
    {
        return $this->services['nelmio_api_doc.twig.extension.extra_markdown'] = new \Nelmio\ApiDocBundle\Twig\Extension\MarkdownExtension();
    }

    /**
     * Gets the 'nelmio_cors.cors_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\CorsBundle\EventListener\CorsListener A Nelmio\CorsBundle\EventListener\CorsListener instance
     */
    protected function getNelmioCors_CorsListenerService()
    {
        return $this->services['nelmio_cors.cors_listener'] = new \Nelmio\CorsBundle\EventListener\CorsListener($this->get('debug.event_dispatcher'), new \Nelmio\CorsBundle\Options\Resolver(array(0 => $this->get('nelmio_cors.options_provider.config'))));
    }

    /**
     * Gets the 'nelmio_cors.options_provider.config' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Nelmio\CorsBundle\Options\ConfigProvider A Nelmio\CorsBundle\Options\ConfigProvider instance
     */
    protected function getNelmioCors_OptionsProvider_ConfigService()
    {
        return $this->services['nelmio_cors.options_provider.config'] = new \Nelmio\CorsBundle\Options\ConfigProvider(array('^/' => array()), array('allow_origin' => true, 'allow_credentials' => false, 'allow_headers' => array(0 => 'content-type', 1 => 'authorization', 2 => 'x-accept-version'), 'expose_headers' => array(0 => 'link'), 'allow_methods' => array(0 => 'POST', 1 => 'PUT', 2 => 'PATCH', 3 => 'GET', 4 => 'DELETE', 5 => 'OPTIONS'), 'max_age' => 3600, 'hosts' => array(), 'origin_regex' => false));
    }

    /**
     * Gets the 'pagerfanta.convert_not_valid_current_page_to_not_found_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \WhiteOctober\PagerfantaBundle\EventListener\ConvertNotValidCurrentPageToNotFoundListener A WhiteOctober\PagerfantaBundle\EventListener\ConvertNotValidCurrentPageToNotFoundListener instance
     */
    protected function getPagerfanta_ConvertNotValidCurrentPageToNotFoundListenerService()
    {
        return $this->services['pagerfanta.convert_not_valid_current_page_to_not_found_listener'] = new \WhiteOctober\PagerfantaBundle\EventListener\ConvertNotValidCurrentPageToNotFoundListener();
    }

    /**
     * Gets the 'pagerfanta.convert_not_valid_max_per_page_to_not_found_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \WhiteOctober\PagerfantaBundle\EventListener\ConvertNotValidMaxPerPageToNotFoundListener A WhiteOctober\PagerfantaBundle\EventListener\ConvertNotValidMaxPerPageToNotFoundListener instance
     */
    protected function getPagerfanta_ConvertNotValidMaxPerPageToNotFoundListenerService()
    {
        return $this->services['pagerfanta.convert_not_valid_max_per_page_to_not_found_listener'] = new \WhiteOctober\PagerfantaBundle\EventListener\ConvertNotValidMaxPerPageToNotFoundListener();
    }

    /**
     * Gets the 'profiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Profiler\Profiler A Symfony\Component\HttpKernel\Profiler\Profiler instance
     */
    protected function getProfilerService()
    {
        $a = $this->get('monolog.logger.profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $b = $this->get('kernel', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        $c = new \Doctrine\Bundle\DoctrineBundle\DataCollector\DoctrineDataCollector($this->get('doctrine'));
        $c->addLogger('default', $this->get('doctrine.dbal.logger.profiling.default'));

        $d = new \Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector();
        if ($this->has('kernel')) {
            $d->setKernel($b);
        }

        $this->services['profiler'] = $instance = new \Symfony\Component\HttpKernel\Profiler\Profiler(new \Symfony\Component\HttpKernel\Profiler\FileProfilerStorage(('file:'.__DIR__.'/profiler')), $a);

        $instance->add($this->get('data_collector.request'));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\TimeDataCollector($b, $this->get('debug.stopwatch', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector());
        $instance->add($this->get('data_collector.form'));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector($a));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector($this->get('debug.event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $instance->add($this->get('data_collector.router'));
        $instance->add($this->get('data_collector.translation'));
        $instance->add(new \Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector($this->get('security.token_storage', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.role_hierarchy'), $this->get('security.logout_url_generator'), $this->get('debug.security.access.decision_manager')));
        $instance->add(new \Symfony\Bridge\Twig\DataCollector\TwigDataCollector($this->get('twig.profile')));
        $instance->add($c);
        $instance->add(new \Symfony\Bundle\SwiftmailerBundle\DataCollector\MessageDataCollector($this));
        $instance->add($this->get('data_collector.dump'));
        $instance->add($d);

        return $instance;
    }

    /**
     * Gets the 'profiler_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ProfilerListener A Symfony\Component\HttpKernel\EventListener\ProfilerListener instance
     */
    protected function getProfilerListenerService()
    {
        return $this->services['profiler_listener'] = new \Symfony\Component\HttpKernel\EventListener\ProfilerListener($this->get('profiler'), $this->get('request_stack'), NULL, false, false);
    }

    /**
     * Gets the 'property_accessor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor A Symfony\Component\PropertyAccess\PropertyAccessor instance
     */
    protected function getPropertyAccessorService()
    {
        return $this->services['property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor(false, false);
    }

    /**
     * Gets the 'request_stack' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack A Symfony\Component\HttpFoundation\RequestStack instance
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the 'response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ResponseListener A Symfony\Component\HttpKernel\EventListener\ResponseListener instance
     */
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }

    /**
     * Gets the 'router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router A Symfony\Bundle\FrameworkBundle\Routing\Router instance
     */
    protected function getRouterService()
    {
        $this->services['router'] = $instance = new \Symfony\Bundle\FrameworkBundle\Routing\Router($this, ($this->targetDirs[3].'/app/config/routing_dev.yml'), array('cache_dir' => __DIR__, 'debug' => true, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper', 'generator_cache_class' => 'appDevDebugProjectContainerUrlGenerator', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper', 'matcher_cache_class' => 'appDevDebugProjectContainerUrlMatcher', 'strict_requirements' => true), $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('monolog.logger.router', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        $instance->setConfigCacheFactory($this->get('config_cache_factory'));

        return $instance;
    }

    /**
     * Gets the 'router_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener A Symfony\Component\HttpKernel\EventListener\RouterListener instance
     */
    protected function getRouterListenerService()
    {
        return $this->services['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener($this->get('router'), $this->get('request_stack'), $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'routing.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader A Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader instance
     */
    protected function getRouting_LoaderService()
    {
        $a = $this->get('controller_name_converter');
        $b = $this->get('file_locator');
        $c = $this->get('annotation_reader');

        $d = new \Sensio\Bundle\FrameworkExtraBundle\Routing\AnnotatedRouteControllerLoader($c);

        $e = new \FOS\RestBundle\Routing\Loader\RestRouteProcessor();

        $f = new \Symfony\Component\Config\Loader\LoaderResolver();
        $f->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($b));
        $f->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($b));
        $f->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($b));
        $f->addLoader(new \Symfony\Component\Routing\Loader\DirectoryLoader($b));
        $f->addLoader(new \Symfony\Component\Routing\Loader\DependencyInjection\ServiceRouterLoader($this));
        $f->addLoader(new \Symfony\Component\Routing\Loader\AnnotationDirectoryLoader($b, $d));
        $f->addLoader(new \Symfony\Component\Routing\Loader\AnnotationFileLoader($b, $d));
        $f->addLoader($d);
        $f->addLoader(new \FOS\RestBundle\Routing\Loader\DirectoryRouteLoader($b, $e));
        $f->addLoader(new \FOS\RestBundle\Routing\Loader\RestRouteLoader($this, $b, $a, new \FOS\RestBundle\Routing\Loader\Reader\RestControllerReader(new \FOS\RestBundle\Routing\Loader\Reader\RestActionReader($c, $this->get('fos_rest.request.param_fetcher.reader'), $this->get('fos_rest.inflector'), false, array('json' => false, 'html' => true)), $c), 'json'));
        $f->addLoader(new \FOS\RestBundle\Routing\Loader\RestYamlCollectionLoader($b, $e, false, array('json' => false, 'html' => true), 'json'));
        $f->addLoader(new \FOS\RestBundle\Routing\Loader\RestXmlCollectionLoader($b, $e, false, array('json' => false, 'html' => true), 'json'));

        return $this->services['routing.loader'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader($a, $f);
    }

    /**
     * Gets the 'security.authentication.guard_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Guard\GuardAuthenticatorHandler A Symfony\Component\Security\Guard\GuardAuthenticatorHandler instance
     */
    protected function getSecurity_Authentication_GuardHandlerService()
    {
        return $this->services['security.authentication.guard_handler'] = new \Symfony\Component\Security\Guard\GuardAuthenticatorHandler($this->get('security.token_storage'), $this->get('debug.event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'security.authentication_utils' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Http\Authentication\AuthenticationUtils A Symfony\Component\Security\Http\Authentication\AuthenticationUtils instance
     */
    protected function getSecurity_AuthenticationUtilsService()
    {
        return $this->services['security.authentication_utils'] = new \Symfony\Component\Security\Http\Authentication\AuthenticationUtils($this->get('request_stack'));
    }

    /**
     * Gets the 'security.authorization_checker' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AuthorizationChecker A Symfony\Component\Security\Core\Authorization\AuthorizationChecker instance
     */
    protected function getSecurity_AuthorizationCheckerService()
    {
        return $this->services['security.authorization_checker'] = new \Symfony\Component\Security\Core\Authorization\AuthorizationChecker($this->get('security.token_storage'), $this->get('security.authentication.manager'), $this->get('debug.security.access.decision_manager'), false);
    }

    /**
     * Gets the 'security.csrf.token_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Csrf\CsrfTokenManager A Symfony\Component\Security\Csrf\CsrfTokenManager instance
     */
    protected function getSecurity_Csrf_TokenManagerService()
    {
        return $this->services['security.csrf.token_manager'] = new \Symfony\Component\Security\Csrf\CsrfTokenManager(new \Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator(), new \Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage($this->get('session')));
    }

    /**
     * Gets the 'security.encoder_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Encoder\EncoderFactory A Symfony\Component\Security\Core\Encoder\EncoderFactory instance
     */
    protected function getSecurity_EncoderFactoryService()
    {
        return $this->services['security.encoder_factory'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(array('FOS\\UserBundle\\Model\\UserInterface' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\BCryptPasswordEncoder', 'arguments' => array(0 => 13))));
    }

    /**
     * Gets the 'security.firewall' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Http\Firewall A Symfony\Component\Security\Http\Firewall instance
     */
    protected function getSecurity_FirewallService()
    {
        return $this->services['security.firewall'] = new \Symfony\Component\Security\Http\Firewall(new \Symfony\Bundle\SecurityBundle\Security\FirewallMap($this, array('security.firewall.map.context.dev' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/(_(profiler|wdt)|css|images|js)/'), 'security.firewall.map.context.oauth_token' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/oauth/v2/token'), 'security.firewall.map.context.oauth_authorize' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/oauth/v2/auth'), 'security.firewall.map.context.api' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/'))), $this->get('debug.event_dispatcher'));
    }

    /**
     * Gets the 'security.firewall.map.context.api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance
     */
    protected function getSecurity_Firewall_Map_Context_ApiService()
    {
        $a = $this->get('security.token_storage');
        $b = $this->get('security.authentication.manager');
        $c = $this->get('fos_oauth_server.server');
        $d = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.firewall.map.context.api'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \FOS\OAuthServerBundle\Security\Firewall\OAuthListener($a, $b, $c), 2 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '5820909761e620.11958170', $d, $b), 3 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $this->get('security.http_utils'), 'api', new \FOS\OAuthServerBundle\Security\EntryPoint\OAuthEntryPoint($c), NULL, NULL, $d, true));
    }

    /**
     * Gets the 'security.firewall.map.context.dev' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance
     */
    protected function getSecurity_Firewall_Map_Context_DevService()
    {
        return $this->services['security.firewall.map.context.dev'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(), NULL);
    }

    /**
     * Gets the 'security.firewall.map.context.oauth_authorize' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance
     */
    protected function getSecurity_Firewall_Map_Context_OauthAuthorizeService()
    {
        $a = $this->get('security.token_storage');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $c = $this->get('debug.event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $d = $this->get('security.authentication.trust_resolver');
        $e = $this->get('security.http_utils');
        $f = $this->get('http_kernel');
        $g = $this->get('security.authentication.manager');

        $h = new \Symfony\Component\Security\Http\Firewall\LogoutListener($a, $e, new \Symfony\Component\Security\Http\Logout\DefaultLogoutSuccessHandler($e, '/'), array('csrf_parameter' => '_csrf_token', 'csrf_token_id' => 'logout', 'logout_path' => '/logout'));
        $h->addHandler(new \Symfony\Component\Security\Http\Logout\SessionLogoutHandler());

        $i = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler($e, array());
        $i->setOptions(array('login_path' => '/oauth/v2/auth_login', 'always_use_default_target_path' => false, 'default_target_path' => '/', 'target_path_parameter' => '_target_path', 'use_referer' => false));
        $i->setProviderKey('oauth_authorize');

        $j = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler($f, $e, array(), $b);
        $j->setOptions(array('login_path' => '/oauth/v2/auth_login', 'failure_path' => NULL, 'failure_forward' => false, 'failure_path_parameter' => '_failure_path'));

        return $this->services['security.firewall.map.context.oauth_authorize'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($a, array(0 => $this->get('fos_user.user_provider.username_email')), 'oauth_authorize', $b, $c, $d), 2 => $h, 3 => new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($a, $g, $this->get('security.authentication.session_strategy'), $e, 'oauth_authorize', $i, $j, array('check_path' => '/oauth/v2/auth_login_check', 'use_forward' => false, 'require_previous_session' => true, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_parameter' => '_csrf_token', 'csrf_token_id' => 'authenticate', 'post_only' => true), $b, $c, $this->get('security.csrf.token_manager')), 4 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '5820909761e620.11958170', $b, $g), 5 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $d, $e, 'oauth_authorize', new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($f, $e, '/oauth/v2/auth_login', false), NULL, NULL, $b, false));
    }

    /**
     * Gets the 'security.firewall.map.context.oauth_token' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext A Symfony\Bundle\SecurityBundle\Security\FirewallContext instance
     */
    protected function getSecurity_Firewall_Map_Context_OauthTokenService()
    {
        return $this->services['security.firewall.map.context.oauth_token'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(), NULL);
    }

    /**
     * Gets the 'security.password_encoder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Encoder\UserPasswordEncoder A Symfony\Component\Security\Core\Encoder\UserPasswordEncoder instance
     */
    protected function getSecurity_PasswordEncoderService()
    {
        return $this->services['security.password_encoder'] = new \Symfony\Component\Security\Core\Encoder\UserPasswordEncoder($this->get('security.encoder_factory'));
    }

    /**
     * Gets the 'security.rememberme.response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Http\RememberMe\ResponseListener A Symfony\Component\Security\Http\RememberMe\ResponseListener instance
     */
    protected function getSecurity_Rememberme_ResponseListenerService()
    {
        return $this->services['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener();
    }

    /**
     * Gets the 'security.token_storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage A Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage instance
     */
    protected function getSecurity_TokenStorageService()
    {
        return $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage();
    }

    /**
     * Gets the 'security.user_checker.oauth_authorize' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\User\UserChecker A Symfony\Component\Security\Core\User\UserChecker instance
     */
    protected function getSecurity_UserChecker_OauthAuthorizeService()
    {
        return $this->services['security.user_checker.oauth_authorize'] = new \Symfony\Component\Security\Core\User\UserChecker();
    }

    /**
     * Gets the 'security.validator.user_password' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator A Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator instance
     */
    protected function getSecurity_Validator_UserPasswordService()
    {
        return $this->services['security.validator.user_password'] = new \Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator($this->get('security.token_storage'), $this->get('security.encoder_factory'));
    }

    /**
     * Gets the 'sensio_distribution.security_checker' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \SensioLabs\Security\SecurityChecker A SensioLabs\Security\SecurityChecker instance
     */
    protected function getSensioDistribution_SecurityCheckerService()
    {
        return $this->services['sensio_distribution.security_checker'] = new \SensioLabs\Security\SecurityChecker();
    }

    /**
     * Gets the 'sensio_distribution.security_checker.command' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \SensioLabs\Security\Command\SecurityCheckerCommand A SensioLabs\Security\Command\SecurityCheckerCommand instance
     */
    protected function getSensioDistribution_SecurityChecker_CommandService()
    {
        return $this->services['sensio_distribution.security_checker.command'] = new \SensioLabs\Security\Command\SecurityCheckerCommand($this->get('sensio_distribution.security_checker'));
    }

    /**
     * Gets the 'sensio_framework_extra.cache.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener instance
     */
    protected function getSensioFrameworkExtra_Cache_ListenerService()
    {
        return $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener();
    }

    /**
     * Gets the 'sensio_framework_extra.controller.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener instance
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->services['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener($this->get('annotation_reader'));
    }

    /**
     * Gets the 'sensio_framework_extra.converter.datetime' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter A Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter instance
     */
    protected function getSensioFrameworkExtra_Converter_DatetimeService()
    {
        return $this->services['sensio_framework_extra.converter.datetime'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter();
    }

    /**
     * Gets the 'sensio_framework_extra.converter.doctrine.orm' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter A Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter instance
     */
    protected function getSensioFrameworkExtra_Converter_Doctrine_OrmService()
    {
        return $this->services['sensio_framework_extra.converter.doctrine.orm'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter($this->get('doctrine', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'sensio_framework_extra.converter.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener instance
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        return $this->services['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener($this->get('sensio_framework_extra.converter.manager'), true);
    }

    /**
     * Gets the 'sensio_framework_extra.converter.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager A Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager instance
     */
    protected function getSensioFrameworkExtra_Converter_ManagerService()
    {
        $this->services['sensio_framework_extra.converter.manager'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();

        $instance->add($this->get('sensio_framework_extra.converter.doctrine.orm'), 0, 'doctrine.orm');
        $instance->add($this->get('sensio_framework_extra.converter.datetime'), 0, 'datetime');

        return $instance;
    }

    /**
     * Gets the 'sensio_framework_extra.security.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener instance
     */
    protected function getSensioFrameworkExtra_Security_ListenerService()
    {
        return $this->services['sensio_framework_extra.security.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener(NULL, new \Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage(), $this->get('security.authentication.trust_resolver', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.role_hierarchy', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.token_storage', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.authorization_checker', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'sensio_framework_extra.view.guesser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser A Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser instance
     */
    protected function getSensioFrameworkExtra_View_GuesserService()
    {
        return $this->services['sensio_framework_extra.view.guesser'] = new \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser($this->get('kernel'));
    }

    /**
     * Gets the 'sensio_framework_extra.view.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener A Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener instance
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        return $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener($this);
    }

    /**
     * Gets the 'service_container' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getServiceContainerService()
    {
        throw new RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Session A Symfony\Component\HttpFoundation\Session\Session instance
     */
    protected function getSessionService()
    {
        return $this->services['session'] = new \Symfony\Component\HttpFoundation\Session\Session($this->get('session.storage.native'), new \Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag(), new \Symfony\Component\HttpFoundation\Session\Flash\FlashBag());
    }

    /**
     * Gets the 'session.handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler A Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler instance
     */
    protected function getSession_HandlerService()
    {
        return $this->services['session.handler'] = new \Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler(($this->targetDirs[3].'/app/../var/sessions/dev'));
    }

    /**
     * Gets the 'session.save_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SaveSessionListener A Symfony\Component\HttpKernel\EventListener\SaveSessionListener instance
     */
    protected function getSession_SaveListenerService()
    {
        return $this->services['session.save_listener'] = new \Symfony\Component\HttpKernel\EventListener\SaveSessionListener();
    }

    /**
     * Gets the 'session.storage.filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage A Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage instance
     */
    protected function getSession_Storage_FilesystemService()
    {
        return $this->services['session.storage.filesystem'] = new \Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage((__DIR__.'/sessions'), 'MOCKSESSID', $this->get('session.storage.metadata_bag'));
    }

    /**
     * Gets the 'session.storage.native' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage A Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage instance
     */
    protected function getSession_Storage_NativeService()
    {
        return $this->services['session.storage.native'] = new \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage(array('cookie_httponly' => true, 'gc_probability' => 1), $this->get('session.handler'), $this->get('session.storage.metadata_bag'));
    }

    /**
     * Gets the 'session.storage.php_bridge' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage A Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage instance
     */
    protected function getSession_Storage_PhpBridgeService()
    {
        return $this->services['session.storage.php_bridge'] = new \Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage($this->get('session.handler'), $this->get('session.storage.metadata_bag'));
    }

    /**
     * Gets the 'session_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\SessionListener A Symfony\Bundle\FrameworkBundle\EventListener\SessionListener instance
     */
    protected function getSessionListenerService()
    {
        return $this->services['session_listener'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SessionListener($this);
    }

    /**
     * Gets the 'stof_doctrine_extensions.uploadable.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager A Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager instance
     */
    protected function getStofDoctrineExtensions_Uploadable_ManagerService()
    {
        $a = new \Gedmo\Uploadable\UploadableListener(new \Stof\DoctrineExtensionsBundle\Uploadable\MimeTypeGuesserAdapter());
        $a->setAnnotationReader($this->get('annotation_reader'));
        $a->setDefaultFileInfoClass('Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo');

        return $this->services['stof_doctrine_extensions.uploadable.manager'] = new \Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager($a, 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo');
    }

    /**
     * Gets the 'streamed_response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener A Symfony\Component\HttpKernel\EventListener\StreamedResponseListener instance
     */
    protected function getStreamedResponseListenerService()
    {
        return $this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener();
    }

    /**
     * Gets the 'swiftmailer.email_sender.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener A Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener instance
     */
    protected function getSwiftmailer_EmailSender_ListenerService()
    {
        return $this->services['swiftmailer.email_sender.listener'] = new \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener($this, $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'swiftmailer.mailer.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Mailer A Swift_Mailer instance
     */
    protected function getSwiftmailer_Mailer_DefaultService()
    {
        return $this->services['swiftmailer.mailer.default'] = new \Swift_Mailer($this->get('swiftmailer.mailer.default.transport'));
    }

    /**
     * Gets the 'swiftmailer.mailer.default.plugin.messagelogger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Plugins_MessageLogger A Swift_Plugins_MessageLogger instance
     */
    protected function getSwiftmailer_Mailer_Default_Plugin_MessageloggerService()
    {
        return $this->services['swiftmailer.mailer.default.plugin.messagelogger'] = new \Swift_Plugins_MessageLogger();
    }

    /**
     * Gets the 'swiftmailer.mailer.default.spool' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_MemorySpool A Swift_MemorySpool instance
     */
    protected function getSwiftmailer_Mailer_Default_SpoolService()
    {
        return $this->services['swiftmailer.mailer.default.spool'] = new \Swift_MemorySpool();
    }

    /**
     * Gets the 'swiftmailer.mailer.default.transport' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Transport_SpoolTransport A Swift_Transport_SpoolTransport instance
     */
    protected function getSwiftmailer_Mailer_Default_TransportService()
    {
        $this->services['swiftmailer.mailer.default.transport'] = $instance = new \Swift_Transport_SpoolTransport($this->get('swiftmailer.mailer.default.transport.eventdispatcher'), $this->get('swiftmailer.mailer.default.spool'));

        $instance->registerPlugin($this->get('swiftmailer.plugin.impersonate'));
        $instance->registerPlugin($this->get('swiftmailer.mailer.default.plugin.messagelogger'));

        return $instance;
    }

    /**
     * Gets the 'swiftmailer.mailer.default.transport.real' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Transport_EsmtpTransport A Swift_Transport_EsmtpTransport instance
     */
    protected function getSwiftmailer_Mailer_Default_Transport_RealService()
    {
        $a = new \Swift_Transport_Esmtp_AuthHandler(array(0 => new \Swift_Transport_Esmtp_Auth_CramMd5Authenticator(), 1 => new \Swift_Transport_Esmtp_Auth_LoginAuthenticator(), 2 => new \Swift_Transport_Esmtp_Auth_PlainAuthenticator()));
        $a->setUsername(NULL);
        $a->setPassword(NULL);
        $a->setAuthMode(NULL);

        $this->services['swiftmailer.mailer.default.transport.real'] = $instance = new \Swift_Transport_EsmtpTransport(new \Swift_Transport_StreamBuffer(new \Swift_StreamFilters_StringReplacementFilterFactory()), array(0 => $a), $this->get('swiftmailer.mailer.default.transport.eventdispatcher'));

        $instance->setHost('127.0.0.1');
        $instance->setPort(1025);
        $instance->setEncryption(NULL);
        $instance->setTimeout(30);
        $instance->setSourceIp(NULL);
        (new \Symfony\Bundle\SwiftmailerBundle\DependencyInjection\SmtpTransportConfigurator(NULL, $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE)))->configure($instance);

        return $instance;
    }

    /**
     * Gets the 'swiftmailer.plugin.impersonate' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Swift_Plugins_ImpersonatePlugin A Swift_Plugins_ImpersonatePlugin instance
     */
    protected function getSwiftmailer_Plugin_ImpersonateService()
    {
        return $this->services['swiftmailer.plugin.impersonate'] = new \Swift_Plugins_ImpersonatePlugin('no-reply@symfony.local');
    }

    /**
     * Gets the 'templating' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\TwigBundle\TwigEngine A Symfony\Bundle\TwigBundle\TwigEngine instance
     */
    protected function getTemplatingService()
    {
        return $this->services['templating'] = new \Symfony\Bundle\TwigBundle\TwigEngine($this->get('twig'), $this->get('templating.name_parser'), $this->get('templating.locator'));
    }

    /**
     * Gets the 'templating.filename_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\TemplateFilenameParser A Symfony\Bundle\FrameworkBundle\Templating\TemplateFilenameParser instance
     */
    protected function getTemplating_FilenameParserService()
    {
        return $this->services['templating.filename_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateFilenameParser();
    }

    /**
     * Gets the 'templating.helper.logout_url' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Templating\Helper\LogoutUrlHelper A Symfony\Bundle\SecurityBundle\Templating\Helper\LogoutUrlHelper instance
     */
    protected function getTemplating_Helper_LogoutUrlService()
    {
        return $this->services['templating.helper.logout_url'] = new \Symfony\Bundle\SecurityBundle\Templating\Helper\LogoutUrlHelper($this->get('security.logout_url_generator'));
    }

    /**
     * Gets the 'templating.helper.security' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper A Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper instance
     */
    protected function getTemplating_Helper_SecurityService()
    {
        return $this->services['templating.helper.security'] = new \Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper($this->get('security.authorization_checker', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'templating.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader A Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader instance
     */
    protected function getTemplating_LoaderService()
    {
        return $this->services['templating.loader'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader($this->get('templating.locator'));
    }

    /**
     * Gets the 'templating.name_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser A Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser instance
     */
    protected function getTemplating_NameParserService()
    {
        return $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser($this->get('kernel'));
    }

    /**
     * Gets the 'translation.dumper.csv' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\CsvFileDumper A Symfony\Component\Translation\Dumper\CsvFileDumper instance
     */
    protected function getTranslation_Dumper_CsvService()
    {
        return $this->services['translation.dumper.csv'] = new \Symfony\Component\Translation\Dumper\CsvFileDumper();
    }

    /**
     * Gets the 'translation.dumper.ini' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\IniFileDumper A Symfony\Component\Translation\Dumper\IniFileDumper instance
     */
    protected function getTranslation_Dumper_IniService()
    {
        return $this->services['translation.dumper.ini'] = new \Symfony\Component\Translation\Dumper\IniFileDumper();
    }

    /**
     * Gets the 'translation.dumper.json' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\JsonFileDumper A Symfony\Component\Translation\Dumper\JsonFileDumper instance
     */
    protected function getTranslation_Dumper_JsonService()
    {
        return $this->services['translation.dumper.json'] = new \Symfony\Component\Translation\Dumper\JsonFileDumper();
    }

    /**
     * Gets the 'translation.dumper.mo' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\MoFileDumper A Symfony\Component\Translation\Dumper\MoFileDumper instance
     */
    protected function getTranslation_Dumper_MoService()
    {
        return $this->services['translation.dumper.mo'] = new \Symfony\Component\Translation\Dumper\MoFileDumper();
    }

    /**
     * Gets the 'translation.dumper.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\PhpFileDumper A Symfony\Component\Translation\Dumper\PhpFileDumper instance
     */
    protected function getTranslation_Dumper_PhpService()
    {
        return $this->services['translation.dumper.php'] = new \Symfony\Component\Translation\Dumper\PhpFileDumper();
    }

    /**
     * Gets the 'translation.dumper.po' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\PoFileDumper A Symfony\Component\Translation\Dumper\PoFileDumper instance
     */
    protected function getTranslation_Dumper_PoService()
    {
        return $this->services['translation.dumper.po'] = new \Symfony\Component\Translation\Dumper\PoFileDumper();
    }

    /**
     * Gets the 'translation.dumper.qt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\QtFileDumper A Symfony\Component\Translation\Dumper\QtFileDumper instance
     */
    protected function getTranslation_Dumper_QtService()
    {
        return $this->services['translation.dumper.qt'] = new \Symfony\Component\Translation\Dumper\QtFileDumper();
    }

    /**
     * Gets the 'translation.dumper.res' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\IcuResFileDumper A Symfony\Component\Translation\Dumper\IcuResFileDumper instance
     */
    protected function getTranslation_Dumper_ResService()
    {
        return $this->services['translation.dumper.res'] = new \Symfony\Component\Translation\Dumper\IcuResFileDumper();
    }

    /**
     * Gets the 'translation.dumper.xliff' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\XliffFileDumper A Symfony\Component\Translation\Dumper\XliffFileDumper instance
     */
    protected function getTranslation_Dumper_XliffService()
    {
        return $this->services['translation.dumper.xliff'] = new \Symfony\Component\Translation\Dumper\XliffFileDumper();
    }

    /**
     * Gets the 'translation.dumper.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Dumper\YamlFileDumper A Symfony\Component\Translation\Dumper\YamlFileDumper instance
     */
    protected function getTranslation_Dumper_YmlService()
    {
        return $this->services['translation.dumper.yml'] = new \Symfony\Component\Translation\Dumper\YamlFileDumper();
    }

    /**
     * Gets the 'translation.extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Extractor\ChainExtractor A Symfony\Component\Translation\Extractor\ChainExtractor instance
     */
    protected function getTranslation_ExtractorService()
    {
        $this->services['translation.extractor'] = $instance = new \Symfony\Component\Translation\Extractor\ChainExtractor();

        $instance->addExtractor('php', $this->get('translation.extractor.php'));
        $instance->addExtractor('twig', $this->get('twig.translation.extractor'));

        return $instance;
    }

    /**
     * Gets the 'translation.extractor.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor A Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor instance
     */
    protected function getTranslation_Extractor_PhpService()
    {
        return $this->services['translation.extractor.php'] = new \Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor();
    }

    /**
     * Gets the 'translation.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader A Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader instance
     */
    protected function getTranslation_LoaderService()
    {
        $a = $this->get('translation.loader.xliff');

        $this->services['translation.loader'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader();

        $instance->addLoader('php', $this->get('translation.loader.php'));
        $instance->addLoader('yml', $this->get('translation.loader.yml'));
        $instance->addLoader('xlf', $a);
        $instance->addLoader('xliff', $a);
        $instance->addLoader('po', $this->get('translation.loader.po'));
        $instance->addLoader('mo', $this->get('translation.loader.mo'));
        $instance->addLoader('ts', $this->get('translation.loader.qt'));
        $instance->addLoader('csv', $this->get('translation.loader.csv'));
        $instance->addLoader('res', $this->get('translation.loader.res'));
        $instance->addLoader('dat', $this->get('translation.loader.dat'));
        $instance->addLoader('ini', $this->get('translation.loader.ini'));
        $instance->addLoader('json', $this->get('translation.loader.json'));

        return $instance;
    }

    /**
     * Gets the 'translation.loader.csv' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\CsvFileLoader A Symfony\Component\Translation\Loader\CsvFileLoader instance
     */
    protected function getTranslation_Loader_CsvService()
    {
        return $this->services['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader();
    }

    /**
     * Gets the 'translation.loader.dat' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuDatFileLoader A Symfony\Component\Translation\Loader\IcuDatFileLoader instance
     */
    protected function getTranslation_Loader_DatService()
    {
        return $this->services['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader();
    }

    /**
     * Gets the 'translation.loader.ini' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IniFileLoader A Symfony\Component\Translation\Loader\IniFileLoader instance
     */
    protected function getTranslation_Loader_IniService()
    {
        return $this->services['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader();
    }

    /**
     * Gets the 'translation.loader.json' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\JsonFileLoader A Symfony\Component\Translation\Loader\JsonFileLoader instance
     */
    protected function getTranslation_Loader_JsonService()
    {
        return $this->services['translation.loader.json'] = new \Symfony\Component\Translation\Loader\JsonFileLoader();
    }

    /**
     * Gets the 'translation.loader.mo' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\MoFileLoader A Symfony\Component\Translation\Loader\MoFileLoader instance
     */
    protected function getTranslation_Loader_MoService()
    {
        return $this->services['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader();
    }

    /**
     * Gets the 'translation.loader.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\PhpFileLoader A Symfony\Component\Translation\Loader\PhpFileLoader instance
     */
    protected function getTranslation_Loader_PhpService()
    {
        return $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }

    /**
     * Gets the 'translation.loader.po' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\PoFileLoader A Symfony\Component\Translation\Loader\PoFileLoader instance
     */
    protected function getTranslation_Loader_PoService()
    {
        return $this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader();
    }

    /**
     * Gets the 'translation.loader.qt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\QtFileLoader A Symfony\Component\Translation\Loader\QtFileLoader instance
     */
    protected function getTranslation_Loader_QtService()
    {
        return $this->services['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader();
    }

    /**
     * Gets the 'translation.loader.res' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuResFileLoader A Symfony\Component\Translation\Loader\IcuResFileLoader instance
     */
    protected function getTranslation_Loader_ResService()
    {
        return $this->services['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader();
    }

    /**
     * Gets the 'translation.loader.xliff' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\XliffFileLoader A Symfony\Component\Translation\Loader\XliffFileLoader instance
     */
    protected function getTranslation_Loader_XliffService()
    {
        return $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }

    /**
     * Gets the 'translation.loader.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\YamlFileLoader A Symfony\Component\Translation\Loader\YamlFileLoader instance
     */
    protected function getTranslation_Loader_YmlService()
    {
        return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }

    /**
     * Gets the 'translation.writer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Writer\TranslationWriter A Symfony\Component\Translation\Writer\TranslationWriter instance
     */
    protected function getTranslation_WriterService()
    {
        $this->services['translation.writer'] = $instance = new \Symfony\Component\Translation\Writer\TranslationWriter();

        $instance->addDumper('php', $this->get('translation.dumper.php'));
        $instance->addDumper('xlf', $this->get('translation.dumper.xliff'));
        $instance->addDumper('po', $this->get('translation.dumper.po'));
        $instance->addDumper('mo', $this->get('translation.dumper.mo'));
        $instance->addDumper('yml', $this->get('translation.dumper.yml'));
        $instance->addDumper('ts', $this->get('translation.dumper.qt'));
        $instance->addDumper('csv', $this->get('translation.dumper.csv'));
        $instance->addDumper('ini', $this->get('translation.dumper.ini'));
        $instance->addDumper('json', $this->get('translation.dumper.json'));
        $instance->addDumper('res', $this->get('translation.dumper.res'));

        return $instance;
    }

    /**
     * Gets the 'translator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\DataCollectorTranslator A Symfony\Component\Translation\DataCollectorTranslator instance
     */
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \Symfony\Component\Translation\DataCollectorTranslator(new \Symfony\Component\Translation\LoggingTranslator($this->get('translator.default'), $this->get('monolog.logger.translation')));
    }

    /**
     * Gets the 'translator.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator A Symfony\Bundle\FrameworkBundle\Translation\Translator instance
     */
    protected function getTranslator_DefaultService()
    {
        $this->services['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator($this, new \Symfony\Component\Translation\MessageSelector(), array('translation.loader.php' => array(0 => 'php'), 'translation.loader.yml' => array(0 => 'yml'), 'translation.loader.xliff' => array(0 => 'xlf', 1 => 'xliff'), 'translation.loader.po' => array(0 => 'po'), 'translation.loader.mo' => array(0 => 'mo'), 'translation.loader.qt' => array(0 => 'ts'), 'translation.loader.csv' => array(0 => 'csv'), 'translation.loader.res' => array(0 => 'res'), 'translation.loader.dat' => array(0 => 'dat'), 'translation.loader.ini' => array(0 => 'ini'), 'translation.loader.json' => array(0 => 'json')), array('cache_dir' => (__DIR__.'/translations'), 'debug' => true, 'resource_files' => array('af' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.af.xlf'), 1 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.af.yml')), 'ar' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ar.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ar.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ar.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ar.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ar.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.ar.xliff')), 'az' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.az.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.az.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.az.xlf'), 3 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.az.xliff')), 'bg' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.bg.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.bg.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.bg.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.bg.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.bg.yml')), 'ca' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ca.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ca.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ca.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ca.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ca.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.ca.xliff')), 'cs' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cs.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.cs.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.cs.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.cs.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.cs.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.cs.xliff')), 'cy' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cy.xlf')), 'da' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.da.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.da.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.da.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.da.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.da.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.da.xliff')), 'de' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.de.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.de.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.de.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.de.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.de.yml'), 5 => ($this->targetDirs[3].'/vendor/friendsofsymfony/oauth-server-bundle/Resources/translations/FOSOAuthServerBundle.de.yml'), 6 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.de.xliff')), 'el' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.el.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.el.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.el.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.el.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.el.yml')), 'en' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.en.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.en.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.en.xlf'), 3 => ($this->targetDirs[3].'/src/UserBundle/Resources/translations/messages.en.yml'), 4 => ($this->targetDirs[3].'/src/CoreBundle/Resources/translations/messages.en.yml'), 5 => ($this->targetDirs[3].'/src/CoreBundle/Resources/translations/validators.en.yml'), 6 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.en.yml'), 7 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.en.yml'), 8 => ($this->targetDirs[3].'/vendor/friendsofsymfony/oauth-server-bundle/Resources/translations/FOSOAuthServerBundle.en.yml'), 9 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.en.xliff')), 'es' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.es.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.es.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.es.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.es.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.es.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.es.xliff')), 'et' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.et.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.et.xlf'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.et.yml')), 'eu' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.eu.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.eu.xlf'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.eu.yml'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.eu.yml')), 'fa' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fa.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fa.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.fa.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.fa.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.fa.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.fa.xliff')), 'fi' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fi.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fi.xlf'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.fi.yml'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.fi.yml')), 'fr' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fr.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.fr.xlf'), 3 => ($this->targetDirs[3].'/src/UserBundle/Resources/translations/messages.fr.yml'), 4 => ($this->targetDirs[3].'/src/CoreBundle/Resources/translations/messages.fr.yml'), 5 => ($this->targetDirs[3].'/src/CoreBundle/Resources/translations/validators.fr.yml'), 6 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.fr.yml'), 7 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.fr.yml'), 8 => ($this->targetDirs[3].'/vendor/friendsofsymfony/oauth-server-bundle/Resources/translations/FOSOAuthServerBundle.fr.yml'), 9 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.fr.xliff')), 'gl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.gl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.gl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.gl.xlf')), 'he' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.he.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.he.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.he.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.he.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.he.yml')), 'hr' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hr.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.hr.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.hr.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.hr.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.hr.xliff')), 'hu' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hu.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hu.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.hu.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.hu.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.hu.yml')), 'hy' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hy.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hy.xlf')), 'id' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.id.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.id.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.id.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.id.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.id.yml')), 'it' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.it.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.it.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.it.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.it.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.it.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.it.xliff')), 'ja' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ja.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ja.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ja.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ja.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ja.yml')), 'lb' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lb.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lb.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.lb.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.lb.yml')), 'lt' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lt.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lt.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.lt.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.lt.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.lt.yml')), 'lv' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lv.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lv.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.lv.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.lv.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.lv.yml')), 'mn' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.mn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.mn.xlf')), 'nl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.nl.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.nl.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.nl.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.nl.xliff')), 'nn' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nn.xlf')), 'no' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.no.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.no.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.no.xlf')), 'pl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pl.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.pl.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.pl.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.pl.xliff')), 'pt' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt.xlf'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.pt.yml'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.pt.yml'), 4 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.pt.xliff')), 'pt_BR' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt_BR.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt_BR.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pt_BR.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.pt_BR.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.pt_BR.yml')), 'ro' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ro.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ro.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ro.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ro.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ro.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.ro.xliff')), 'ru' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ru.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ru.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ru.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ru.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ru.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.ru.xliff')), 'sk' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sk.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sk.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sk.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.sk.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.sk.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.sk.xliff')), 'sl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sl.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.sl.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.sl.yml'), 5 => ($this->targetDirs[3].'/vendor/friendsofsymfony/oauth-server-bundle/Resources/translations/FOSOAuthServerBundle.sl.yml'), 6 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.sl.xliff')), 'sq' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sq.xlf')), 'sr_Cyrl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Cyrl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Cyrl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sr_Cyrl.xlf'), 3 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.sr_Cyrl.xliff')), 'sr_Latn' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Latn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Latn.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sr_Latn.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.sr_Latn.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.sr_Latn.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.sr_Latn.xliff')), 'sv' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sv.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sv.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sv.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.sv.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.sv.yml')), 'th' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.th.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.th.xlf'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.th.yml'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.th.yml'), 4 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.th.xliff')), 'tr' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.tr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.tr.xlf'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.tr.yml'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.tr.yml'), 4 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.tr.xliff')), 'uk' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.uk.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.uk.xlf'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.uk.yml'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.uk.yml'), 4 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.uk.xliff')), 'vi' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.vi.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.vi.xlf'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.vi.yml'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.vi.yml')), 'zh_CN' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_CN.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.zh_CN.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.zh_CN.xlf'), 3 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.zh_CN.yml'), 4 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.zh_CN.yml'), 5 => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/translations/pagerfanta.zh_CN.xliff')), 'zh_TW' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_TW.xlf')), 'pt_PT' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pt_PT.xlf')), 'ua' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ua.xlf')), 'ky' => array(0 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.ky.yml'), 1 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.ky.yml')), 'nb' => array(0 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/FOSUserBundle.nb.yml'), 1 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/translations/validators.nb.yml')))), array());

        $instance->setConfigCacheFactory($this->get('config_cache_factory'));
        $instance->setFallbackLocales(array(0 => 'en'));

        return $instance;
    }

    /**
     * Gets the 'translator_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\TranslatorListener A Symfony\Component\HttpKernel\EventListener\TranslatorListener instance
     */
    protected function getTranslatorListenerService()
    {
        return $this->services['translator_listener'] = new \Symfony\Component\HttpKernel\EventListener\TranslatorListener($this->get('translator'), $this->get('request_stack'));
    }

    /**
     * Gets the 'twig' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Twig_Environment A Twig_Environment instance
     */
    protected function getTwigService()
    {
        $a = $this->get('debug.stopwatch', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $b = $this->get('request_stack');

        $c = new \Symfony\Bridge\Twig\AppVariable();
        $c->setEnvironment('dev');
        $c->setDebug(true);
        if ($this->has('security.token_storage')) {
            $c->setTokenStorage($this->get('security.token_storage', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }
        if ($this->has('request_stack')) {
            $c->setRequestStack($b);
        }

        $this->services['twig'] = $instance = new \Twig_Environment($this->get('twig.loader'), array('debug' => true, 'strict_variables' => true, 'exception_controller' => 'twig.controller.exception:showAction', 'form_themes' => array(0 => 'form_div_layout.html.twig'), 'autoescape' => 'name', 'cache' => (__DIR__.'/twig'), 'charset' => 'UTF-8', 'paths' => array(), 'date' => array('format' => 'F j, Y H:i', 'interval_format' => '%d days', 'timezone' => NULL), 'number_format' => array('decimals' => 0, 'decimal_point' => '.', 'thousands_separator' => ',')));

        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension($this->get('security.logout_url_generator')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension($this->get('security.authorization_checker', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ProfilerExtension($this->get('twig.profile'), $a));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($this->get('translator')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension($this->get('assets.packages')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension(NULL, ($this->targetDirs[3].'/app'), 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension($this->get('router')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension($a, true));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension($this->get('fragment.handler')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension($b, $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(new \Symfony\Bridge\Twig\Form\TwigRenderer(new \Symfony\Bridge\Twig\Form\TwigRendererEngine(array(0 => 'form_div_layout.html.twig')), $this->get('security.csrf.token_manager', ContainerInterface::NULL_ON_INVALID_REFERENCE))));
        $instance->addExtension(new \Twig_Extension_Debug());
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension(new \JMS\Serializer\Twig\SerializerExtension($this->get('jms_serializer')));
        $instance->addExtension($this->get('nelmio_api_doc.twig.extension.extra_markdown'));
        $instance->addExtension($this->get('hateoas.twig.link'));
        $instance->addExtension(new \WhiteOctober\PagerfantaBundle\Twig\PagerfantaExtension($this));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\DumpExtension($this->get('var_dumper.cloner')));
        $instance->addExtension(new \Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension());
        $instance->addGlobal('app', $c);
        (new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

        return $instance;
    }

    /**
     * Gets the 'twig.controller.exception' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\TwigBundle\Controller\ExceptionController A Symfony\Bundle\TwigBundle\Controller\ExceptionController instance
     */
    protected function getTwig_Controller_ExceptionService()
    {
        return $this->services['twig.controller.exception'] = new \Symfony\Bundle\TwigBundle\Controller\ExceptionController($this->get('twig'), true);
    }

    /**
     * Gets the 'twig.controller.preview_error' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\TwigBundle\Controller\PreviewErrorController A Symfony\Bundle\TwigBundle\Controller\PreviewErrorController instance
     */
    protected function getTwig_Controller_PreviewErrorService()
    {
        return $this->services['twig.controller.preview_error'] = new \Symfony\Bundle\TwigBundle\Controller\PreviewErrorController($this->get('http_kernel'), 'twig.controller.exception:showAction');
    }

    /**
     * Gets the 'twig.exception_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ExceptionListener A Symfony\Component\HttpKernel\EventListener\ExceptionListener instance
     */
    protected function getTwig_ExceptionListenerService()
    {
        return $this->services['twig.exception_listener'] = new \Symfony\Component\HttpKernel\EventListener\ExceptionListener('twig.controller.exception:showAction', $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'twig.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader A Symfony\Bundle\TwigBundle\Loader\FilesystemLoader instance
     */
    protected function getTwig_LoaderService()
    {
        $this->services['twig.loader'] = $instance = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader($this->get('templating.locator'), $this->get('templating.name_parser'));

        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views'), 'Framework');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views'), 'Security');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views'), 'Twig');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/swiftmailer-bundle/Resources/views'), 'Swiftmailer');
        $instance->addPath(($this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Resources/views'), 'Doctrine');
        $instance->addPath(($this->targetDirs[3].'/src/UserBundle/Resources/views'), 'User');
        $instance->addPath(($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/views'), 'FOSUser');
        $instance->addPath(($this->targetDirs[3].'/vendor/friendsofsymfony/oauth-server-bundle/Resources/views'), 'FOSOAuthServer');
        $instance->addPath(($this->targetDirs[3].'/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Resources/views'), 'NelmioApiDoc');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/DebugBundle/Resources/views'), 'Debug');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views'), 'WebProfiler');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Form'));

        return $instance;
    }

    /**
     * Gets the 'twig.profile' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Twig_Profiler_Profile A Twig_Profiler_Profile instance
     */
    protected function getTwig_ProfileService()
    {
        return $this->services['twig.profile'] = new \Twig_Profiler_Profile();
    }

    /**
     * Gets the 'twig.translation.extractor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bridge\Twig\Translation\TwigExtractor A Symfony\Bridge\Twig\Translation\TwigExtractor instance
     */
    protected function getTwig_Translation_ExtractorService()
    {
        return $this->services['twig.translation.extractor'] = new \Symfony\Bridge\Twig\Translation\TwigExtractor($this->get('twig'));
    }

    /**
     * Gets the 'uri_signer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\UriSigner A Symfony\Component\HttpKernel\UriSigner instance
     */
    protected function getUriSignerService()
    {
        return $this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('965436407b8b3ac3d595e96d85b5fa06c90973f9');
    }

    /**
     * Gets the 'user.command.create_client' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \UserBundle\Command\CreateClientCommand A UserBundle\Command\CreateClientCommand instance
     */
    protected function getUser_Command_CreateClientService()
    {
        return $this->services['user.command.create_client'] = new \UserBundle\Command\CreateClientCommand($this->get('fos_oauth_server.client_manager.default'));
    }

    /**
     * Gets the 'user.mailer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \UserBundle\Mailer\Mailer A UserBundle\Mailer\Mailer instance
     */
    protected function getUser_MailerService()
    {
        return $this->services['user.mailer'] = new \UserBundle\Mailer\Mailer($this->get('swiftmailer.mailer.default'), $this->get('twig'), array('base_url_confirmation' => 'http://localhost?token='));
    }

    /**
     * Gets the 'user.user_edit_admin_type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \UserBundle\Form\UserEditAdminType A UserBundle\Form\UserEditAdminType instance
     */
    protected function getUser_UserEditAdminTypeService()
    {
        return $this->services['user.user_edit_admin_type'] = new \UserBundle\Form\UserEditAdminType($this->get('security.token_storage'));
    }

    /**
     * Gets the 'user.user_filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \UserBundle\Filter\UserFilter A UserBundle\Filter\UserFilter instance
     */
    protected function getUser_UserFilterService()
    {
        return $this->services['user.user_filter'] = new \UserBundle\Filter\UserFilter($this->get('translator.default'), $this->get('user.user_repository'));
    }

    /**
     * Gets the 'user.user_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \UserBundle\EventListener\UserListener A UserBundle\EventListener\UserListener instance
     */
    protected function getUser_UserListenerService()
    {
        return $this->services['user.user_listener'] = new \UserBundle\EventListener\UserListener($this);
    }

    /**
     * Gets the 'user.user_repository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Doctrine\ORM\EntityRepository A Doctrine\ORM\EntityRepository instance
     */
    protected function getUser_UserRepositoryService()
    {
        return $this->services['user.user_repository'] = $this->get('doctrine.orm.default_entity_manager')->getRepository('UserBundle:User');
    }

    /**
     * Gets the 'validate_request_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener A Symfony\Component\HttpKernel\EventListener\ValidateRequestListener instance
     */
    protected function getValidateRequestListenerService()
    {
        return $this->services['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener();
    }

    /**
     * Gets the 'validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Validator\Validator\ValidatorInterface A Symfony\Component\Validator\Validator\ValidatorInterface instance
     */
    protected function getValidatorService()
    {
        return $this->services['validator'] = $this->get('validator.builder')->getValidator();
    }

    /**
     * Gets the 'validator.builder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilderInterface A Symfony\Component\Validator\ValidatorBuilderInterface instance
     */
    protected function getValidator_BuilderService()
    {
        $this->services['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

        $instance->setConstraintValidatorFactory(new \Symfony\Bundle\FrameworkBundle\Validator\ConstraintValidatorFactory($this, array('validator.expression' => 'validator.expression', 'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => 'validator.expression', 'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => 'validator.email', 'security.validator.user_password' => 'security.validator.user_password', 'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => 'security.validator.user_password', 'doctrine.orm.validator.unique' => 'doctrine.orm.validator.unique', 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => 'doctrine.orm.validator.unique')));
        $instance->setTranslator($this->get('translator'));
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings(array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/config/validation.xml'), 1 => ($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Resources/config/validation.xml'), 2 => ($this->targetDirs[3].'/vendor/friendsofsymfony/oauth-server-bundle/Resources/config/validation.xml')));
        $instance->addYamlMappings(array(0 => ($this->targetDirs[3].'/src/UserBundle/Resources/config/validation/User.yml')));
        $instance->enableAnnotationMapping($this->get('annotation_reader'));
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->addObjectInitializers(array(0 => $this->get('doctrine.orm.validator_initializer'), 1 => new \FOS\UserBundle\Validator\Initializer($this->get('fos_user.util.canonical_fields_updater'))));
        $instance->addXmlMapping(($this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/DependencyInjection/Compiler/../../Resources/config/storage-validation/orm.xml'));

        return $instance;
    }

    /**
     * Gets the 'validator.email' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Validator\Constraints\EmailValidator A Symfony\Component\Validator\Constraints\EmailValidator instance
     */
    protected function getValidator_EmailService()
    {
        return $this->services['validator.email'] = new \Symfony\Component\Validator\Constraints\EmailValidator(false);
    }

    /**
     * Gets the 'validator.expression' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Validator\Constraints\ExpressionValidator A Symfony\Component\Validator\Constraints\ExpressionValidator instance
     */
    protected function getValidator_ExpressionService()
    {
        return $this->services['validator.expression'] = new \Symfony\Component\Validator\Constraints\ExpressionValidator();
    }

    /**
     * Gets the 'var_dumper.cli_dumper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\VarDumper\Dumper\CliDumper A Symfony\Component\VarDumper\Dumper\CliDumper instance
     */
    protected function getVarDumper_CliDumperService()
    {
        return $this->services['var_dumper.cli_dumper'] = new \Symfony\Component\VarDumper\Dumper\CliDumper(NULL, 'UTF-8');
    }

    /**
     * Gets the 'var_dumper.cloner' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\VarDumper\Cloner\VarCloner A Symfony\Component\VarDumper\Cloner\VarCloner instance
     */
    protected function getVarDumper_ClonerService()
    {
        $this->services['var_dumper.cloner'] = $instance = new \Symfony\Component\VarDumper\Cloner\VarCloner();

        $instance->setMaxItems(2500);
        $instance->setMaxString(-1);

        return $instance;
    }

    /**
     * Gets the 'web_profiler.controller.exception' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Controller\ExceptionController A Symfony\Bundle\WebProfilerBundle\Controller\ExceptionController instance
     */
    protected function getWebProfiler_Controller_ExceptionService()
    {
        return $this->services['web_profiler.controller.exception'] = new \Symfony\Bundle\WebProfilerBundle\Controller\ExceptionController($this->get('profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('twig'), true);
    }

    /**
     * Gets the 'web_profiler.controller.profiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Controller\ProfilerController A Symfony\Bundle\WebProfilerBundle\Controller\ProfilerController instance
     */
    protected function getWebProfiler_Controller_ProfilerService()
    {
        return $this->services['web_profiler.controller.profiler'] = new \Symfony\Bundle\WebProfilerBundle\Controller\ProfilerController($this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('twig'), array('data_collector.request' => array(0 => 'request', 1 => '@WebProfiler/Collector/request.html.twig'), 'data_collector.time' => array(0 => 'time', 1 => '@WebProfiler/Collector/time.html.twig'), 'data_collector.memory' => array(0 => 'memory', 1 => '@WebProfiler/Collector/memory.html.twig'), 'data_collector.ajax' => array(0 => 'ajax', 1 => '@WebProfiler/Collector/ajax.html.twig'), 'data_collector.form' => array(0 => 'form', 1 => '@WebProfiler/Collector/form.html.twig'), 'data_collector.exception' => array(0 => 'exception', 1 => '@WebProfiler/Collector/exception.html.twig'), 'data_collector.logger' => array(0 => 'logger', 1 => '@WebProfiler/Collector/logger.html.twig'), 'data_collector.events' => array(0 => 'events', 1 => '@WebProfiler/Collector/events.html.twig'), 'data_collector.router' => array(0 => 'router', 1 => '@WebProfiler/Collector/router.html.twig'), 'data_collector.translation' => array(0 => 'translation', 1 => '@WebProfiler/Collector/translation.html.twig'), 'data_collector.security' => array(0 => 'security', 1 => '@Security/Collector/security.html.twig'), 'data_collector.twig' => array(0 => 'twig', 1 => '@WebProfiler/Collector/twig.html.twig'), 'data_collector.doctrine' => array(0 => 'db', 1 => '@Doctrine/Collector/db.html.twig'), 'swiftmailer.data_collector' => array(0 => 'swiftmailer', 1 => '@Swiftmailer/Collector/swiftmailer.html.twig'), 'data_collector.dump' => array(0 => 'dump', 1 => '@Debug/Profiler/dump.html.twig'), 'data_collector.config' => array(0 => 'config', 1 => '@WebProfiler/Collector/config.html.twig')), 'bottom');
    }

    /**
     * Gets the 'web_profiler.controller.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Controller\RouterController A Symfony\Bundle\WebProfilerBundle\Controller\RouterController instance
     */
    protected function getWebProfiler_Controller_RouterService()
    {
        return $this->services['web_profiler.controller.router'] = new \Symfony\Bundle\WebProfilerBundle\Controller\RouterController($this->get('profiler', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('twig'), $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'web_profiler.debug_toolbar' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener A Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener instance
     */
    protected function getWebProfiler_DebugToolbarService()
    {
        return $this->services['web_profiler.debug_toolbar'] = new \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener($this->get('twig'), false, 2, 'bottom', $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE), '^/(app(_[\\w]+)?\\.php/)?_wdt');
    }

    /**
     * Gets the 'white_october_pagerfanta.view_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Pagerfanta\View\ViewFactory A Pagerfanta\View\ViewFactory instance
     */
    protected function getWhiteOctoberPagerfanta_ViewFactoryService()
    {
        $a = $this->get('translator');

        $b = new \Pagerfanta\View\DefaultView();

        $c = new \Pagerfanta\View\TwitterBootstrapView();

        $d = new \Pagerfanta\View\TwitterBootstrap3View();

        $this->services['white_october_pagerfanta.view_factory'] = $instance = new \Pagerfanta\View\ViewFactory(array());

        $instance->add(array('default' => $b, 'default_translated' => new \WhiteOctober\PagerfantaBundle\View\DefaultTranslatedView($b, $a), 'twitter_bootstrap' => $c, 'twitter_bootstrap3' => $d, 'twitter_bootstrap3_translated' => new \WhiteOctober\PagerfantaBundle\View\TwitterBootstrap3TranslatedView($d, $a), 'twitter_bootstrap_translated' => new \WhiteOctober\PagerfantaBundle\View\TwitterBootstrapTranslatedView($c, $a)));

        return $instance;
    }

    /**
     * Gets the 'controller_name_converter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser A Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser instance
     */
    protected function getControllerNameConverterService()
    {
        return $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($this->get('kernel'));
    }

    /**
     * Gets the 'debug.security.access.decision_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Core\Authorization\DebugAccessDecisionManager A Symfony\Component\Security\Core\Authorization\DebugAccessDecisionManager instance
     */
    protected function getDebug_Security_Access_DecisionManagerService()
    {
        $a = $this->get('security.role_hierarchy');
        $b = $this->get('security.authentication.trust_resolver');

        $this->services['debug.security.access.decision_manager'] = $instance = new \Symfony\Component\Security\Core\Authorization\DebugAccessDecisionManager(new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(array(), 'affirmative', false, true));

        $instance->setVoters(array(0 => new \UserBundle\Security\UserVoter($instance), 1 => new \Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter($a), 2 => new \Symfony\Component\Security\Core\Authorization\Voter\ExpressionVoter(new \Symfony\Component\Security\Core\Authorization\ExpressionLanguage(), $b, $a), 3 => new \Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter($b)));

        return $instance;
    }

    /**
     * Gets the 'doctrine.dbal.logger.profiling.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Doctrine\DBAL\Logging\DebugStack A Doctrine\DBAL\Logging\DebugStack instance
     */
    protected function getDoctrine_Dbal_Logger_Profiling_DefaultService()
    {
        return $this->services['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack();
    }

    /**
     * Gets the 'form.server_params' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Form\Util\ServerParams A Symfony\Component\Form\Util\ServerParams instance
     */
    protected function getForm_ServerParamsService()
    {
        return $this->services['form.server_params'] = new \Symfony\Component\Form\Util\ServerParams($this->get('request_stack'));
    }

    /**
     * Gets the 'fos_oauth_server.entity_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Doctrine\ORM\EntityManager A Doctrine\ORM\EntityManager instance
     */
    protected function getFosOauthServer_EntityManagerService()
    {
        return $this->services['fos_oauth_server.entity_manager'] = $this->get('doctrine')->getManager(NULL);
    }

    /**
     * Gets the 'fos_rest.request.param_fetcher.reader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \FOS\RestBundle\Request\ParamReader A FOS\RestBundle\Request\ParamReader instance
     */
    protected function getFosRest_Request_ParamFetcher_ReaderService()
    {
        return $this->services['fos_rest.request.param_fetcher.reader'] = new \FOS\RestBundle\Request\ParamReader($this->get('annotation_reader'));
    }

    /**
     * Gets the 'fos_rest.serializer.jms_handler_registry' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \JMS\Serializer\Handler\LazyHandlerRegistry A JMS\Serializer\Handler\LazyHandlerRegistry instance
     */
    protected function getFosRest_Serializer_JmsHandlerRegistryService()
    {
        return $this->services['fos_rest.serializer.jms_handler_registry'] = new \JMS\Serializer\Handler\LazyHandlerRegistry($this, array(2 => array('DateTime' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromjson'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromxml'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromyml')), 'ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\Common\\Collections\\ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ORM\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ODM\\MongoDB\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ODM\\PHPCR\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'PhpCollection\\Sequence' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence')), 'PhpCollection\\Map' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap'))), 1 => array('DateTime' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime')), 'DateInterval' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval')), 'ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\Common\\Collections\\ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ORM\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ODM\\MongoDB\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ODM\\PHPCR\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'PhpCollection\\Sequence' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence')), 'PhpCollection\\Map' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap')), 'Symfony\\Component\\Form\\Form' => array('xml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormToxml'), 'json' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormTojson'), 'yml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormToyml')), 'Symfony\\Component\\Form\\FormError' => array('xml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorToxml'), 'json' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorTojson'), 'yml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorToyml')), 'Symfony\\Component\\Validator\\ConstraintViolationList' => array('xml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListToxml'), 'json' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListTojson'), 'yml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListToyml')), 'Symfony\\Component\\Validator\\ConstraintViolation' => array('xml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationToxml'), 'json' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationTojson'), 'yml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationToyml')))));
    }

    /**
     * Gets the 'fos_user.user_provider.username_email' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \FOS\UserBundle\Security\EmailUserProvider A FOS\UserBundle\Security\EmailUserProvider instance
     */
    protected function getFosUser_UserProvider_UsernameEmailService()
    {
        return $this->services['fos_user.user_provider.username_email'] = new \FOS\UserBundle\Security\EmailUserProvider($this->get('fos_user.user_manager'));
    }

    /**
     * Gets the 'fos_user.util.canonical_fields_updater' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \FOS\UserBundle\Util\CanonicalFieldsUpdater A FOS\UserBundle\Util\CanonicalFieldsUpdater instance
     */
    protected function getFosUser_Util_CanonicalFieldsUpdaterService()
    {
        $a = $this->get('fos_user.util.email_canonicalizer');

        return $this->services['fos_user.util.canonical_fields_updater'] = new \FOS\UserBundle\Util\CanonicalFieldsUpdater($a, $a);
    }

    /**
     * Gets the 'fos_user.util.password_updater' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \FOS\UserBundle\Util\PasswordUpdater A FOS\UserBundle\Util\PasswordUpdater instance
     */
    protected function getFosUser_Util_PasswordUpdaterService()
    {
        return $this->services['fos_user.util.password_updater'] = new \FOS\UserBundle\Util\PasswordUpdater($this->get('security.encoder_factory'));
    }

    /**
     * Gets the 'hateoas.configuration.relations_repository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Hateoas\Configuration\RelationsRepository A Hateoas\Configuration\RelationsRepository instance
     */
    protected function getHateoas_Configuration_RelationsRepositoryService()
    {
        $a = $this->get('jms_serializer.metadata.file_locator');
        $b = $this->get('annotation_reader');

        $c = new \Hateoas\Configuration\Metadata\Driver\YamlDriver($a);

        $d = new \Hateoas\Configuration\Metadata\Driver\XmlDriver($a);

        $e = new \Hateoas\Configuration\Metadata\Driver\AnnotationDriver($b);

        $f = new \Hateoas\Configuration\Metadata\Driver\ExtensionDriver($e);

        $g = new \Metadata\Driver\DriverChain(array(0 => $c, 1 => $d, 2 => $f));

        $h = new \Metadata\Cache\FileCache((__DIR__.'/hateoas'));

        $i = new \Metadata\MetadataFactory($g, 'Metadata\\ClassHierarchyMetadata', true);
        $i->setCache($h);

        return $this->services['hateoas.configuration.relations_repository'] = new \Hateoas\Configuration\RelationsRepository($i, new \Hateoas\Configuration\Provider\RelationProvider($i, $this->get('hateoas.configuration.provider.resolver')));
    }

    /**
     * Gets the 'hateoas.embeds_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Hateoas\Factory\EmbeddedsFactory A Hateoas\Factory\EmbeddedsFactory instance
     */
    protected function getHateoas_EmbedsFactoryService()
    {
        return $this->services['hateoas.embeds_factory'] = new \Hateoas\Factory\EmbeddedsFactory($this->get('hateoas.configuration.relations_repository'), $this->get('hateoas.expression.evaluator'), $this->get('hateoas.serializer.exclusion_manager'));
    }

    /**
     * Gets the 'hateoas.link_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Hateoas\Factory\LinkFactory A Hateoas\Factory\LinkFactory instance
     */
    protected function getHateoas_LinkFactoryService()
    {
        return $this->services['hateoas.link_factory'] = new \Hateoas\Factory\LinkFactory($this->get('hateoas.expression.evaluator'), $this->get('hateoas.generator.registry'));
    }

    /**
     * Gets the 'hateoas.links_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Hateoas\Factory\LinksFactory A Hateoas\Factory\LinksFactory instance
     */
    protected function getHateoas_LinksFactoryService()
    {
        return $this->services['hateoas.links_factory'] = new \Hateoas\Factory\LinksFactory($this->get('hateoas.configuration.relations_repository'), $this->get('hateoas.link_factory'), $this->get('hateoas.serializer.exclusion_manager'));
    }

    /**
     * Gets the 'jms_serializer.metadata.file_locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Metadata\Driver\FileLocator A Metadata\Driver\FileLocator instance
     */
    protected function getJmsSerializer_Metadata_FileLocatorService()
    {
        return $this->services['jms_serializer.metadata.file_locator'] = new \Metadata\Driver\FileLocator(array('Symfony\\Bundle\\FrameworkBundle' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/config/serializer'), 'Symfony\\Bundle\\SecurityBundle' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/config/serializer'), 'Symfony\\Bundle\\TwigBundle' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/config/serializer'), 'Symfony\\Bundle\\MonologBundle' => ($this->targetDirs[3].'/vendor/symfony/monolog-bundle/Resources/config/serializer'), 'Symfony\\Bundle\\SwiftmailerBundle' => ($this->targetDirs[3].'/vendor/symfony/swiftmailer-bundle/Resources/config/serializer'), 'Doctrine\\Bundle\\DoctrineBundle' => ($this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Resources/config/serializer'), 'Sensio\\Bundle\\FrameworkExtraBundle' => ($this->targetDirs[3].'/vendor/sensio/framework-extra-bundle/Resources/config/serializer'), 'UserBundle' => ($this->targetDirs[3].'/src/UserBundle/Resources/config/serializer'), 'CoreBundle' => ($this->targetDirs[3].'/src/CoreBundle/Resources/config/serializer'), 'FOS\\UserBundle' => ($this->targetDirs[3].'/app/config/serializer/fos'), 'FOS\\RestBundle' => ($this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Resources/config/serializer'), 'FOS\\OAuthServerBundle' => ($this->targetDirs[3].'/vendor/friendsofsymfony/oauth-server-bundle/Resources/config/serializer'), 'JMS\\SerializerBundle' => ($this->targetDirs[3].'/vendor/jms/serializer-bundle/JMS/SerializerBundle/Resources/config/serializer'), 'Nelmio\\ApiDocBundle' => ($this->targetDirs[3].'/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Resources/config/serializer'), 'Nelmio\\CorsBundle' => ($this->targetDirs[3].'/vendor/nelmio/cors-bundle/Resources/config/serializer'), 'Stof\\DoctrineExtensionsBundle' => ($this->targetDirs[3].'/vendor/stof/doctrine-extensions-bundle/Resources/config/serializer'), 'Bazinga\\Bundle\\HateoasBundle' => ($this->targetDirs[3].'/vendor/willdurand/hateoas-bundle/Bazinga/Bundle/HateoasBundle/Resources/config/serializer'), 'WhiteOctober\\PagerfantaBundle' => ($this->targetDirs[3].'/vendor/white-october/pagerfanta-bundle/Resources/config/serializer'), 'Doctrine\\Bundle\\FixturesBundle' => ($this->targetDirs[3].'/vendor/doctrine/doctrine-fixtures-bundle/Resources/config/serializer'), 'Symfony\\Bundle\\DebugBundle' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/DebugBundle/Resources/config/serializer'), 'Symfony\\Bundle\\WebProfilerBundle' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/config/serializer'), 'Sensio\\Bundle\\DistributionBundle' => ($this->targetDirs[3].'/vendor/sensio/distribution-bundle/Resources/config/serializer'), 'Sensio\\Bundle\\GeneratorBundle' => ($this->targetDirs[3].'/vendor/sensio/generator-bundle/Resources/config/serializer')));
    }

    /**
     * Gets the 'jms_serializer.metadata_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Metadata\MetadataFactory A Metadata\MetadataFactory instance
     */
    protected function getJmsSerializer_MetadataFactoryService()
    {
        $this->services['jms_serializer.metadata_factory'] = $instance = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'jms_serializer.metadata_driver'), 'Metadata\\ClassHierarchyMetadata', true);

        $instance->setCache(new \Metadata\Cache\FileCache((__DIR__.'/jms_serializer')));

        return $instance;
    }

    /**
     * Gets the 'jms_serializer.unserialize_object_constructor' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \JMS\Serializer\Construction\UnserializeObjectConstructor A JMS\Serializer\Construction\UnserializeObjectConstructor instance
     */
    protected function getJmsSerializer_UnserializeObjectConstructorService()
    {
        return $this->services['jms_serializer.unserialize_object_constructor'] = new \JMS\Serializer\Construction\UnserializeObjectConstructor();
    }

    /**
     * Gets the 'router.request_context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Routing\RequestContext A Symfony\Component\Routing\RequestContext instance
     */
    protected function getRouter_RequestContextService()
    {
        return $this->services['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /**
     * Gets the 'security.access_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\Firewall\AccessListener A Symfony\Component\Security\Http\Firewall\AccessListener instance
     */
    protected function getSecurity_AccessListenerService()
    {
        return $this->services['security.access_listener'] = new \Symfony\Component\Security\Http\Firewall\AccessListener($this->get('security.token_storage'), $this->get('debug.security.access.decision_manager'), $this->get('security.access_map'), $this->get('security.authentication.manager'));
    }

    /**
     * Gets the 'security.access_map' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\AccessMap A Symfony\Component\Security\Http\AccessMap instance
     */
    protected function getSecurity_AccessMapService()
    {
        return $this->services['security.access_map'] = new \Symfony\Component\Security\Http\AccessMap();
    }

    /**
     * Gets the 'security.authentication.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager A Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager instance
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $a = $this->get('fos_user.user_provider.username_email');
        $b = $this->get('security.user_checker.oauth_authorize');

        $this->services['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(array(0 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($a, $b, 'oauth_authorize', $this->get('security.encoder_factory'), true), 1 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('5820909761e620.11958170'), 2 => new \FOS\OAuthServerBundle\Security\Authentication\Provider\OAuthProvider($a, $this->get('fos_oauth_server.server'), $b), 3 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('5820909761e620.11958170')), true);

        $instance->setEventDispatcher($this->get('debug.event_dispatcher'));

        return $instance;
    }

    /**
     * Gets the 'security.authentication.session_strategy' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy A Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy instance
     */
    protected function getSecurity_Authentication_SessionStrategyService()
    {
        return $this->services['security.authentication.session_strategy'] = new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate');
    }

    /**
     * Gets the 'security.authentication.trust_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver A Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver instance
     */
    protected function getSecurity_Authentication_TrustResolverService()
    {
        return $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken');
    }

    /**
     * Gets the 'security.channel_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\Firewall\ChannelListener A Symfony\Component\Security\Http\Firewall\ChannelListener instance
     */
    protected function getSecurity_ChannelListenerService()
    {
        return $this->services['security.channel_listener'] = new \Symfony\Component\Security\Http\Firewall\ChannelListener($this->get('security.access_map'), new \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint(80, 443), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'security.http_utils' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\HttpUtils A Symfony\Component\Security\Http\HttpUtils instance
     */
    protected function getSecurity_HttpUtilsService()
    {
        $a = $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE);

        return $this->services['security.http_utils'] = new \Symfony\Component\Security\Http\HttpUtils($a, $a);
    }

    /**
     * Gets the 'security.logout_url_generator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator A Symfony\Component\Security\Http\Logout\LogoutUrlGenerator instance
     */
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        $this->services['security.logout_url_generator'] = $instance = new \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator($this->get('request_stack', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.token_storage', ContainerInterface::NULL_ON_INVALID_REFERENCE));

        $instance->registerListener('oauth_authorize', '/logout', 'logout', '_csrf_token', NULL);

        return $instance;
    }

    /**
     * Gets the 'security.role_hierarchy' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\Security\Core\Role\RoleHierarchy A Symfony\Component\Security\Core\Role\RoleHierarchy instance
     */
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->services['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy(array('ROLE_SUPER_ADMIN' => array(0 => 'ROLE_ADMIN'), 'ROLE_ADMIN' => array(0 => 'ROLE_VIEW_LOG_REQUEST'), 'ROLE_VIEW_LOG_REQUEST' => array(0 => 'ROLE_USER')));
    }

    /**
     * Gets the 'session.storage.metadata_bag' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag A Symfony\Component\HttpFoundation\Session\Storage\MetadataBag instance
     */
    protected function getSession_Storage_MetadataBagService()
    {
        return $this->services['session.storage.metadata_bag'] = new \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag('_sf2_meta', '0');
    }

    /**
     * Gets the 'swiftmailer.mailer.default.transport.eventdispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Swift_Events_SimpleEventDispatcher A Swift_Events_SimpleEventDispatcher instance
     */
    protected function getSwiftmailer_Mailer_Default_Transport_EventdispatcherService()
    {
        return $this->services['swiftmailer.mailer.default.transport.eventdispatcher'] = new \Swift_Events_SimpleEventDispatcher();
    }

    /**
     * Gets the 'templating.locator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * This service is private.
     * If you want to be able to request this service from the container directly,
     * make it public, otherwise you might end up with broken code.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator A Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator instance
     */
    protected function getTemplating_LocatorService()
    {
        return $this->services['templating.locator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator($this->get('file_locator'), __DIR__);
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        $name = strtolower($name);

        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        $name = strtolower($name);

        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }

        return $this->parameterBag;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => ($this->targetDirs[3].'/app'),
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'app',
            'kernel.cache_dir' => __DIR__,
            'kernel.logs_dir' => ($this->targetDirs[2].'/logs'),
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'UserBundle' => 'UserBundle\\UserBundle',
                'CoreBundle' => 'CoreBundle\\CoreBundle',
                'FOSUserBundle' => 'FOS\\UserBundle\\FOSUserBundle',
                'FOSRestBundle' => 'FOS\\RestBundle\\FOSRestBundle',
                'FOSOAuthServerBundle' => 'FOS\\OAuthServerBundle\\FOSOAuthServerBundle',
                'JMSSerializerBundle' => 'JMS\\SerializerBundle\\JMSSerializerBundle',
                'NelmioApiDocBundle' => 'Nelmio\\ApiDocBundle\\NelmioApiDocBundle',
                'NelmioCorsBundle' => 'Nelmio\\CorsBundle\\NelmioCorsBundle',
                'StofDoctrineExtensionsBundle' => 'Stof\\DoctrineExtensionsBundle\\StofDoctrineExtensionsBundle',
                'BazingaHateoasBundle' => 'Bazinga\\Bundle\\HateoasBundle\\BazingaHateoasBundle',
                'WhiteOctoberPagerfantaBundle' => 'WhiteOctober\\PagerfantaBundle\\WhiteOctoberPagerfantaBundle',
                'DoctrineFixturesBundle' => 'Doctrine\\Bundle\\FixturesBundle\\DoctrineFixturesBundle',
                'DebugBundle' => 'Symfony\\Bundle\\DebugBundle\\DebugBundle',
                'WebProfilerBundle' => 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle',
                'SensioDistributionBundle' => 'Sensio\\Bundle\\DistributionBundle\\SensioDistributionBundle',
                'SensioGeneratorBundle' => 'Sensio\\Bundle\\GeneratorBundle\\SensioGeneratorBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appDevDebugProjectContainer',
            'database_host' => '127.0.0.1',
            'database_port' => NULL,
            'database_name' => 'rest',
            'database_user' => 'rest',
            'database_password' => 'Ium2F2CZHMdEj7OP8L5mcT1xfawNc2dt',
            'mailer_transport' => 'smtp',
            'mailer_host' => '127.0.0.1',
            'mailer_user' => NULL,
            'mailer_password' => NULL,
            'mailer_port' => 1025,
            'mailer_encryption' => NULL,
            'mail_sender' => 'no-reply@symfony.local',
            'mail_admin' => 'contact@symfony.local',
            'secret' => '965436407b8b3ac3d595e96d85b5fa06c90973f9',
            'cors_allow_origin' => '*',
            'app_name' => 'rest-project',
            'base_url_confirmation' => 'http://localhost?token=',
            'enable_log_request' => true,
            'locale' => 'en',
            'fragment.renderer.hinclude.global_template' => NULL,
            'fragment.path' => '/_fragment',
            'kernel.secret' => '965436407b8b3ac3d595e96d85b5fa06c90973f9',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => array(

            ),
            'kernel.trusted_proxies' => array(

            ),
            'kernel.default_locale' => 'en',
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => array(
                'cookie_httponly' => true,
                'gc_probability' => 1,
            ),
            'session.save_path' => ($this->targetDirs[3].'/app/../var/sessions/dev'),
            'session.metadata.update_threshold' => '0',
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'templating.helper.code.file_link_format' => NULL,
            'templating.loader.cache.path' => NULL,
            'templating.engines' => array(
                0 => 'twig',
            ),
            'validator.mapping.cache.prefix' => '',
            'validator.translation_domain' => 'validators',
            'translator.logging' => true,
            'profiler_listener.only_exceptions' => false,
            'profiler_listener.only_master_requests' => false,
            'profiler.storage.dsn' => ('file:'.__DIR__.'/profiler'),
            'router.options.generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper',
            'router.options.matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper',
            'router.options.matcher.cache_class' => 'appDevDebugProjectContainerUrlMatcher',
            'router.options.generator.cache_class' => 'appDevDebugProjectContainerUrlGenerator',
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => ($this->targetDirs[3].'/app/config/routing_dev.yml'),
            'router.cache_class_prefix' => 'appDevDebugProjectContainer',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'debug.error_handler.throw_at' => -1,
            'debug.container.dump' => (__DIR__.'/appDevDebugProjectContainer.xml'),
            'security.authentication.trust_resolver.anonymous_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken',
            'security.authentication.trust_resolver.rememberme_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken',
            'security.role_hierarchy.roles' => array(
                'ROLE_SUPER_ADMIN' => array(
                    0 => 'ROLE_ADMIN',
                ),
                'ROLE_ADMIN' => array(
                    0 => 'ROLE_VIEW_LOG_REQUEST',
                ),
                'ROLE_VIEW_LOG_REQUEST' => array(
                    0 => 'ROLE_USER',
                ),
            ),
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'twig.exception_listener.controller' => 'twig.controller.exception:showAction',
            'twig.form.resources' => array(
                0 => 'form_div_layout.html.twig',
            ),
            'monolog.logger.class' => 'Symfony\\Bridge\\Monolog\\Logger',
            'monolog.gelf.publisher.class' => 'Gelf\\MessagePublisher',
            'monolog.gelfphp.publisher.class' => 'Gelf\\Publisher',
            'monolog.handler.stream.class' => 'Monolog\\Handler\\StreamHandler',
            'monolog.handler.console.class' => 'Symfony\\Bridge\\Monolog\\Handler\\ConsoleHandler',
            'monolog.handler.group.class' => 'Monolog\\Handler\\GroupHandler',
            'monolog.handler.buffer.class' => 'Monolog\\Handler\\BufferHandler',
            'monolog.handler.deduplication.class' => 'Monolog\\Handler\\DeduplicationHandler',
            'monolog.handler.rotating_file.class' => 'Monolog\\Handler\\RotatingFileHandler',
            'monolog.handler.syslog.class' => 'Monolog\\Handler\\SyslogHandler',
            'monolog.handler.syslogudp.class' => 'Monolog\\Handler\\SyslogUdpHandler',
            'monolog.handler.null.class' => 'Monolog\\Handler\\NullHandler',
            'monolog.handler.test.class' => 'Monolog\\Handler\\TestHandler',
            'monolog.handler.gelf.class' => 'Monolog\\Handler\\GelfHandler',
            'monolog.handler.rollbar.class' => 'Monolog\\Handler\\RollbarHandler',
            'monolog.handler.flowdock.class' => 'Monolog\\Handler\\FlowdockHandler',
            'monolog.handler.browser_console.class' => 'Monolog\\Handler\\BrowserConsoleHandler',
            'monolog.handler.firephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\FirePHPHandler',
            'monolog.handler.chromephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\ChromePhpHandler',
            'monolog.handler.debug.class' => 'Symfony\\Bridge\\Monolog\\Handler\\DebugHandler',
            'monolog.handler.swift_mailer.class' => 'Symfony\\Bridge\\Monolog\\Handler\\SwiftMailerHandler',
            'monolog.handler.native_mailer.class' => 'Monolog\\Handler\\NativeMailerHandler',
            'monolog.handler.socket.class' => 'Monolog\\Handler\\SocketHandler',
            'monolog.handler.pushover.class' => 'Monolog\\Handler\\PushoverHandler',
            'monolog.handler.raven.class' => 'Monolog\\Handler\\RavenHandler',
            'monolog.handler.newrelic.class' => 'Monolog\\Handler\\NewRelicHandler',
            'monolog.handler.hipchat.class' => 'Monolog\\Handler\\HipChatHandler',
            'monolog.handler.slack.class' => 'Monolog\\Handler\\SlackHandler',
            'monolog.handler.cube.class' => 'Monolog\\Handler\\CubeHandler',
            'monolog.handler.amqp.class' => 'Monolog\\Handler\\AmqpHandler',
            'monolog.handler.error_log.class' => 'Monolog\\Handler\\ErrorLogHandler',
            'monolog.handler.loggly.class' => 'Monolog\\Handler\\LogglyHandler',
            'monolog.handler.logentries.class' => 'Monolog\\Handler\\LogEntriesHandler',
            'monolog.handler.whatfailuregroup.class' => 'Monolog\\Handler\\WhatFailureGroupHandler',
            'monolog.activation_strategy.not_found.class' => 'Symfony\\Bundle\\MonologBundle\\NotFoundActivationStrategy',
            'monolog.handler.fingers_crossed.class' => 'Monolog\\Handler\\FingersCrossedHandler',
            'monolog.handler.fingers_crossed.error_level_activation_strategy.class' => 'Monolog\\Handler\\FingersCrossed\\ErrorLevelActivationStrategy',
            'monolog.handler.filter.class' => 'Monolog\\Handler\\FilterHandler',
            'monolog.handler.mongo.class' => 'Monolog\\Handler\\MongoDBHandler',
            'monolog.mongo.client.class' => 'MongoClient',
            'monolog.handler.elasticsearch.class' => 'Monolog\\Handler\\ElasticSearchHandler',
            'monolog.elastica.client.class' => 'Elastica\\Client',
            'monolog.use_microseconds' => true,
            'monolog.swift_mailer.handlers' => array(

            ),
            'monolog.handlers_to_channels' => array(
                'monolog.handler.console' => array(
                    'type' => 'exclusive',
                    'elements' => array(
                        0 => 'event',
                        1 => 'doctrine',
                    ),
                ),
                'monolog.handler.main' => array(
                    'type' => 'exclusive',
                    'elements' => array(
                        0 => 'event',
                    ),
                ),
            ),
            'swiftmailer.class' => 'Swift_Mailer',
            'swiftmailer.transport.sendmail.class' => 'Swift_Transport_SendmailTransport',
            'swiftmailer.transport.mail.class' => 'Swift_Transport_MailTransport',
            'swiftmailer.transport.failover.class' => 'Swift_Transport_FailoverTransport',
            'swiftmailer.plugin.redirecting.class' => 'Swift_Plugins_RedirectingPlugin',
            'swiftmailer.plugin.impersonate.class' => 'Swift_Plugins_ImpersonatePlugin',
            'swiftmailer.plugin.messagelogger.class' => 'Swift_Plugins_MessageLogger',
            'swiftmailer.plugin.antiflood.class' => 'Swift_Plugins_AntiFloodPlugin',
            'swiftmailer.transport.smtp.class' => 'Swift_Transport_EsmtpTransport',
            'swiftmailer.plugin.blackhole.class' => 'Swift_Plugins_BlackholePlugin',
            'swiftmailer.spool.file.class' => 'Swift_FileSpool',
            'swiftmailer.spool.memory.class' => 'Swift_MemorySpool',
            'swiftmailer.email_sender.listener.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener',
            'swiftmailer.data_collector.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\DataCollector\\MessageDataCollector',
            'swiftmailer.mailer.default.transport.name' => 'smtp',
            'swiftmailer.mailer.default.delivery.enabled' => true,
            'swiftmailer.mailer.default.transport.smtp.encryption' => NULL,
            'swiftmailer.mailer.default.transport.smtp.port' => 1025,
            'swiftmailer.mailer.default.transport.smtp.host' => '127.0.0.1',
            'swiftmailer.mailer.default.transport.smtp.username' => NULL,
            'swiftmailer.mailer.default.transport.smtp.password' => NULL,
            'swiftmailer.mailer.default.transport.smtp.auth_mode' => NULL,
            'swiftmailer.mailer.default.transport.smtp.timeout' => 30,
            'swiftmailer.mailer.default.transport.smtp.source_ip' => NULL,
            'swiftmailer.mailer.default.transport.smtp.local_domain' => NULL,
            'swiftmailer.spool.default.memory.path' => (__DIR__.'/swiftmailer/spool/default'),
            'swiftmailer.mailer.default.spool.enabled' => true,
            'swiftmailer.mailer.default.sender_address' => 'no-reply@symfony.local',
            'swiftmailer.sender_address' => 'no-reply@symfony.local',
            'swiftmailer.mailer.default.single_address' => NULL,
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => array(
                'default' => 'swiftmailer.mailer.default',
            ),
            'swiftmailer.default_mailer' => 'default',
            'doctrine_cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine_cache.apcu.class' => 'Doctrine\\Common\\Cache\\ApcuCache',
            'doctrine_cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine_cache.chain.class' => 'Doctrine\\Common\\Cache\\ChainCache',
            'doctrine_cache.couchbase.class' => 'Doctrine\\Common\\Cache\\CouchbaseCache',
            'doctrine_cache.couchbase.connection.class' => 'Couchbase',
            'doctrine_cache.couchbase.hostnames' => 'localhost:8091',
            'doctrine_cache.file_system.class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
            'doctrine_cache.php_file.class' => 'Doctrine\\Common\\Cache\\PhpFileCache',
            'doctrine_cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine_cache.memcache.connection.class' => 'Memcache',
            'doctrine_cache.memcache.host' => 'localhost',
            'doctrine_cache.memcache.port' => 11211,
            'doctrine_cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine_cache.memcached.connection.class' => 'Memcached',
            'doctrine_cache.memcached.host' => 'localhost',
            'doctrine_cache.memcached.port' => 11211,
            'doctrine_cache.mongodb.class' => 'Doctrine\\Common\\Cache\\MongoDBCache',
            'doctrine_cache.mongodb.collection.class' => 'MongoCollection',
            'doctrine_cache.mongodb.connection.class' => 'MongoClient',
            'doctrine_cache.mongodb.server' => 'localhost:27017',
            'doctrine_cache.predis.client.class' => 'Predis\\Client',
            'doctrine_cache.predis.scheme' => 'tcp',
            'doctrine_cache.predis.host' => 'localhost',
            'doctrine_cache.predis.port' => 6379,
            'doctrine_cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine_cache.redis.connection.class' => 'Redis',
            'doctrine_cache.redis.host' => 'localhost',
            'doctrine_cache.redis.port' => 6379,
            'doctrine_cache.riak.class' => 'Doctrine\\Common\\Cache\\RiakCache',
            'doctrine_cache.riak.bucket.class' => 'Riak\\Bucket',
            'doctrine_cache.riak.connection.class' => 'Riak\\Connection',
            'doctrine_cache.riak.bucket_property_list.class' => 'Riak\\BucketPropertyList',
            'doctrine_cache.riak.host' => 'localhost',
            'doctrine_cache.riak.port' => 8087,
            'doctrine_cache.sqlite3.class' => 'Doctrine\\Common\\Cache\\SQLite3Cache',
            'doctrine_cache.sqlite3.connection.class' => 'SQLite3',
            'doctrine_cache.void.class' => 'Doctrine\\Common\\Cache\\VoidCache',
            'doctrine_cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine_cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine_cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine_cache.security.acl.cache.class' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\Acl\\Model\\AclCache',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => array(
                'default' => 'doctrine.orm.default_entity_manager',
            ),
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => array(

            ),
            'doctrine.connections' => array(
                'default' => 'doctrine.dbal.default_connection',
            ),
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\ORM\\Mapping\\DefaultEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.proxy_dir' => (__DIR__.'/doctrine/orm/Proxies'),
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'sensio_framework_extra.view.guesser.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Templating\\TemplateGuesser',
            'sensio_framework_extra.controller.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener',
            'sensio_framework_extra.routing.loader.annot_dir.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationDirectoryLoader',
            'sensio_framework_extra.routing.loader.annot_file.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationFileLoader',
            'sensio_framework_extra.routing.loader.annot_class.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Routing\\AnnotatedRouteControllerLoader',
            'sensio_framework_extra.converter.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener',
            'sensio_framework_extra.converter.manager.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\ParamConverterManager',
            'sensio_framework_extra.converter.doctrine.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DoctrineParamConverter',
            'sensio_framework_extra.converter.datetime.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DateTimeParamConverter',
            'sensio_framework_extra.view.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener',
            'fos_user.backend_type_orm' => true,
            'fos_user.security.interactive_login_listener.class' => 'FOS\\UserBundle\\EventListener\\LastLoginListener',
            'fos_user.security.login_manager.class' => 'FOS\\UserBundle\\Security\\LoginManager',
            'fos_user.resetting.email.template' => 'FOSUserBundle:Resetting:email.txt.twig',
            'fos_user.registration.confirmation.template' => 'FOSUserBundle:Registration:email.txt.twig',
            'fos_user.storage' => 'orm',
            'fos_user.firewall_name' => 'main',
            'fos_user.model_manager_name' => NULL,
            'fos_user.model.user.class' => 'UserBundle\\Entity\\User',
            'fos_user.profile.form.type' => 'FOS\\UserBundle\\Form\\Type\\ProfileFormType',
            'fos_user.profile.form.name' => 'fos_user_profile_form',
            'fos_user.profile.form.validation_groups' => array(
                0 => 'Profile',
                1 => 'Default',
            ),
            'fos_user.registration.confirmation.from_email' => array(
                'no-reply@symfony.local' => 'rest-project',
            ),
            'fos_user.registration.confirmation.enabled' => false,
            'fos_user.registration.form.type' => 'FOS\\UserBundle\\Form\\Type\\RegistrationFormType',
            'fos_user.registration.form.name' => 'fos_user_registration_form',
            'fos_user.registration.form.validation_groups' => array(
                0 => 'Registration',
                1 => 'Default',
            ),
            'fos_user.change_password.form.type' => 'FOS\\UserBundle\\Form\\Type\\ChangePasswordFormType',
            'fos_user.change_password.form.name' => 'fos_user_change_password_form',
            'fos_user.change_password.form.validation_groups' => array(
                0 => 'ChangePassword',
                1 => 'Default',
            ),
            'fos_user.resetting.email.from_email' => array(
                'no-reply@symfony.local' => 'rest-project',
            ),
            'fos_user.resetting.token_ttl' => 86400,
            'fos_user.resetting.form.type' => 'FOS\\UserBundle\\Form\\Type\\ResettingFormType',
            'fos_user.resetting.form.name' => 'fos_user_resetting_form',
            'fos_user.resetting.form.validation_groups' => array(
                0 => 'ResetPassword',
                1 => 'Default',
            ),
            'jms_serializer.form_error_handler.class' => 'JMS\\Serializer\\Handler\\FormErrorHandler',
            'fos_oauth_server.server.class' => 'OAuth2\\OAuth2',
            'fos_oauth_server.security.authentication.provider.class' => 'FOS\\OAuthServerBundle\\Security\\Authentication\\Provider\\OAuthProvider',
            'fos_oauth_server.security.authentication.listener.class' => 'FOS\\OAuthServerBundle\\Security\\Firewall\\OAuthListener',
            'fos_oauth_server.security.entry_point.class' => 'FOS\\OAuthServerBundle\\Security\\EntryPoint\\OAuthEntryPoint',
            'fos_oauth_server.server.options' => array(

            ),
            'fos_oauth_server.model_manager_name' => NULL,
            'fos_oauth_server.model.client.class' => 'UserBundle\\Entity\\Client',
            'fos_oauth_server.model.access_token.class' => 'UserBundle\\Entity\\AccessToken',
            'fos_oauth_server.model.refresh_token.class' => 'UserBundle\\Entity\\RefreshToken',
            'fos_oauth_server.model.auth_code.class' => 'UserBundle\\Entity\\AuthCode',
            'fos_oauth_server.template.engine' => 'twig',
            'fos_oauth_server.authorize.form.type' => 'FOS\\OAuthServerBundle\\Form\\Type\\AuthorizeFormType',
            'fos_oauth_server.authorize.form.name' => 'fos_oauth_server_authorize_form',
            'fos_oauth_server.authorize.form.validation_groups' => array(
                0 => 'Authorize',
                1 => 'Default',
            ),
            'jms_serializer.metadata.file_locator.class' => 'Metadata\\Driver\\FileLocator',
            'jms_serializer.metadata.annotation_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\AnnotationDriver',
            'jms_serializer.metadata.chain_driver.class' => 'Metadata\\Driver\\DriverChain',
            'jms_serializer.metadata.yaml_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\YamlDriver',
            'jms_serializer.metadata.xml_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\XmlDriver',
            'jms_serializer.metadata.php_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\PhpDriver',
            'jms_serializer.metadata.doctrine_type_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\DoctrineTypeDriver',
            'jms_serializer.metadata.doctrine_phpcr_type_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\DoctrinePHPCRTypeDriver',
            'jms_serializer.metadata.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'jms_serializer.metadata.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'jms_serializer.metadata.cache.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'jms_serializer.event_dispatcher.class' => 'JMS\\Serializer\\EventDispatcher\\LazyEventDispatcher',
            'jms_serializer.camel_case_naming_strategy.class' => 'JMS\\Serializer\\Naming\\CamelCaseNamingStrategy',
            'jms_serializer.serialized_name_annotation_strategy.class' => 'JMS\\Serializer\\Naming\\SerializedNameAnnotationStrategy',
            'jms_serializer.cache_naming_strategy.class' => 'JMS\\Serializer\\Naming\\CacheNamingStrategy',
            'jms_serializer.doctrine_object_constructor.class' => 'JMS\\Serializer\\Construction\\DoctrineObjectConstructor',
            'jms_serializer.unserialize_object_constructor.class' => 'JMS\\Serializer\\Construction\\UnserializeObjectConstructor',
            'jms_serializer.version_exclusion_strategy.class' => 'JMS\\Serializer\\Exclusion\\VersionExclusionStrategy',
            'jms_serializer.serializer.class' => 'JMS\\Serializer\\Serializer',
            'jms_serializer.twig_extension.class' => 'JMS\\Serializer\\Twig\\SerializerExtension',
            'jms_serializer.templating.helper.class' => 'JMS\\SerializerBundle\\Templating\\SerializerHelper',
            'jms_serializer.json_serialization_visitor.class' => 'JMS\\Serializer\\JsonSerializationVisitor',
            'jms_serializer.json_serialization_visitor.options' => 0,
            'jms_serializer.json_deserialization_visitor.class' => 'JMS\\Serializer\\JsonDeserializationVisitor',
            'jms_serializer.xml_serialization_visitor.class' => 'JMS\\Serializer\\XmlSerializationVisitor',
            'jms_serializer.xml_deserialization_visitor.class' => 'JMS\\Serializer\\XmlDeserializationVisitor',
            'jms_serializer.xml_deserialization_visitor.doctype_whitelist' => array(

            ),
            'jms_serializer.yaml_serialization_visitor.class' => 'JMS\\Serializer\\YamlSerializationVisitor',
            'jms_serializer.handler_registry.class' => 'JMS\\Serializer\\Handler\\LazyHandlerRegistry',
            'jms_serializer.datetime_handler.class' => 'JMS\\Serializer\\Handler\\DateHandler',
            'jms_serializer.array_collection_handler.class' => 'JMS\\Serializer\\Handler\\ArrayCollectionHandler',
            'jms_serializer.php_collection_handler.class' => 'JMS\\Serializer\\Handler\\PhpCollectionHandler',
            'jms_serializer.constraint_violation_handler.class' => 'JMS\\Serializer\\Handler\\ConstraintViolationHandler',
            'jms_serializer.doctrine_proxy_subscriber.class' => 'JMS\\Serializer\\EventDispatcher\\Subscriber\\DoctrineProxySubscriber',
            'jms_serializer.stopwatch_subscriber.class' => 'JMS\\SerializerBundle\\Serializer\\StopwatchEventSubscriber',
            'nelmio_api_doc.motd.template' => 'NelmioApiDocBundle::Components/motd.html.twig',
            'nelmio_api_doc.exclude_sections' => array(

            ),
            'nelmio_api_doc.default_sections_opened' => true,
            'nelmio_api_doc.api_name' => 'API documentation',
            'nelmio_api_doc.sandbox.enabled' => true,
            'nelmio_api_doc.sandbox.endpoint' => NULL,
            'nelmio_api_doc.sandbox.accept_type' => NULL,
            'nelmio_api_doc.sandbox.body_format.formats' => array(
                0 => 'form',
                1 => 'json',
            ),
            'nelmio_api_doc.sandbox.body_format.default_format' => 'form',
            'nelmio_api_doc.sandbox.request_format.method' => 'format_param',
            'nelmio_api_doc.sandbox.request_format.default_format' => 'json',
            'nelmio_api_doc.sandbox.request_format.formats' => array(
                'json' => 'application/json',
                'xml' => 'application/xml',
            ),
            'nelmio_api_doc.sandbox.entity_to_choice' => true,
            'nelmio_api_doc.formatter.abstract_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\AbstractFormatter',
            'nelmio_api_doc.formatter.markdown_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\MarkdownFormatter',
            'nelmio_api_doc.formatter.simple_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\SimpleFormatter',
            'nelmio_api_doc.formatter.html_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\HtmlFormatter',
            'nelmio_api_doc.formatter.swagger_formatter.class' => 'Nelmio\\ApiDocBundle\\Formatter\\SwaggerFormatter',
            'nelmio_api_doc.sandbox.authentication' => NULL,
            'nelmio_api_doc.extractor.api_doc_extractor.class' => 'Nelmio\\ApiDocBundle\\Extractor\\ApiDocExtractor',
            'nelmio_api_doc.form.extension.description_form_type_extension.class' => 'Nelmio\\ApiDocBundle\\Form\\Extension\\DescriptionFormTypeExtension',
            'nelmio_api_doc.twig.extension.extra_markdown.class' => 'Nelmio\\ApiDocBundle\\Twig\\Extension\\MarkdownExtension',
            'nelmio_api_doc.doc_comment_extractor.class' => 'Nelmio\\ApiDocBundle\\Util\\DocCommentExtractor',
            'nelmio_api_doc.extractor.handler.fos_rest.class' => 'Nelmio\\ApiDocBundle\\Extractor\\Handler\\FosRestHandler',
            'nelmio_api_doc.extractor.handler.jms_security.class' => 'Nelmio\\ApiDocBundle\\Extractor\\Handler\\JmsSecurityExtraHandler',
            'nelmio_api_doc.extractor.handler.sensio_framework_extra.class' => 'Nelmio\\ApiDocBundle\\Extractor\\Handler\\SensioFrameworkExtraHandler',
            'nelmio_api_doc.extractor.handler.phpdoc.class' => 'Nelmio\\ApiDocBundle\\Extractor\\Handler\\PhpDocHandler',
            'nelmio_api_doc.parser.collection_parser.class' => 'Nelmio\\ApiDocBundle\\Parser\\CollectionParser',
            'nelmio_api_doc.parser.form_errors_parser.class' => 'Nelmio\\ApiDocBundle\\Parser\\FormErrorsParser',
            'nelmio_api_doc.parser.json_serializable_parser.class' => 'Nelmio\\ApiDocBundle\\Parser\\JsonSerializableParser',
            'nelmio_api_doc.request_listener.parameter' => '_doc',
            'nelmio_api_doc.event_listener.request.class' => 'Nelmio\\ApiDocBundle\\EventListener\\RequestListener',
            'nelmio_api_doc.parser.validation_parser.class' => 'Nelmio\\ApiDocBundle\\Parser\\ValidationParser',
            'nelmio_api_doc.swagger.base_path' => '/api',
            'nelmio_api_doc.swagger.swagger_version' => '1.2',
            'nelmio_api_doc.swagger.api_version' => '0.1',
            'nelmio_api_doc.swagger.info' => array(
                'title' => 'Symfony2',
                'description' => 'My awesome Symfony2 app!',
                'TermsOfServiceUrl' => NULL,
                'contact' => NULL,
                'license' => NULL,
                'licenseUrl' => NULL,
            ),
            'nelmio_api_doc.swagger.model_naming_strategy' => 'dot_notation',
            'nelmio_cors.defaults' => array(
                'allow_origin' => true,
                'allow_credentials' => false,
                'allow_headers' => array(
                    0 => 'content-type',
                    1 => 'authorization',
                    2 => 'x-accept-version',
                ),
                'expose_headers' => array(
                    0 => 'link',
                ),
                'allow_methods' => array(
                    0 => 'POST',
                    1 => 'PUT',
                    2 => 'PATCH',
                    3 => 'GET',
                    4 => 'DELETE',
                    5 => 'OPTIONS',
                ),
                'max_age' => 3600,
                'hosts' => array(

                ),
                'origin_regex' => false,
            ),
            'nelmio_cors.map' => array(
                '^/' => array(

                ),
            ),
            'nelmio_cors.cors_listener.class' => 'Nelmio\\CorsBundle\\EventListener\\CorsListener',
            'nelmio_cors.options_resolver.class' => 'Nelmio\\CorsBundle\\Options\\Resolver',
            'nelmio_cors.options_provider.config.class' => 'Nelmio\\CorsBundle\\Options\\ConfigProvider',
            'stof_doctrine_extensions.event_listener.locale.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\LocaleListener',
            'stof_doctrine_extensions.event_listener.logger.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\LoggerListener',
            'stof_doctrine_extensions.event_listener.blame.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\BlameListener',
            'stof_doctrine_extensions.uploadable.manager.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadableManager',
            'stof_doctrine_extensions.uploadable.mime_type_guesser.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\MimeTypeGuesserAdapter',
            'stof_doctrine_extensions.uploadable.default_file_info.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo',
            'stof_doctrine_extensions.default_locale' => 'en',
            'stof_doctrine_extensions.default_file_path' => NULL,
            'stof_doctrine_extensions.translation_fallback' => false,
            'stof_doctrine_extensions.persist_default_translation' => false,
            'stof_doctrine_extensions.skip_translation_on_load' => false,
            'stof_doctrine_extensions.uploadable.validate_writable_directory' => true,
            'stof_doctrine_extensions.listener.translatable.class' => 'Gedmo\\Translatable\\TranslatableListener',
            'stof_doctrine_extensions.listener.timestampable.class' => 'Gedmo\\Timestampable\\TimestampableListener',
            'stof_doctrine_extensions.listener.blameable.class' => 'Gedmo\\Blameable\\BlameableListener',
            'stof_doctrine_extensions.listener.sluggable.class' => 'Gedmo\\Sluggable\\SluggableListener',
            'stof_doctrine_extensions.listener.tree.class' => 'Gedmo\\Tree\\TreeListener',
            'stof_doctrine_extensions.listener.loggable.class' => 'Gedmo\\Loggable\\LoggableListener',
            'stof_doctrine_extensions.listener.sortable.class' => 'Gedmo\\Sortable\\SortableListener',
            'stof_doctrine_extensions.listener.softdeleteable.class' => 'Gedmo\\SoftDeleteable\\SoftDeleteableListener',
            'stof_doctrine_extensions.listener.uploadable.class' => 'Gedmo\\Uploadable\\UploadableListener',
            'stof_doctrine_extensions.listener.reference_integrity.class' => 'Gedmo\\ReferenceIntegrity\\ReferenceIntegrityListener',
            'hateoas.link_factory.class' => 'Hateoas\\Factory\\LinkFactory',
            'hateoas.links_factory.class' => 'Hateoas\\Factory\\LinksFactory',
            'hateoas.embeds_factory.class' => 'Hateoas\\Factory\\EmbeddedsFactory',
            'hateoas.expression.evaluator.class' => 'Bazinga\\Bundle\\HateoasBundle\\Hateoas\\Expression\\LazyFunctionExpressionEvaluator',
            'bazinga_hateoas.expression_language.class' => 'Bazinga\\Bundle\\HateoasBundle\\ExpressionLanguage\\ExpressionLanguage',
            'hateoas.expression.link.class' => 'Hateoas\\Expression\\LinkExpressionFunction',
            'hateoas.serializer.xml.class' => 'Hateoas\\Serializer\\XmlSerializer',
            'hateoas.serializer.json_hal.class' => 'Hateoas\\Serializer\\JsonHalSerializer',
            'hateoas.serializer.exclusion_manager.class' => 'Hateoas\\Serializer\\ExclusionManager',
            'hateoas.event_subscriber.xml.class' => 'Hateoas\\Serializer\\EventSubscriber\\XmlEventSubscriber',
            'hateoas.event_subscriber.json.class' => 'Hateoas\\Serializer\\EventSubscriber\\JsonEventSubscriber',
            'hateoas.inline_deferrer.embeds.class' => 'Hateoas\\Serializer\\Metadata\\InlineDeferrer',
            'hateoas.inline_deferrer.links.class' => 'Hateoas\\Serializer\\Metadata\\InlineDeferrer',
            'hateoas.configuration.provider.resolver.chain.class' => 'Hateoas\\Configuration\\Provider\\Resolver\\ChainResolver',
            'hateoas.configuration.provider.resolver.method.class' => 'Hateoas\\Configuration\\Provider\\Resolver\\MethodResolver',
            'hateoas.configuration.provider.resolver.static_method.class' => 'Hateoas\\Configuration\\Provider\\Resolver\\StaticMethodResolver',
            'hateoas.configuration.provider.resolver.symfony_container.class' => 'Hateoas\\Configuration\\Provider\\Resolver\\SymfonyContainerResolver',
            'hateoas.configuration.relation_provider.class' => 'Hateoas\\Configuration\\Provider\\RelationProvider',
            'hateoas.configuration.relations_repository.class' => 'Hateoas\\Configuration\\RelationsRepository',
            'hateoas.configuration.metadata.yaml_driver.class' => 'Hateoas\\Configuration\\Metadata\\Driver\\YamlDriver',
            'hateoas.configuration.metadata.xml_driver.class' => 'Hateoas\\Configuration\\Metadata\\Driver\\XmlDriver',
            'hateoas.configuration.metadata.annotation_driver.class' => 'Hateoas\\Configuration\\Metadata\\Driver\\AnnotationDriver',
            'hateoas.configuration.metadata.extension_driver.class' => 'Hateoas\\Configuration\\Metadata\\Driver\\ExtensionDriver',
            'hateoas.generator.registry.class' => 'Hateoas\\UrlGenerator\\UrlGeneratorRegistry',
            'hateoas.generator.symfony.class' => 'Hateoas\\UrlGenerator\\SymfonyUrlGenerator',
            'hateoas.helper.link.class' => 'Hateoas\\Helper\\LinkHelper',
            'hateoas.twig.link.class' => 'Hateoas\\Twig\\Extension\\LinkExtension',
            'white_october_pagerfanta.default_view' => 'default',
            'white_october_pagerfanta.view_factory.class' => 'Pagerfanta\\View\\ViewFactory',
            'web_profiler.debug_toolbar.position' => 'bottom',
            'web_profiler.debug_toolbar.intercept_redirects' => false,
            'web_profiler.debug_toolbar.mode' => 2,
            'data_collector.templates' => array(
                'data_collector.request' => array(
                    0 => 'request',
                    1 => '@WebProfiler/Collector/request.html.twig',
                ),
                'data_collector.time' => array(
                    0 => 'time',
                    1 => '@WebProfiler/Collector/time.html.twig',
                ),
                'data_collector.memory' => array(
                    0 => 'memory',
                    1 => '@WebProfiler/Collector/memory.html.twig',
                ),
                'data_collector.ajax' => array(
                    0 => 'ajax',
                    1 => '@WebProfiler/Collector/ajax.html.twig',
                ),
                'data_collector.form' => array(
                    0 => 'form',
                    1 => '@WebProfiler/Collector/form.html.twig',
                ),
                'data_collector.exception' => array(
                    0 => 'exception',
                    1 => '@WebProfiler/Collector/exception.html.twig',
                ),
                'data_collector.logger' => array(
                    0 => 'logger',
                    1 => '@WebProfiler/Collector/logger.html.twig',
                ),
                'data_collector.events' => array(
                    0 => 'events',
                    1 => '@WebProfiler/Collector/events.html.twig',
                ),
                'data_collector.router' => array(
                    0 => 'router',
                    1 => '@WebProfiler/Collector/router.html.twig',
                ),
                'data_collector.translation' => array(
                    0 => 'translation',
                    1 => '@WebProfiler/Collector/translation.html.twig',
                ),
                'data_collector.security' => array(
                    0 => 'security',
                    1 => '@Security/Collector/security.html.twig',
                ),
                'data_collector.twig' => array(
                    0 => 'twig',
                    1 => '@WebProfiler/Collector/twig.html.twig',
                ),
                'data_collector.doctrine' => array(
                    0 => 'db',
                    1 => '@Doctrine/Collector/db.html.twig',
                ),
                'swiftmailer.data_collector' => array(
                    0 => 'swiftmailer',
                    1 => '@Swiftmailer/Collector/swiftmailer.html.twig',
                ),
                'data_collector.dump' => array(
                    0 => 'dump',
                    1 => '@Debug/Profiler/dump.html.twig',
                ),
                'data_collector.config' => array(
                    0 => 'config',
                    1 => '@WebProfiler/Collector/config.html.twig',
                ),
            ),
            'console.command.ids' => array(
                0 => 'user.command.create_client',
                1 => 'sensio_distribution.security_checker.command',
            ),
            'nelmio_api_doc.parser.form_type_parser.class' => 'Nelmio\\ApiDocBundle\\Parser\\FormTypeParser',
            'nelmio_api_doc.parser.jms_metadata_parser.class' => 'Nelmio\\ApiDocBundle\\Parser\\JmsMetadataParser',
        );
    }
}
