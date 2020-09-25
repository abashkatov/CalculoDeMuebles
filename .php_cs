<?php

if (!\file_exists(__DIR__ . '/src')) {
    exit(0);
}

$config = PhpCsFixer\Config::create()
    ->setRules([
        '@DoctrineAnnotation' => true,
        '@PHP56Migration' => true,
        '@PHP70Migration' => true,
        '@PHP71Migration' => true,
        '@PHPUnit75Migration:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'align_multiline_comment' => true,
        'array_syntax' => ['syntax' => 'short'],
        'backtick_to_shell_exec' => true,
        'binary_operator_spaces' => [
            'default' => 'single_space',
        ],
        'blank_line_after_namespace' => true,
        'blank_line_before_statement' => true,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_typehint' => true,
        'concat_space' => ['spacing' => 'one'],
        'doctrine_annotation_array_assignment' => false,
        'doctrine_annotation_braces' => false,
        'doctrine_annotation_indentation' => true,
        'doctrine_annotation_spaces' => true,
        'general_phpdoc_annotation_remove' => [
            'annotations' => [
                'expectedException',
                'expectedExceptionMessage',
                'expectedExceptionMessageRegExp',
            ],
        ],
        'heredoc_to_nowdoc' => true,
        'list_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'mb_str_functions' => true,
        'method_argument_space' => ['ensure_fully_multiline' => true],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
        'native_function_invocation' => true,
        'no_extra_consecutive_blank_lines' => [
            'tokens' => [
                'break',
                'continue',
                'extra',
                'return',
                'throw',
                'use',
                'parenthesis_brace_block',
                'square_brace_block',
                'curly_brace_block',
            ],
        ],
        'no_homoglyph_names' => false,
        'no_null_property_initialization' => true,
        'no_php4_constructor' => true,
        'no_short_echo_tag' => true,
        'no_superfluous_elseif' => true,
        'no_unneeded_curly_braces' => true,
        'no_unneeded_final_method' => true,
        'no_unreachable_default_argument_value' => false,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => [
            'order' => [
                'use_trait',
                'constant',
                'constant_public',
                'constant_protected',
                'constant_private',
                'property',
                'property_public',
                'property_protected',
                'property_private',
                'construct',
                'destruct',
                'magic',
                'method_static',
                'method_public_static',
                'method_protected_static',
                'method_private_static',
                'phpunit',
            ],
        ],
        'ordered_imports' => true,
        'php_unit_strict' => false,
        'php_unit_method_casing' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'phpdoc_types_order' => true,
        'random_api_migration' => true,
        'semicolon_after_instruction' => true,
        'strict_comparison' => false,
        'strict_param' => false,
        'yoda_style' => true,    ])
    ->setRiskyAllowed(true)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src')
            ->append([__FILE__])
            ->exclude([
                'Symfony/Component/DependencyInjection/Tests/Fixtures',
                'Symfony/Component/Routing/Tests/Fixtures/dumper',
                'Symfony/Component/Templating/Tests/Fixtures/templates',
                'Symfony/Bundle/FrameworkBundle/Tests/Fixtures/TemplatePathsCache',
                'Symfony/Bundle/FrameworkBundle/Tests/Templating/Helper/Resources/Custom',
                'Symfony/Component/VarDumper/Tests/Fixtures',
                'Symfony/Bundle/FrameworkBundle/Resources/views/Form',
                'Symfony/Bridge/PhpUnit/Tests/DeprecationErrorHandler/',
            ])
            ->notPath('Symfony/Bridge/PhpUnit/SymfonyTestsListener.php')
            ->notPath('Symfony/Component/Translation/Tests/fixtures/resources.php')
            ->notPath('Symfony/Bundle/FrameworkBundle/Tests/Templating/Helper/Resources/Custom/_name_entry_label.html.php')
            ->notPath('Symfony/Bundle/FrameworkBundle/Tests/Fixtures/Resources/views/translation.html.php')
            ->notPath('Symfony/Component/Debug/Tests/DebugClassLoaderTest.php')
    )
    ->setUsingCache(true)
    ->setCacheFile(__DIR__ . '/var/.php_cs.cache')
;

return $config;
