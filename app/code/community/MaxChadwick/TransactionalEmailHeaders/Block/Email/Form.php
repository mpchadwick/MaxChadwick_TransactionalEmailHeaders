<?php

class MaxChadwick_TransactionalEmailHeaders_Block_Email_Form extends Mage_Adminhtml_Block_System_Email_Template_Edit_Form
{

	// Add additional fields to form
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $fieldset = $form->addFieldset('base_fieldset', array(
          'legend' => Mage::helper('adminhtml')->__('Template Information'),
          'class' => 'fieldset-wide'
      ));

      $templateId = $this->getEmailTemplate()->getId();
      if ($templateId) {
          $fieldset->addField('used_currently_for', 'label', array(
              'label' => Mage::helper('adminhtml')->__('Used Currently For'),
              'container_id' => 'used_currently_for',
              'after_element_html' =>
                  '<script type="text/javascript">' .
                  (!$this->getEmailTemplate()->getSystemConfigPathsWhereUsedCurrently()
                      ? '$(\'' . 'used_currently_for' . '\').hide(); ' : '') .
                  '</script>',
          ));
      }

      if (!$templateId) {
          $fieldset->addField('used_default_for', 'label', array(
              'label' => Mage::helper('adminhtml')->__('Used as Default For'),
              'container_id' => 'used_default_for',
              'after_element_html' =>
                  '<script type="text/javascript">' .
                  (!(bool)$this->getEmailTemplate()->getOrigTemplateCode()
                      ? '$(\'' . 'used_default_for' . '\').hide(); ' : '') .
                  '</script>',
          ));
      }

      $fieldset->addField('template_code', 'text', array(
          'name'=>'template_code',
          'label' => Mage::helper('adminhtml')->__('Template Name'),
          'required' => true

      ));

      $fieldset->addField('template_subject', 'text', array(
          'name'=>'template_subject',
          'label' => Mage::helper('adminhtml')->__('Template Subject'),
          'required' => true
      ));

      // Add Mailgun Campaign Field
      $fieldset->addField('template_mailgun_campaign', 'text', array(
          'name'=>'template_mailgun_campaign',
          'label' => Mage::helper('adminhtml')->__('Template Mailgun Campaign'),
          'required' => true
      ));

      $fieldset->addField('orig_template_variables', 'hidden', array(
          'name' => 'orig_template_variables',
      ));

      $fieldset->addField('variables', 'hidden', array(
          'name' => 'variables',
          'value' => Zend_Json::encode($this->getVariables())
      ));

      $fieldset->addField('template_variables', 'hidden', array(
          'name' => 'template_variables',
      ));

      $insertVariableButton = $this->getLayout()
          ->createBlock('adminhtml/widget_button', '', array(
              'type' => 'button',
              'label' => Mage::helper('adminhtml')->__('Insert Variable...'),
              'onclick' => 'templateControl.openVariableChooser();return false;'
          ));

      $fieldset->addField('insert_variable', 'note', array(
          'text' => $insertVariableButton->toHtml()
      ));

      $fieldset->addField('template_text', 'textarea', array(
          'name'=>'template_text',
          'label' => Mage::helper('adminhtml')->__('Template Content'),
          'title' => Mage::helper('adminhtml')->__('Template Content'),
          'required' => true,
          'style' => 'height:24em;',
      ));

      if (!$this->getEmailTemplate()->isPlain()) {
          $fieldset->addField('template_styles', 'textarea', array(
              'name'=>'template_styles',
              'label' => Mage::helper('adminhtml')->__('Template Styles'),
              'container_id' => 'field_template_styles'
          ));
      }

      if ($templateId) {
          $form->addValues($this->getEmailTemplate()->getData());
      }

      if ($values = Mage::getSingleton('adminhtml/session')->getData('email_template_form_data', true)) {
          $form->setValues($values);
      }

      $this->setForm($form);
      
  }
 }