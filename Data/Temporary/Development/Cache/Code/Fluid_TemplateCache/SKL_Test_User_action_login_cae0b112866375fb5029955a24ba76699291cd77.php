<?php class FluidCache_SKL_Test_User_action_login_cae0b112866375fb5029955a24ba76699291cd77 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'default';
}
public function hasLayout() {
return TRUE;
}

/**
 * section stylesheet
 */
public function section_220d19d1bc706bb369de96ef5d33b4398c5314ef(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return NULL;
}
/**
 * section Title
 */
public function section_768e0c1c69573fb588f61f1308a015c11468e05f(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'Login';
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '

<div class="container" id="loginForm">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments1 = array();
$arguments1['class'] = 'flashmessages';
$arguments1['style'] = 'list-style-type:none;color:red;';
$arguments1['additionalAttributes'] = NULL;
$arguments1['data'] = NULL;
$arguments1['as'] = NULL;
$arguments1['severity'] = NULL;
$arguments1['dir'] = NULL;
$arguments1['id'] = NULL;
$arguments1['lang'] = NULL;
$arguments1['title'] = NULL;
$arguments1['accesskey'] = NULL;
$arguments1['tabindex'] = NULL;
$arguments1['onclick'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper3 = $self->getViewHelper('$viewHelper3', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper3->setArguments($arguments1);
$viewHelper3->setRenderingContext($renderingContext);
$viewHelper3->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output0 .= $viewHelper3->initializeArgumentsAndRender();

$output0 .= '
      <div id="messageError" class="alert alert-danger" role="alert" style="display:none;"></div>

      ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments4 = array();
$arguments4['action'] = 'success';
$arguments4['object'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments4['objectName'] = 'loginUser';
$arguments4['additionalAttributes'] = NULL;
$arguments4['data'] = NULL;
$arguments4['arguments'] = array (
);
$arguments4['controller'] = NULL;
$arguments4['package'] = NULL;
$arguments4['subpackage'] = NULL;
$arguments4['section'] = '';
$arguments4['format'] = '';
$arguments4['additionalParams'] = array (
);
$arguments4['absolute'] = false;
$arguments4['addQueryString'] = false;
$arguments4['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments4['fieldNamePrefix'] = NULL;
$arguments4['actionUri'] = NULL;
$arguments4['useParentRequest'] = false;
$arguments4['enctype'] = NULL;
$arguments4['method'] = NULL;
$arguments4['name'] = NULL;
$arguments4['onreset'] = NULL;
$arguments4['onsubmit'] = NULL;
$arguments4['class'] = NULL;
$arguments4['dir'] = NULL;
$arguments4['id'] = NULL;
$arguments4['lang'] = NULL;
$arguments4['style'] = NULL;
$arguments4['title'] = NULL;
$arguments4['accesskey'] = NULL;
$arguments4['tabindex'] = NULL;
$arguments4['onclick'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
        <table class="table">
          <tr>
            <td><label for="name">Name: </label></td>
            <td>
              <div class="input-group">
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments7 = array();
$arguments7['property'] = 'name';
$arguments7['id'] = 'name';
$arguments7['class'] = 'form-control';
$arguments7['additionalAttributes'] = NULL;
$arguments7['data'] = NULL;
$arguments7['required'] = false;
$arguments7['type'] = 'text';
$arguments7['name'] = NULL;
$arguments7['value'] = NULL;
$arguments7['disabled'] = NULL;
$arguments7['maxlength'] = NULL;
$arguments7['readonly'] = NULL;
$arguments7['size'] = NULL;
$arguments7['placeholder'] = NULL;
$arguments7['autofocus'] = NULL;
$arguments7['errorClass'] = 'f3-form-error';
$arguments7['dir'] = NULL;
$arguments7['lang'] = NULL;
$arguments7['style'] = NULL;
$arguments7['title'] = NULL;
$arguments7['accesskey'] = NULL;
$arguments7['tabindex'] = NULL;
$arguments7['onclick'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper9->setArguments($arguments7);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output6 .= $viewHelper9->initializeArgumentsAndRender();

$output6 .= '
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </td>
          </tr>
          <tr>
            <td><label for="password">Password: </label></td>
            <td>
              <div class="input-group">
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments10 = array();
$arguments10['property'] = 'password';
$arguments10['id'] = 'password';
$arguments10['type'] = 'password';
$arguments10['class'] = 'form-control';
$arguments10['additionalAttributes'] = NULL;
$arguments10['data'] = NULL;
$arguments10['required'] = false;
$arguments10['name'] = NULL;
$arguments10['value'] = NULL;
$arguments10['disabled'] = NULL;
$arguments10['maxlength'] = NULL;
$arguments10['readonly'] = NULL;
$arguments10['size'] = NULL;
$arguments10['placeholder'] = NULL;
$arguments10['autofocus'] = NULL;
$arguments10['errorClass'] = 'f3-form-error';
$arguments10['dir'] = NULL;
$arguments10['lang'] = NULL;
$arguments10['style'] = NULL;
$arguments10['title'] = NULL;
$arguments10['accesskey'] = NULL;
$arguments10['tabindex'] = NULL;
$arguments10['onclick'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper12->setArguments($arguments10);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output6 .= $viewHelper12->initializeArgumentsAndRender();

$output6 .= '
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments13 = array();
$arguments13['value'] = 'Login';
$arguments13['class'] = 'btn btn-primary';
$arguments13['id'] = 'loginButton';
$arguments13['additionalAttributes'] = NULL;
$arguments13['data'] = NULL;
$arguments13['name'] = NULL;
$arguments13['property'] = NULL;
$arguments13['disabled'] = NULL;
$arguments13['dir'] = NULL;
$arguments13['lang'] = NULL;
$arguments13['style'] = NULL;
$arguments13['title'] = NULL;
$arguments13['accesskey'] = NULL;
$arguments13['tabindex'] = NULL;
$arguments13['onclick'] = NULL;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output6 .= $viewHelper15->initializeArgumentsAndRender();

$output6 .= '
              ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments16 = array();
$arguments16['action'] = 'index';
$arguments16['class'] = 'btn btn-primary';
$arguments16['additionalAttributes'] = NULL;
$arguments16['data'] = NULL;
$arguments16['arguments'] = array (
);
$arguments16['controller'] = NULL;
$arguments16['package'] = NULL;
$arguments16['subpackage'] = NULL;
$arguments16['section'] = '';
$arguments16['format'] = '';
$arguments16['additionalParams'] = array (
);
$arguments16['addQueryString'] = false;
$arguments16['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments16['useParentRequest'] = false;
$arguments16['absolute'] = true;
$arguments16['dir'] = NULL;
$arguments16['id'] = NULL;
$arguments16['lang'] = NULL;
$arguments16['style'] = NULL;
$arguments16['title'] = NULL;
$arguments16['accesskey'] = NULL;
$arguments16['tabindex'] = NULL;
$arguments16['onclick'] = NULL;
$arguments16['name'] = NULL;
$arguments16['rel'] = NULL;
$arguments16['rev'] = NULL;
$arguments16['target'] = NULL;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper18 = $self->getViewHelper('$viewHelper18', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper18->setArguments($arguments16);
$viewHelper18->setRenderingContext($renderingContext);
$viewHelper18->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output6 .= $viewHelper18->initializeArgumentsAndRender();

$output6 .= '
            </td>
          </tr>
          <tr>
            <td colspan="2"><p>*Please fill in your information to login</p></td>
          </tr>

        </table>

      ';
return $output6;
};
$viewHelper19 = $self->getViewHelper('$viewHelper19', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper19->setArguments($arguments4);
$viewHelper19->setRenderingContext($renderingContext);
$viewHelper19->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper19->initializeArgumentsAndRender();

$output0 .= '


    </div>
  </div> <!-- End ROW -->
</div> <!-- End CONTAINER -->

';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output20 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments21 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments22 = array();
$arguments22['name'] = 'default';
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper24 = $self->getViewHelper('$viewHelper24', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper24->setArguments($arguments22);
$viewHelper24->setRenderingContext($renderingContext);
$viewHelper24->setRenderChildrenClosure($renderChildrenClosure23);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments21['value'] = $viewHelper24->initializeArgumentsAndRender();
$arguments21['keepQuotes'] = false;
$arguments21['encoding'] = 'UTF-8';
$arguments21['doubleEncode'] = true;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
return NULL;
};
$value26 = ($arguments21['value'] !== NULL ? $arguments21['value'] : $renderChildrenClosure25());

$output20 .= !is_string($value26) && !(is_object($value26) && method_exists($value26, '__toString')) ? $value26 : htmlspecialchars($value26, ($arguments21['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments21['encoding'], $arguments21['doubleEncode']);

$output20 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments27 = array();
$arguments27['name'] = 'stylesheet';
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
return NULL;
};

$output20 .= '';

$output20 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments29 = array();
$arguments29['name'] = 'Title';
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
return 'Login';
};

$output20 .= '';

$output20 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments31 = array();
$arguments31['name'] = 'Content';
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
$output33 = '';

$output33 .= '

<div class="container" id="loginForm">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments34 = array();
$arguments34['class'] = 'flashmessages';
$arguments34['style'] = 'list-style-type:none;color:red;';
$arguments34['additionalAttributes'] = NULL;
$arguments34['data'] = NULL;
$arguments34['as'] = NULL;
$arguments34['severity'] = NULL;
$arguments34['dir'] = NULL;
$arguments34['id'] = NULL;
$arguments34['lang'] = NULL;
$arguments34['title'] = NULL;
$arguments34['accesskey'] = NULL;
$arguments34['tabindex'] = NULL;
$arguments34['onclick'] = NULL;
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper36 = $self->getViewHelper('$viewHelper36', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper36->setArguments($arguments34);
$viewHelper36->setRenderingContext($renderingContext);
$viewHelper36->setRenderChildrenClosure($renderChildrenClosure35);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output33 .= $viewHelper36->initializeArgumentsAndRender();

$output33 .= '
      <div id="messageError" class="alert alert-danger" role="alert" style="display:none;"></div>

      ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments37 = array();
$arguments37['action'] = 'success';
$arguments37['object'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments37['objectName'] = 'loginUser';
$arguments37['additionalAttributes'] = NULL;
$arguments37['data'] = NULL;
$arguments37['arguments'] = array (
);
$arguments37['controller'] = NULL;
$arguments37['package'] = NULL;
$arguments37['subpackage'] = NULL;
$arguments37['section'] = '';
$arguments37['format'] = '';
$arguments37['additionalParams'] = array (
);
$arguments37['absolute'] = false;
$arguments37['addQueryString'] = false;
$arguments37['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments37['fieldNamePrefix'] = NULL;
$arguments37['actionUri'] = NULL;
$arguments37['useParentRequest'] = false;
$arguments37['enctype'] = NULL;
$arguments37['method'] = NULL;
$arguments37['name'] = NULL;
$arguments37['onreset'] = NULL;
$arguments37['onsubmit'] = NULL;
$arguments37['class'] = NULL;
$arguments37['dir'] = NULL;
$arguments37['id'] = NULL;
$arguments37['lang'] = NULL;
$arguments37['style'] = NULL;
$arguments37['title'] = NULL;
$arguments37['accesskey'] = NULL;
$arguments37['tabindex'] = NULL;
$arguments37['onclick'] = NULL;
$renderChildrenClosure38 = function() use ($renderingContext, $self) {
$output39 = '';

$output39 .= '
        <table class="table">
          <tr>
            <td><label for="name">Name: </label></td>
            <td>
              <div class="input-group">
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments40 = array();
$arguments40['property'] = 'name';
$arguments40['id'] = 'name';
$arguments40['class'] = 'form-control';
$arguments40['additionalAttributes'] = NULL;
$arguments40['data'] = NULL;
$arguments40['required'] = false;
$arguments40['type'] = 'text';
$arguments40['name'] = NULL;
$arguments40['value'] = NULL;
$arguments40['disabled'] = NULL;
$arguments40['maxlength'] = NULL;
$arguments40['readonly'] = NULL;
$arguments40['size'] = NULL;
$arguments40['placeholder'] = NULL;
$arguments40['autofocus'] = NULL;
$arguments40['errorClass'] = 'f3-form-error';
$arguments40['dir'] = NULL;
$arguments40['lang'] = NULL;
$arguments40['style'] = NULL;
$arguments40['title'] = NULL;
$arguments40['accesskey'] = NULL;
$arguments40['tabindex'] = NULL;
$arguments40['onclick'] = NULL;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper42->setArguments($arguments40);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure41);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output39 .= $viewHelper42->initializeArgumentsAndRender();

$output39 .= '
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
              </div>
            </td>
          </tr>
          <tr>
            <td><label for="password">Password: </label></td>
            <td>
              <div class="input-group">
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments43 = array();
$arguments43['property'] = 'password';
$arguments43['id'] = 'password';
$arguments43['type'] = 'password';
$arguments43['class'] = 'form-control';
$arguments43['additionalAttributes'] = NULL;
$arguments43['data'] = NULL;
$arguments43['required'] = false;
$arguments43['name'] = NULL;
$arguments43['value'] = NULL;
$arguments43['disabled'] = NULL;
$arguments43['maxlength'] = NULL;
$arguments43['readonly'] = NULL;
$arguments43['size'] = NULL;
$arguments43['placeholder'] = NULL;
$arguments43['autofocus'] = NULL;
$arguments43['errorClass'] = 'f3-form-error';
$arguments43['dir'] = NULL;
$arguments43['lang'] = NULL;
$arguments43['style'] = NULL;
$arguments43['title'] = NULL;
$arguments43['accesskey'] = NULL;
$arguments43['tabindex'] = NULL;
$arguments43['onclick'] = NULL;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper45 = $self->getViewHelper('$viewHelper45', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper45->setArguments($arguments43);
$viewHelper45->setRenderingContext($renderingContext);
$viewHelper45->setRenderChildrenClosure($renderChildrenClosure44);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output39 .= $viewHelper45->initializeArgumentsAndRender();

$output39 .= '
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments46 = array();
$arguments46['value'] = 'Login';
$arguments46['class'] = 'btn btn-primary';
$arguments46['id'] = 'loginButton';
$arguments46['additionalAttributes'] = NULL;
$arguments46['data'] = NULL;
$arguments46['name'] = NULL;
$arguments46['property'] = NULL;
$arguments46['disabled'] = NULL;
$arguments46['dir'] = NULL;
$arguments46['lang'] = NULL;
$arguments46['style'] = NULL;
$arguments46['title'] = NULL;
$arguments46['accesskey'] = NULL;
$arguments46['tabindex'] = NULL;
$arguments46['onclick'] = NULL;
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper48 = $self->getViewHelper('$viewHelper48', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper48->setArguments($arguments46);
$viewHelper48->setRenderingContext($renderingContext);
$viewHelper48->setRenderChildrenClosure($renderChildrenClosure47);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output39 .= $viewHelper48->initializeArgumentsAndRender();

$output39 .= '
              ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments49 = array();
$arguments49['action'] = 'index';
$arguments49['class'] = 'btn btn-primary';
$arguments49['additionalAttributes'] = NULL;
$arguments49['data'] = NULL;
$arguments49['arguments'] = array (
);
$arguments49['controller'] = NULL;
$arguments49['package'] = NULL;
$arguments49['subpackage'] = NULL;
$arguments49['section'] = '';
$arguments49['format'] = '';
$arguments49['additionalParams'] = array (
);
$arguments49['addQueryString'] = false;
$arguments49['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments49['useParentRequest'] = false;
$arguments49['absolute'] = true;
$arguments49['dir'] = NULL;
$arguments49['id'] = NULL;
$arguments49['lang'] = NULL;
$arguments49['style'] = NULL;
$arguments49['title'] = NULL;
$arguments49['accesskey'] = NULL;
$arguments49['tabindex'] = NULL;
$arguments49['onclick'] = NULL;
$arguments49['name'] = NULL;
$arguments49['rel'] = NULL;
$arguments49['rev'] = NULL;
$arguments49['target'] = NULL;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper51->setArguments($arguments49);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output39 .= $viewHelper51->initializeArgumentsAndRender();

$output39 .= '
            </td>
          </tr>
          <tr>
            <td colspan="2"><p>*Please fill in your information to login</p></td>
          </tr>

        </table>

      ';
return $output39;
};
$viewHelper52 = $self->getViewHelper('$viewHelper52', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper52->setArguments($arguments37);
$viewHelper52->setRenderingContext($renderingContext);
$viewHelper52->setRenderChildrenClosure($renderChildrenClosure38);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output33 .= $viewHelper52->initializeArgumentsAndRender();

$output33 .= '


    </div>
  </div> <!-- End ROW -->
</div> <!-- End CONTAINER -->

';
return $output33;
};

$output20 .= '';

$output20 .= '
';

return $output20;
}


}
#0             22397     