<?php
/*
 * This file is part of MODX Revolution.
 *
 * Copyright (c) MODX, LLC. All Rights Reserved.
 *
 * For complete copyright and license information, see the COPYRIGHT and LICENSE
 * files found in the top-level directory of this distribution.
 */

use MODX\Revolution\modCategory;
use MODX\Revolution\modManagerController;
use MODX\Revolution\modSystemEvent;

/**
 * Load create template page
 *
 * @package modx
 * @subpackage manager.controllers
 */
class ElementTemplateCreateManagerController extends modManagerController {
    public $category;
    public $onTempFormRender = '';
    public $onTempFormPrerender = '';

    /**
     * Check for any permissions or requirements to load page
     * @return bool
     */
    public function checkPermissions() {
        return $this->modx->hasPermission('new_template');
    }

    /**
     * Register custom CSS/JS for the page
     * @return void
     */
    public function loadCustomCssJs() {
        $mgrUrl = $this->modx->getOption('manager_url',null,MODX_MANAGER_URL);
        $this->addJavascript($mgrUrl.'assets/modext/widgets/core/modx.grid.local.property.js');
        $this->addJavascript($mgrUrl.'assets/modext/widgets/element/modx.grid.element.properties.js');
        $this->addJavascript($mgrUrl.'assets/modext/widgets/element/modx.grid.template.tv.js');
        $this->addJavascript($mgrUrl.'assets/modext/widgets/element/modx.panel.template.js');
        $this->addJavascript($mgrUrl.'assets/modext/sections/element/template/create.js');
        $this->addHtml('
        <script>
        // <![CDATA[
        MODx.onTempFormRender = "'.$this->onTempFormRender.'";
        Ext.onReady(function() {
            MODx.load({
                xtype: "modx-page-template-create"
                ,record: {
                    category: "'.($this->category ? $this->category->get('id') : 0).'"
                }
            });
        });
        // ]]>
        </script>');
    }

    /**
     * Custom logic code here for setting placeholders, etc
     * @param array $scriptProperties
     * @return mixed
     */
    public function process(array $scriptProperties = []) {
        $placeholders = [];

        /* grab category if preset */
        if (isset($scriptProperties['category'])) {
            $this->category = $this->modx->getObject(modCategory::class, $scriptProperties['category']);
            if ($this->category !== null) {
                $placeholders['category'] = $this->category;
            }
        }

        /* invoke OnTempFormRender event */
        $placeholders['onTempFormRender'] = $this->fireRenderEvent();

        return $placeholders;
    }

    /**
     * Invoke OnTempFormPrerender event
     * @return void
     */
    public function firePreRenderEvents() {
        /* PreRender events inject directly into the HTML, as opposed to the JS-based Render event which injects HTML
        into the panel */
        $this->onTempFormPrerender = $this->modx->invokeEvent('OnTempFormPrerender', [
            'id' => 0,
            'mode' => modSystemEvent::MODE_NEW,
        ]);
        if (is_array($this->onTempFormPrerender)) $this->onTempFormPrerender = implode('',$this->onTempFormPrerender);
        $this->setPlaceholder('onTempFormPrerender', $this->onTempFormPrerender);
    }

    /**
     * Invoke OnTempFormRender event
     * @return string
     */
    public function fireRenderEvent() {
        $this->onTempFormRender = $this->modx->invokeEvent('OnTempFormRender', [
            'id' => 0,
            'mode' => modSystemEvent::MODE_NEW,
        ]);
        if (is_array($this->onTempFormRender)) $this->onTempFormRender = implode('',$this->onTempFormRender);
        $this->onTempFormRender = str_replace(['"',"\n","\r"], ['\"','',''],$this->onTempFormRender);
        return $this->onTempFormRender;
    }

    /**
     * Return the pagetitle
     *
     * @return string
     */
    public function getPageTitle() {
        return $this->modx->lexicon('template_new');
    }

    /**
     * Return the location of the template file
     * @return string
     */
    public function getTemplateFile() {
        return 'element/template/create.tpl';
    }

    /**
     * Specify the language topics to load
     * @return array
     */
    public function getLanguageTopics() {
        return ['template','category','propertyset','element','tv'];
    }

    /**
     * Get the Help URL
     * @return string
     */
    public function getHelpUrl() {
        return 'Templates';
    }
}
