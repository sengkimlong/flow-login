<?php class FluidCache_SKL_Post_User_action_register_5305c07033abe37208aa173502a5f977165097bf extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'Default.html';
}
public function hasLayout() {
return TRUE;
}

/**
 * section Title
 */
public function section_768e0c1c69573fb588f61f1308a015c11468e05f(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'Welcome to MyBlog';
}
/**
 * section Navigation
 */
public function section_cf03cf2e9cdf95a20af09137dfb9071db0c31bf2(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return NULL;
}
/**
 * section Sidebar
 */
public function section_f5171c931c5c70d4dc3557fd20c356b636c92e04(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return NULL;
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '
    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments1 = array();
$arguments1['name'] = 'Title';
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return 'Welcome to MyBlog';
};

$output0 .= '';

$output0 .= '

    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments3 = array();
$arguments3['additionalAttributes'] = NULL;
$arguments3['data'] = NULL;
$arguments3['as'] = NULL;
$arguments3['severity'] = NULL;
$arguments3['class'] = NULL;
$arguments3['dir'] = NULL;
$arguments3['id'] = NULL;
$arguments3['lang'] = NULL;
$arguments3['style'] = NULL;
$arguments3['title'] = NULL;
$arguments3['accesskey'] = NULL;
$arguments3['tabindex'] = NULL;
$arguments3['onclick'] = NULL;
$renderChildrenClosure4 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper5 = $self->getViewHelper('$viewHelper5', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper5->setArguments($arguments3);
$viewHelper5->setRenderingContext($renderingContext);
$viewHelper5->setRenderChildrenClosure($renderChildrenClosure4);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output0 .= $viewHelper5->initializeArgumentsAndRender();

$output0 .= '

    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments6 = array();
$arguments6['action'] = 'create';
$arguments6['controller'] = 'Login';
$arguments6['method'] = 'post';
$arguments6['name'] = 'loginform';
$arguments6['additionalAttributes'] = NULL;
$arguments6['data'] = NULL;
$arguments6['arguments'] = array (
);
$arguments6['package'] = NULL;
$arguments6['subpackage'] = NULL;
$arguments6['object'] = NULL;
$arguments6['section'] = '';
$arguments6['format'] = '';
$arguments6['additionalParams'] = array (
);
$arguments6['absolute'] = false;
$arguments6['addQueryString'] = false;
$arguments6['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments6['fieldNamePrefix'] = NULL;
$arguments6['actionUri'] = NULL;
$arguments6['objectName'] = NULL;
$arguments6['useParentRequest'] = false;
$arguments6['enctype'] = NULL;
$arguments6['onreset'] = NULL;
$arguments6['onsubmit'] = NULL;
$arguments6['class'] = NULL;
$arguments6['dir'] = NULL;
$arguments6['id'] = NULL;
$arguments6['lang'] = NULL;
$arguments6['style'] = NULL;
$arguments6['title'] = NULL;
$arguments6['accesskey'] = NULL;
$arguments6['tabindex'] = NULL;
$arguments6['onclick'] = NULL;
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
$output8 = '';

$output8 .= '
        <div class="col-md-7 center">
            <table class="table">
                <tr>
                    <td><label for="name">User: </label></td>
                    <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments9 = array();
$arguments9['class'] = 'form-control';
$arguments9['name'] = 'name';
$arguments9['id'] = 'name';
$arguments9['additionalAttributes'] = NULL;
$arguments9['data'] = NULL;
$arguments9['required'] = false;
$arguments9['type'] = 'text';
$arguments9['value'] = NULL;
$arguments9['property'] = NULL;
$arguments9['disabled'] = NULL;
$arguments9['maxlength'] = NULL;
$arguments9['readonly'] = NULL;
$arguments9['size'] = NULL;
$arguments9['placeholder'] = NULL;
$arguments9['autofocus'] = NULL;
$arguments9['errorClass'] = 'f3-form-error';
$arguments9['dir'] = NULL;
$arguments9['lang'] = NULL;
$arguments9['style'] = NULL;
$arguments9['title'] = NULL;
$arguments9['accesskey'] = NULL;
$arguments9['tabindex'] = NULL;
$arguments9['onclick'] = NULL;
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper11 = $self->getViewHelper('$viewHelper11', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper11->setArguments($arguments9);
$viewHelper11->setRenderingContext($renderingContext);
$viewHelper11->setRenderChildrenClosure($renderChildrenClosure10);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output8 .= $viewHelper11->initializeArgumentsAndRender();

$output8 .= '</td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments12 = array();
$arguments12['class'] = 'form-control';
$arguments12['name'] = 'pass';
$arguments12['id'] = 'password';
$arguments12['additionalAttributes'] = NULL;
$arguments12['data'] = NULL;
$arguments12['value'] = NULL;
$arguments12['property'] = NULL;
$arguments12['disabled'] = NULL;
$arguments12['maxlength'] = NULL;
$arguments12['readonly'] = NULL;
$arguments12['size'] = NULL;
$arguments12['placeholder'] = NULL;
$arguments12['errorClass'] = 'f3-form-error';
$arguments12['dir'] = NULL;
$arguments12['lang'] = NULL;
$arguments12['style'] = NULL;
$arguments12['title'] = NULL;
$arguments12['accesskey'] = NULL;
$arguments12['tabindex'] = NULL;
$arguments12['onclick'] = NULL;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper14 = $self->getViewHelper('$viewHelper14', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper14->setArguments($arguments12);
$viewHelper14->setRenderingContext($renderingContext);
$viewHelper14->setRenderChildrenClosure($renderChildrenClosure13);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output8 .= $viewHelper14->initializeArgumentsAndRender();

$output8 .= '</td>
                </tr>
                <tr>
                    <td><label for="confirmPass">Confirm Password: </label></td>
                    <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments15 = array();
$arguments15['class'] = 'form-control';
$arguments15['name'] = 'pass2';
$arguments15['id'] = 'confirmPass';
$arguments15['additionalAttributes'] = NULL;
$arguments15['data'] = NULL;
$arguments15['value'] = NULL;
$arguments15['property'] = NULL;
$arguments15['disabled'] = NULL;
$arguments15['maxlength'] = NULL;
$arguments15['readonly'] = NULL;
$arguments15['size'] = NULL;
$arguments15['placeholder'] = NULL;
$arguments15['errorClass'] = 'f3-form-error';
$arguments15['dir'] = NULL;
$arguments15['lang'] = NULL;
$arguments15['style'] = NULL;
$arguments15['title'] = NULL;
$arguments15['accesskey'] = NULL;
$arguments15['tabindex'] = NULL;
$arguments15['onclick'] = NULL;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper17 = $self->getViewHelper('$viewHelper17', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper17->setArguments($arguments15);
$viewHelper17->setRenderingContext($renderingContext);
$viewHelper17->setRenderChildrenClosure($renderChildrenClosure16);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output8 .= $viewHelper17->initializeArgumentsAndRender();

$output8 .= '</td>
                </tr>
                <tr>
                    <td>
                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper
$arguments18 = array();
$arguments18['name'] = 'role';
$arguments18['value'] = 'SKL.Post:Visitor';
$arguments18['additionalAttributes'] = NULL;
$arguments18['data'] = NULL;
$arguments18['checked'] = NULL;
$arguments18['multiple'] = NULL;
$arguments18['property'] = NULL;
$arguments18['disabled'] = NULL;
$arguments18['errorClass'] = 'f3-form-error';
$arguments18['class'] = NULL;
$arguments18['dir'] = NULL;
$arguments18['id'] = NULL;
$arguments18['lang'] = NULL;
$arguments18['style'] = NULL;
$arguments18['title'] = NULL;
$arguments18['accesskey'] = NULL;
$arguments18['tabindex'] = NULL;
$arguments18['onclick'] = NULL;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper20 = $self->getViewHelper('$viewHelper20', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper');
$viewHelper20->setArguments($arguments18);
$viewHelper20->setRenderingContext($renderingContext);
$viewHelper20->setRenderChildrenClosure($renderChildrenClosure19);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper

$output8 .= $viewHelper20->initializeArgumentsAndRender();

$output8 .= ' Visitor
                    </td>
                    <td>
                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper
$arguments21 = array();
$arguments21['name'] = 'role';
$arguments21['value'] = 'SKL.Post:Admin';
$arguments21['additionalAttributes'] = NULL;
$arguments21['data'] = NULL;
$arguments21['checked'] = NULL;
$arguments21['multiple'] = NULL;
$arguments21['property'] = NULL;
$arguments21['disabled'] = NULL;
$arguments21['errorClass'] = 'f3-form-error';
$arguments21['class'] = NULL;
$arguments21['dir'] = NULL;
$arguments21['id'] = NULL;
$arguments21['lang'] = NULL;
$arguments21['style'] = NULL;
$arguments21['title'] = NULL;
$arguments21['accesskey'] = NULL;
$arguments21['tabindex'] = NULL;
$arguments21['onclick'] = NULL;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper');
$viewHelper23->setArguments($arguments21);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure22);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper

$output8 .= $viewHelper23->initializeArgumentsAndRender();

$output8 .= ' Administrator
                    </td>
                </tr>
                <tr>
                    <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments24 = array();
$arguments24['value'] = 'Register';
$arguments24['additionalAttributes'] = NULL;
$arguments24['data'] = NULL;
$arguments24['name'] = NULL;
$arguments24['property'] = NULL;
$arguments24['disabled'] = NULL;
$arguments24['class'] = NULL;
$arguments24['dir'] = NULL;
$arguments24['id'] = NULL;
$arguments24['lang'] = NULL;
$arguments24['style'] = NULL;
$arguments24['title'] = NULL;
$arguments24['accesskey'] = NULL;
$arguments24['tabindex'] = NULL;
$arguments24['onclick'] = NULL;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper26 = $self->getViewHelper('$viewHelper26', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper26->setArguments($arguments24);
$viewHelper26->setRenderingContext($renderingContext);
$viewHelper26->setRenderChildrenClosure($renderChildrenClosure25);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output8 .= $viewHelper26->initializeArgumentsAndRender();

$output8 .= '</td>
                    <td></td>
                </tr>
            </table>
        </div>
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments27 = array();
$arguments27['action'] = 'index';
$arguments27['additionalAttributes'] = NULL;
$arguments27['data'] = NULL;
$arguments27['arguments'] = array (
);
$arguments27['controller'] = NULL;
$arguments27['package'] = NULL;
$arguments27['subpackage'] = NULL;
$arguments27['section'] = '';
$arguments27['format'] = '';
$arguments27['additionalParams'] = array (
);
$arguments27['addQueryString'] = false;
$arguments27['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments27['useParentRequest'] = false;
$arguments27['absolute'] = true;
$arguments27['class'] = NULL;
$arguments27['dir'] = NULL;
$arguments27['id'] = NULL;
$arguments27['lang'] = NULL;
$arguments27['style'] = NULL;
$arguments27['title'] = NULL;
$arguments27['accesskey'] = NULL;
$arguments27['tabindex'] = NULL;
$arguments27['onclick'] = NULL;
$arguments27['name'] = NULL;
$arguments27['rel'] = NULL;
$arguments27['rev'] = NULL;
$arguments27['target'] = NULL;
$renderChildrenClosure28 = function() use ($renderingContext, $self) {
return 'Login here';
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper29->setArguments($arguments27);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output8 .= $viewHelper29->initializeArgumentsAndRender();

$output8 .= '
    ';
return $output8;
};
$viewHelper30 = $self->getViewHelper('$viewHelper30', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper30->setArguments($arguments6);
$viewHelper30->setRenderingContext($renderingContext);
$viewHelper30->setRenderChildrenClosure($renderChildrenClosure7);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper30->initializeArgumentsAndRender();

$output0 .= '

';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output31 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments32 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments33 = array();
$arguments33['name'] = 'Default.html';
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper35 = $self->getViewHelper('$viewHelper35', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper35->setArguments($arguments33);
$viewHelper35->setRenderingContext($renderingContext);
$viewHelper35->setRenderChildrenClosure($renderChildrenClosure34);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments32['value'] = $viewHelper35->initializeArgumentsAndRender();
$arguments32['keepQuotes'] = false;
$arguments32['encoding'] = 'UTF-8';
$arguments32['doubleEncode'] = true;
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
return NULL;
};
$value37 = ($arguments32['value'] !== NULL ? $arguments32['value'] : $renderChildrenClosure36());

$output31 .= !is_string($value37) && !(is_object($value37) && method_exists($value37, '__toString')) ? $value37 : htmlspecialchars($value37, ($arguments32['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments32['encoding'], $arguments32['doubleEncode']);

$output31 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments38 = array();
$arguments38['name'] = 'Title';
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};

$output31 .= '';

$output31 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments40 = array();
$arguments40['name'] = 'Navigation';
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
return NULL;
};

$output31 .= '';

$output31 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments42 = array();
$arguments42['name'] = 'Sidebar';
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};

$output31 .= '';

$output31 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments44 = array();
$arguments44['name'] = 'Content';
$renderChildrenClosure45 = function() use ($renderingContext, $self) {
$output46 = '';

$output46 .= '
    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments47 = array();
$arguments47['name'] = 'Title';
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return 'Welcome to MyBlog';
};

$output46 .= '';

$output46 .= '

    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments49 = array();
$arguments49['additionalAttributes'] = NULL;
$arguments49['data'] = NULL;
$arguments49['as'] = NULL;
$arguments49['severity'] = NULL;
$arguments49['class'] = NULL;
$arguments49['dir'] = NULL;
$arguments49['id'] = NULL;
$arguments49['lang'] = NULL;
$arguments49['style'] = NULL;
$arguments49['title'] = NULL;
$arguments49['accesskey'] = NULL;
$arguments49['tabindex'] = NULL;
$arguments49['onclick'] = NULL;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper51->setArguments($arguments49);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output46 .= $viewHelper51->initializeArgumentsAndRender();

$output46 .= '

    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments52 = array();
$arguments52['action'] = 'create';
$arguments52['controller'] = 'Login';
$arguments52['method'] = 'post';
$arguments52['name'] = 'loginform';
$arguments52['additionalAttributes'] = NULL;
$arguments52['data'] = NULL;
$arguments52['arguments'] = array (
);
$arguments52['package'] = NULL;
$arguments52['subpackage'] = NULL;
$arguments52['object'] = NULL;
$arguments52['section'] = '';
$arguments52['format'] = '';
$arguments52['additionalParams'] = array (
);
$arguments52['absolute'] = false;
$arguments52['addQueryString'] = false;
$arguments52['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments52['fieldNamePrefix'] = NULL;
$arguments52['actionUri'] = NULL;
$arguments52['objectName'] = NULL;
$arguments52['useParentRequest'] = false;
$arguments52['enctype'] = NULL;
$arguments52['onreset'] = NULL;
$arguments52['onsubmit'] = NULL;
$arguments52['class'] = NULL;
$arguments52['dir'] = NULL;
$arguments52['id'] = NULL;
$arguments52['lang'] = NULL;
$arguments52['style'] = NULL;
$arguments52['title'] = NULL;
$arguments52['accesskey'] = NULL;
$arguments52['tabindex'] = NULL;
$arguments52['onclick'] = NULL;
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
$output54 = '';

$output54 .= '
        <div class="col-md-7 center">
            <table class="table">
                <tr>
                    <td><label for="name">User: </label></td>
                    <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments55 = array();
$arguments55['class'] = 'form-control';
$arguments55['name'] = 'name';
$arguments55['id'] = 'name';
$arguments55['additionalAttributes'] = NULL;
$arguments55['data'] = NULL;
$arguments55['required'] = false;
$arguments55['type'] = 'text';
$arguments55['value'] = NULL;
$arguments55['property'] = NULL;
$arguments55['disabled'] = NULL;
$arguments55['maxlength'] = NULL;
$arguments55['readonly'] = NULL;
$arguments55['size'] = NULL;
$arguments55['placeholder'] = NULL;
$arguments55['autofocus'] = NULL;
$arguments55['errorClass'] = 'f3-form-error';
$arguments55['dir'] = NULL;
$arguments55['lang'] = NULL;
$arguments55['style'] = NULL;
$arguments55['title'] = NULL;
$arguments55['accesskey'] = NULL;
$arguments55['tabindex'] = NULL;
$arguments55['onclick'] = NULL;
$renderChildrenClosure56 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper57 = $self->getViewHelper('$viewHelper57', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper57->setArguments($arguments55);
$viewHelper57->setRenderingContext($renderingContext);
$viewHelper57->setRenderChildrenClosure($renderChildrenClosure56);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output54 .= $viewHelper57->initializeArgumentsAndRender();

$output54 .= '</td>
                </tr>
                <tr>
                    <td><label for="password">Password: </label></td>
                    <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments58 = array();
$arguments58['class'] = 'form-control';
$arguments58['name'] = 'pass';
$arguments58['id'] = 'password';
$arguments58['additionalAttributes'] = NULL;
$arguments58['data'] = NULL;
$arguments58['value'] = NULL;
$arguments58['property'] = NULL;
$arguments58['disabled'] = NULL;
$arguments58['maxlength'] = NULL;
$arguments58['readonly'] = NULL;
$arguments58['size'] = NULL;
$arguments58['placeholder'] = NULL;
$arguments58['errorClass'] = 'f3-form-error';
$arguments58['dir'] = NULL;
$arguments58['lang'] = NULL;
$arguments58['style'] = NULL;
$arguments58['title'] = NULL;
$arguments58['accesskey'] = NULL;
$arguments58['tabindex'] = NULL;
$arguments58['onclick'] = NULL;
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper60 = $self->getViewHelper('$viewHelper60', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper60->setArguments($arguments58);
$viewHelper60->setRenderingContext($renderingContext);
$viewHelper60->setRenderChildrenClosure($renderChildrenClosure59);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output54 .= $viewHelper60->initializeArgumentsAndRender();

$output54 .= '</td>
                </tr>
                <tr>
                    <td><label for="confirmPass">Confirm Password: </label></td>
                    <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments61 = array();
$arguments61['class'] = 'form-control';
$arguments61['name'] = 'pass2';
$arguments61['id'] = 'confirmPass';
$arguments61['additionalAttributes'] = NULL;
$arguments61['data'] = NULL;
$arguments61['value'] = NULL;
$arguments61['property'] = NULL;
$arguments61['disabled'] = NULL;
$arguments61['maxlength'] = NULL;
$arguments61['readonly'] = NULL;
$arguments61['size'] = NULL;
$arguments61['placeholder'] = NULL;
$arguments61['errorClass'] = 'f3-form-error';
$arguments61['dir'] = NULL;
$arguments61['lang'] = NULL;
$arguments61['style'] = NULL;
$arguments61['title'] = NULL;
$arguments61['accesskey'] = NULL;
$arguments61['tabindex'] = NULL;
$arguments61['onclick'] = NULL;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper63 = $self->getViewHelper('$viewHelper63', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper63->setArguments($arguments61);
$viewHelper63->setRenderingContext($renderingContext);
$viewHelper63->setRenderChildrenClosure($renderChildrenClosure62);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output54 .= $viewHelper63->initializeArgumentsAndRender();

$output54 .= '</td>
                </tr>
                <tr>
                    <td>
                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper
$arguments64 = array();
$arguments64['name'] = 'role';
$arguments64['value'] = 'SKL.Post:Visitor';
$arguments64['additionalAttributes'] = NULL;
$arguments64['data'] = NULL;
$arguments64['checked'] = NULL;
$arguments64['multiple'] = NULL;
$arguments64['property'] = NULL;
$arguments64['disabled'] = NULL;
$arguments64['errorClass'] = 'f3-form-error';
$arguments64['class'] = NULL;
$arguments64['dir'] = NULL;
$arguments64['id'] = NULL;
$arguments64['lang'] = NULL;
$arguments64['style'] = NULL;
$arguments64['title'] = NULL;
$arguments64['accesskey'] = NULL;
$arguments64['tabindex'] = NULL;
$arguments64['onclick'] = NULL;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper66 = $self->getViewHelper('$viewHelper66', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper');
$viewHelper66->setArguments($arguments64);
$viewHelper66->setRenderingContext($renderingContext);
$viewHelper66->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper

$output54 .= $viewHelper66->initializeArgumentsAndRender();

$output54 .= ' Visitor
                    </td>
                    <td>
                        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper
$arguments67 = array();
$arguments67['name'] = 'role';
$arguments67['value'] = 'SKL.Post:Admin';
$arguments67['additionalAttributes'] = NULL;
$arguments67['data'] = NULL;
$arguments67['checked'] = NULL;
$arguments67['multiple'] = NULL;
$arguments67['property'] = NULL;
$arguments67['disabled'] = NULL;
$arguments67['errorClass'] = 'f3-form-error';
$arguments67['class'] = NULL;
$arguments67['dir'] = NULL;
$arguments67['id'] = NULL;
$arguments67['lang'] = NULL;
$arguments67['style'] = NULL;
$arguments67['title'] = NULL;
$arguments67['accesskey'] = NULL;
$arguments67['tabindex'] = NULL;
$arguments67['onclick'] = NULL;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper69 = $self->getViewHelper('$viewHelper69', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper');
$viewHelper69->setArguments($arguments67);
$viewHelper69->setRenderingContext($renderingContext);
$viewHelper69->setRenderChildrenClosure($renderChildrenClosure68);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\CheckboxViewHelper

$output54 .= $viewHelper69->initializeArgumentsAndRender();

$output54 .= ' Administrator
                    </td>
                </tr>
                <tr>
                    <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments70 = array();
$arguments70['value'] = 'Register';
$arguments70['additionalAttributes'] = NULL;
$arguments70['data'] = NULL;
$arguments70['name'] = NULL;
$arguments70['property'] = NULL;
$arguments70['disabled'] = NULL;
$arguments70['class'] = NULL;
$arguments70['dir'] = NULL;
$arguments70['id'] = NULL;
$arguments70['lang'] = NULL;
$arguments70['style'] = NULL;
$arguments70['title'] = NULL;
$arguments70['accesskey'] = NULL;
$arguments70['tabindex'] = NULL;
$arguments70['onclick'] = NULL;
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper72 = $self->getViewHelper('$viewHelper72', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper72->setArguments($arguments70);
$viewHelper72->setRenderingContext($renderingContext);
$viewHelper72->setRenderChildrenClosure($renderChildrenClosure71);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output54 .= $viewHelper72->initializeArgumentsAndRender();

$output54 .= '</td>
                    <td></td>
                </tr>
            </table>
        </div>
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments73 = array();
$arguments73['action'] = 'index';
$arguments73['additionalAttributes'] = NULL;
$arguments73['data'] = NULL;
$arguments73['arguments'] = array (
);
$arguments73['controller'] = NULL;
$arguments73['package'] = NULL;
$arguments73['subpackage'] = NULL;
$arguments73['section'] = '';
$arguments73['format'] = '';
$arguments73['additionalParams'] = array (
);
$arguments73['addQueryString'] = false;
$arguments73['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments73['useParentRequest'] = false;
$arguments73['absolute'] = true;
$arguments73['class'] = NULL;
$arguments73['dir'] = NULL;
$arguments73['id'] = NULL;
$arguments73['lang'] = NULL;
$arguments73['style'] = NULL;
$arguments73['title'] = NULL;
$arguments73['accesskey'] = NULL;
$arguments73['tabindex'] = NULL;
$arguments73['onclick'] = NULL;
$arguments73['name'] = NULL;
$arguments73['rel'] = NULL;
$arguments73['rev'] = NULL;
$arguments73['target'] = NULL;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return 'Login here';
};
$viewHelper75 = $self->getViewHelper('$viewHelper75', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper75->setArguments($arguments73);
$viewHelper75->setRenderingContext($renderingContext);
$viewHelper75->setRenderChildrenClosure($renderChildrenClosure74);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output54 .= $viewHelper75->initializeArgumentsAndRender();

$output54 .= '
    ';
return $output54;
};
$viewHelper76 = $self->getViewHelper('$viewHelper76', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper76->setArguments($arguments52);
$viewHelper76->setRenderingContext($renderingContext);
$viewHelper76->setRenderChildrenClosure($renderChildrenClosure53);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output46 .= $viewHelper76->initializeArgumentsAndRender();

$output46 .= '

';
return $output46;
};

$output31 .= '';

return $output31;
}


}
#0             29676     