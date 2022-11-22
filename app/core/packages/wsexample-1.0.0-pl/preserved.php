<?php return array (
  '75112e9d81f982cd07805b3623437077' => 
  array (
    'criteria' => 
    array (
      'name' => 'wsexample',
    ),
    'object' => 
    array (
      'name' => 'wsexample',
      'path' => '{core_path}components/wsexample/',
      'assets_path' => '',
    ),
  ),
  '6b95780b508d38ea422ada2b616a3246' => 
  array (
    'criteria' => 
    array (
      'text' => 'wsexample',
    ),
    'object' => 
    array (
      'text' => 'wsexample',
      'parent' => 'components',
      'action' => 'home',
      'description' => 'wsexample_menu_desc',
      'icon' => '',
      'menuindex' => 0,
      'params' => '',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'wsexample',
    ),
  ),
  '88ef204d8f6b8ef114dc5d64f970d9cc' => 
  array (
    'criteria' => 
    array (
      'category' => 'WsExample',
    ),
    'object' => 
    array (
      'id' => 1,
      'parent' => 0,
      'category' => 'WsExample',
      'rank' => 0,
    ),
  ),
  '1f1207a33bd1a65f73b7af3eaf9ae752' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.WsExample.item',
    ),
    'object' => 
    array (
      'id' => 1,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.WsExample.item',
      'description' => '',
      'editor_type' => 0,
      'category' => 1,
      'cache_type' => 0,
      'snippet' => '<p>
    <strong>[[+name]]</strong> -
    <small>[[+description]]</small>
</p>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/wsexample/elements/chunks/item.tpl',
      'content' => '<p>
    <strong>[[+name]]</strong> -
    <small>[[+description]]</small>
</p>',
    ),
  ),
  '6680efdbd358475bbb4e3ebf95feadd7' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.WsExample.office',
    ),
    'object' => 
    array (
      'id' => 2,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.WsExample.office',
      'description' => '',
      'editor_type' => 0,
      'category' => 1,
      'cache_type' => 0,
      'snippet' => '<div id="office-wsexample-wrapper">
    <div id="office-preloader"></div>
</div>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/wsexample/elements/chunks/office.tpl',
      'content' => '<div id="office-wsexample-wrapper">
    <div id="office-preloader"></div>
</div>',
    ),
  ),
  '53bf4b92ab0f4cea17e13bf9339362ff' => 
  array (
    'criteria' => 
    array (
      'name' => 'WsExample',
    ),
    'object' => 
    array (
      'id' => 1,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'WsExample',
      'description' => 'WsExample snippet to list items',
      'editor_type' => 0,
      'category' => 1,
      'cache_type' => 0,
      'snippet' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var WsExample $WsExample */
$WsExample = $modx->getService(\'WsExample\', \'WsExample\', MODX_CORE_PATH . \'components/wsexample/model/\', $scriptProperties);
if (!$WsExample) {
    return \'Could not load WsExample class!\';
}

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'Item\');
$sortby = $modx->getOption(\'sortby\', $scriptProperties, \'name\');
$sortdir = $modx->getOption(\'sortbir\', $scriptProperties, \'ASC\');
$limit = $modx->getOption(\'limit\', $scriptProperties, 5);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, "\\n");
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);

// Build query
$c = $modx->newQuery(\'WsExampleItem\');
$c->sortby($sortby, $sortdir);
$c->where([\'active\' => 1]);
$c->limit($limit);
$items = $modx->getIterator(\'WsExampleItem\', $c);

// Iterate through items
$list = [];
/** @var WsExampleItem $item */
foreach ($items as $item) {
    $list[] = $modx->getChunk($tpl, $item->toArray());
}

// Output
$output = implode($outputSeparator, $list);
if (!empty($toPlaceholder)) {
    // If using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder, $output);

    return \'\';
}
// By default just return output
return $output;',
      'locked' => 0,
      'properties' => 'a:6:{s:3:"tpl";a:7:{s:4:"name";s:3:"tpl";s:4:"desc";s:18:"wsexample_prop_tpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:18:"tpl.WsExample.item";s:7:"lexicon";s:20:"wsexample:properties";s:4:"area";s:0:"";}s:6:"sortby";a:7:{s:4:"name";s:6:"sortby";s:4:"desc";s:21:"wsexample_prop_sortby";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:4:"name";s:7:"lexicon";s:20:"wsexample:properties";s:4:"area";s:0:"";}s:7:"sortdir";a:7:{s:4:"name";s:7:"sortdir";s:4:"desc";s:22:"wsexample_prop_sortdir";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:4:"text";s:3:"ASC";s:5:"value";s:3:"ASC";}i:1;a:2:{s:4:"text";s:4:"DESC";s:5:"value";s:4:"DESC";}}s:5:"value";s:3:"ASC";s:7:"lexicon";s:20:"wsexample:properties";s:4:"area";s:0:"";}s:5:"limit";a:7:{s:4:"name";s:5:"limit";s:4:"desc";s:20:"wsexample_prop_limit";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:10;s:7:"lexicon";s:20:"wsexample:properties";s:4:"area";s:0:"";}s:15:"outputSeparator";a:7:{s:4:"name";s:15:"outputSeparator";s:4:"desc";s:30:"wsexample_prop_outputSeparator";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:1:"
";s:7:"lexicon";s:20:"wsexample:properties";s:4:"area";s:0:"";}s:13:"toPlaceholder";a:7:{s:4:"name";s:13:"toPlaceholder";s:4:"desc";s:28:"wsexample_prop_toPlaceholder";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:20:"wsexample:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/wsexample/elements/snippets/wsexample.php',
      'content' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var WsExample $WsExample */
$WsExample = $modx->getService(\'WsExample\', \'WsExample\', MODX_CORE_PATH . \'components/wsexample/model/\', $scriptProperties);
if (!$WsExample) {
    return \'Could not load WsExample class!\';
}

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption(\'tpl\', $scriptProperties, \'Item\');
$sortby = $modx->getOption(\'sortby\', $scriptProperties, \'name\');
$sortdir = $modx->getOption(\'sortbir\', $scriptProperties, \'ASC\');
$limit = $modx->getOption(\'limit\', $scriptProperties, 5);
$outputSeparator = $modx->getOption(\'outputSeparator\', $scriptProperties, "\\n");
$toPlaceholder = $modx->getOption(\'toPlaceholder\', $scriptProperties, false);

// Build query
$c = $modx->newQuery(\'WsExampleItem\');
$c->sortby($sortby, $sortdir);
$c->where([\'active\' => 1]);
$c->limit($limit);
$items = $modx->getIterator(\'WsExampleItem\', $c);

// Iterate through items
$list = [];
/** @var WsExampleItem $item */
foreach ($items as $item) {
    $list[] = $modx->getChunk($tpl, $item->toArray());
}

// Output
$output = implode($outputSeparator, $list);
if (!empty($toPlaceholder)) {
    // If using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder, $output);

    return \'\';
}
// By default just return output
return $output;',
    ),
  ),
);