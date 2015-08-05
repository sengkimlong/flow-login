<?php class FluidCache_SKL_Post_Login_action_index_3928fa6e8afd93bc71813966d58259be64ec7e4c extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

return NULL;
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
    <h1>Login</h1>

    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments1 = array();
$arguments1['additionalAttributes'] = NULL;
$arguments1['data'] = NULL;
$arguments1['as'] = NULL;
$arguments1['severity'] = NULL;
$arguments1['class'] = NULL;
$arguments1['dir'] = NULL;
$arguments1['id'] = NULL;
$arguments1['lang'] = NULL;
$arguments1['style'] = NULL;
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

    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper
$arguments4 = array();
$arguments4['role'] = 'Visitor';
$arguments4['then'] = NULL;
$arguments4['else'] = NULL;
$arguments4['packageKey'] = NULL;
$arguments4['account'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments7 = array();
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
$output9 = '';

$output9 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments10 = array();
$arguments10['action'] = 'logout';
$arguments10['controller'] = 'Login';
$arguments10['additionalAttributes'] = NULL;
$arguments10['data'] = NULL;
$arguments10['arguments'] = array (
);
$arguments10['package'] = NULL;
$arguments10['subpackage'] = NULL;
$arguments10['section'] = '';
$arguments10['format'] = '';
$arguments10['additionalParams'] = array (
);
$arguments10['addQueryString'] = false;
$arguments10['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments10['useParentRequest'] = false;
$arguments10['absolute'] = true;
$arguments10['class'] = NULL;
$arguments10['dir'] = NULL;
$arguments10['id'] = NULL;
$arguments10['lang'] = NULL;
$arguments10['style'] = NULL;
$arguments10['title'] = NULL;
$arguments10['accesskey'] = NULL;
$arguments10['tabindex'] = NULL;
$arguments10['onclick'] = NULL;
$arguments10['name'] = NULL;
$arguments10['rel'] = NULL;
$arguments10['rev'] = NULL;
$arguments10['target'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper12->setArguments($arguments10);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output9 .= $viewHelper12->initializeArgumentsAndRender();

$output9 .= '
        ';
return $output9;
};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper13->setArguments($arguments7);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output6 .= $viewHelper13->initializeArgumentsAndRender();

$output6 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments14 = array();
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
$output16 = '';

$output16 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments17 = array();
$arguments17['action'] = 'authenticate';
$arguments17['method'] = 'post';
$arguments17['name'] = 'loginform';
$arguments17['additionalAttributes'] = NULL;
$arguments17['data'] = NULL;
$arguments17['arguments'] = array (
);
$arguments17['controller'] = NULL;
$arguments17['package'] = NULL;
$arguments17['subpackage'] = NULL;
$arguments17['object'] = NULL;
$arguments17['section'] = '';
$arguments17['format'] = '';
$arguments17['additionalParams'] = array (
);
$arguments17['absolute'] = false;
$arguments17['addQueryString'] = false;
$arguments17['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments17['fieldNamePrefix'] = NULL;
$arguments17['actionUri'] = NULL;
$arguments17['objectName'] = NULL;
$arguments17['useParentRequest'] = false;
$arguments17['enctype'] = NULL;
$arguments17['onreset'] = NULL;
$arguments17['onsubmit'] = NULL;
$arguments17['class'] = NULL;
$arguments17['dir'] = NULL;
$arguments17['id'] = NULL;
$arguments17['lang'] = NULL;
$arguments17['style'] = NULL;
$arguments17['title'] = NULL;
$arguments17['accesskey'] = NULL;
$arguments17['tabindex'] = NULL;
$arguments17['onclick'] = NULL;
$renderChildrenClosure18 = function() use ($renderingContext, $self) {
$output19 = '';

$output19 .= '
                <div class="col-md-7 center">
                    <table class="table">
                        <tr>
                            <td>User: </td>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments20 = array();
$arguments20['class'] = 'form-control';
$arguments20['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]';
$arguments20['additionalAttributes'] = NULL;
$arguments20['data'] = NULL;
$arguments20['required'] = false;
$arguments20['type'] = 'text';
$arguments20['value'] = NULL;
$arguments20['property'] = NULL;
$arguments20['disabled'] = NULL;
$arguments20['maxlength'] = NULL;
$arguments20['readonly'] = NULL;
$arguments20['size'] = NULL;
$arguments20['placeholder'] = NULL;
$arguments20['autofocus'] = NULL;
$arguments20['errorClass'] = 'f3-form-error';
$arguments20['dir'] = NULL;
$arguments20['id'] = NULL;
$arguments20['lang'] = NULL;
$arguments20['style'] = NULL;
$arguments20['title'] = NULL;
$arguments20['accesskey'] = NULL;
$arguments20['tabindex'] = NULL;
$arguments20['onclick'] = NULL;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper22->setArguments($arguments20);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure21);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output19 .= $viewHelper22->initializeArgumentsAndRender();

$output19 .= '</td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments23 = array();
$arguments23['class'] = 'form-control';
$arguments23['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]';
$arguments23['additionalAttributes'] = NULL;
$arguments23['data'] = NULL;
$arguments23['value'] = NULL;
$arguments23['property'] = NULL;
$arguments23['disabled'] = NULL;
$arguments23['maxlength'] = NULL;
$arguments23['readonly'] = NULL;
$arguments23['size'] = NULL;
$arguments23['placeholder'] = NULL;
$arguments23['errorClass'] = 'f3-form-error';
$arguments23['dir'] = NULL;
$arguments23['id'] = NULL;
$arguments23['lang'] = NULL;
$arguments23['style'] = NULL;
$arguments23['title'] = NULL;
$arguments23['accesskey'] = NULL;
$arguments23['tabindex'] = NULL;
$arguments23['onclick'] = NULL;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper25 = $self->getViewHelper('$viewHelper25', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper25->setArguments($arguments23);
$viewHelper25->setRenderingContext($renderingContext);
$viewHelper25->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output19 .= $viewHelper25->initializeArgumentsAndRender();

$output19 .= '</td>
                        </tr>
                        <tr>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments26 = array();
$arguments26['value'] = 'Login';
$arguments26['additionalAttributes'] = NULL;
$arguments26['data'] = NULL;
$arguments26['name'] = NULL;
$arguments26['property'] = NULL;
$arguments26['disabled'] = NULL;
$arguments26['class'] = NULL;
$arguments26['dir'] = NULL;
$arguments26['id'] = NULL;
$arguments26['lang'] = NULL;
$arguments26['style'] = NULL;
$arguments26['title'] = NULL;
$arguments26['accesskey'] = NULL;
$arguments26['tabindex'] = NULL;
$arguments26['onclick'] = NULL;
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper28 = $self->getViewHelper('$viewHelper28', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper28->setArguments($arguments26);
$viewHelper28->setRenderingContext($renderingContext);
$viewHelper28->setRenderChildrenClosure($renderChildrenClosure27);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output19 .= $viewHelper28->initializeArgumentsAndRender();

$output19 .= '</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            ';
return $output19;
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper29->setArguments($arguments17);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output16 .= $viewHelper29->initializeArgumentsAndRender();

$output16 .= '
            <br />
            Not yet an account? ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments30 = array();
$arguments30['action'] = 'register';
$arguments30['controller'] = 'Login';
$arguments30['additionalAttributes'] = NULL;
$arguments30['data'] = NULL;
$arguments30['arguments'] = array (
);
$arguments30['package'] = NULL;
$arguments30['subpackage'] = NULL;
$arguments30['section'] = '';
$arguments30['format'] = '';
$arguments30['additionalParams'] = array (
);
$arguments30['addQueryString'] = false;
$arguments30['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments30['useParentRequest'] = false;
$arguments30['absolute'] = true;
$arguments30['class'] = NULL;
$arguments30['dir'] = NULL;
$arguments30['id'] = NULL;
$arguments30['lang'] = NULL;
$arguments30['style'] = NULL;
$arguments30['title'] = NULL;
$arguments30['accesskey'] = NULL;
$arguments30['tabindex'] = NULL;
$arguments30['onclick'] = NULL;
$arguments30['name'] = NULL;
$arguments30['rel'] = NULL;
$arguments30['rev'] = NULL;
$arguments30['target'] = NULL;
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
return 'Register here!!';
};
$viewHelper32 = $self->getViewHelper('$viewHelper32', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper32->setArguments($arguments30);
$viewHelper32->setRenderingContext($renderingContext);
$viewHelper32->setRenderChildrenClosure($renderChildrenClosure31);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output16 .= $viewHelper32->initializeArgumentsAndRender();

$output16 .= '
        ';
return $output16;
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper33->setArguments($arguments14);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output6 .= $viewHelper33->initializeArgumentsAndRender();

$output6 .= '
    ';
return $output6;
};
$arguments4['__thenClosure'] = function() use ($renderingContext, $self) {
$output34 = '';

$output34 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments35 = array();
$arguments35['action'] = 'logout';
$arguments35['controller'] = 'Login';
$arguments35['additionalAttributes'] = NULL;
$arguments35['data'] = NULL;
$arguments35['arguments'] = array (
);
$arguments35['package'] = NULL;
$arguments35['subpackage'] = NULL;
$arguments35['section'] = '';
$arguments35['format'] = '';
$arguments35['additionalParams'] = array (
);
$arguments35['addQueryString'] = false;
$arguments35['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments35['useParentRequest'] = false;
$arguments35['absolute'] = true;
$arguments35['class'] = NULL;
$arguments35['dir'] = NULL;
$arguments35['id'] = NULL;
$arguments35['lang'] = NULL;
$arguments35['style'] = NULL;
$arguments35['title'] = NULL;
$arguments35['accesskey'] = NULL;
$arguments35['tabindex'] = NULL;
$arguments35['onclick'] = NULL;
$arguments35['name'] = NULL;
$arguments35['rel'] = NULL;
$arguments35['rev'] = NULL;
$arguments35['target'] = NULL;
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper37 = $self->getViewHelper('$viewHelper37', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper37->setArguments($arguments35);
$viewHelper37->setRenderingContext($renderingContext);
$viewHelper37->setRenderChildrenClosure($renderChildrenClosure36);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output34 .= $viewHelper37->initializeArgumentsAndRender();

$output34 .= '
        ';
return $output34;
};
$arguments4['__elseClosure'] = function() use ($renderingContext, $self) {
$output38 = '';

$output38 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments39 = array();
$arguments39['action'] = 'authenticate';
$arguments39['method'] = 'post';
$arguments39['name'] = 'loginform';
$arguments39['additionalAttributes'] = NULL;
$arguments39['data'] = NULL;
$arguments39['arguments'] = array (
);
$arguments39['controller'] = NULL;
$arguments39['package'] = NULL;
$arguments39['subpackage'] = NULL;
$arguments39['object'] = NULL;
$arguments39['section'] = '';
$arguments39['format'] = '';
$arguments39['additionalParams'] = array (
);
$arguments39['absolute'] = false;
$arguments39['addQueryString'] = false;
$arguments39['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments39['fieldNamePrefix'] = NULL;
$arguments39['actionUri'] = NULL;
$arguments39['objectName'] = NULL;
$arguments39['useParentRequest'] = false;
$arguments39['enctype'] = NULL;
$arguments39['onreset'] = NULL;
$arguments39['onsubmit'] = NULL;
$arguments39['class'] = NULL;
$arguments39['dir'] = NULL;
$arguments39['id'] = NULL;
$arguments39['lang'] = NULL;
$arguments39['style'] = NULL;
$arguments39['title'] = NULL;
$arguments39['accesskey'] = NULL;
$arguments39['tabindex'] = NULL;
$arguments39['onclick'] = NULL;
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
$output41 = '';

$output41 .= '
                <div class="col-md-7 center">
                    <table class="table">
                        <tr>
                            <td>User: </td>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments42 = array();
$arguments42['class'] = 'form-control';
$arguments42['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]';
$arguments42['additionalAttributes'] = NULL;
$arguments42['data'] = NULL;
$arguments42['required'] = false;
$arguments42['type'] = 'text';
$arguments42['value'] = NULL;
$arguments42['property'] = NULL;
$arguments42['disabled'] = NULL;
$arguments42['maxlength'] = NULL;
$arguments42['readonly'] = NULL;
$arguments42['size'] = NULL;
$arguments42['placeholder'] = NULL;
$arguments42['autofocus'] = NULL;
$arguments42['errorClass'] = 'f3-form-error';
$arguments42['dir'] = NULL;
$arguments42['id'] = NULL;
$arguments42['lang'] = NULL;
$arguments42['style'] = NULL;
$arguments42['title'] = NULL;
$arguments42['accesskey'] = NULL;
$arguments42['tabindex'] = NULL;
$arguments42['onclick'] = NULL;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper44 = $self->getViewHelper('$viewHelper44', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper44->setArguments($arguments42);
$viewHelper44->setRenderingContext($renderingContext);
$viewHelper44->setRenderChildrenClosure($renderChildrenClosure43);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output41 .= $viewHelper44->initializeArgumentsAndRender();

$output41 .= '</td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments45 = array();
$arguments45['class'] = 'form-control';
$arguments45['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]';
$arguments45['additionalAttributes'] = NULL;
$arguments45['data'] = NULL;
$arguments45['value'] = NULL;
$arguments45['property'] = NULL;
$arguments45['disabled'] = NULL;
$arguments45['maxlength'] = NULL;
$arguments45['readonly'] = NULL;
$arguments45['size'] = NULL;
$arguments45['placeholder'] = NULL;
$arguments45['errorClass'] = 'f3-form-error';
$arguments45['dir'] = NULL;
$arguments45['id'] = NULL;
$arguments45['lang'] = NULL;
$arguments45['style'] = NULL;
$arguments45['title'] = NULL;
$arguments45['accesskey'] = NULL;
$arguments45['tabindex'] = NULL;
$arguments45['onclick'] = NULL;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper47 = $self->getViewHelper('$viewHelper47', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper47->setArguments($arguments45);
$viewHelper47->setRenderingContext($renderingContext);
$viewHelper47->setRenderChildrenClosure($renderChildrenClosure46);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output41 .= $viewHelper47->initializeArgumentsAndRender();

$output41 .= '</td>
                        </tr>
                        <tr>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments48 = array();
$arguments48['value'] = 'Login';
$arguments48['additionalAttributes'] = NULL;
$arguments48['data'] = NULL;
$arguments48['name'] = NULL;
$arguments48['property'] = NULL;
$arguments48['disabled'] = NULL;
$arguments48['class'] = NULL;
$arguments48['dir'] = NULL;
$arguments48['id'] = NULL;
$arguments48['lang'] = NULL;
$arguments48['style'] = NULL;
$arguments48['title'] = NULL;
$arguments48['accesskey'] = NULL;
$arguments48['tabindex'] = NULL;
$arguments48['onclick'] = NULL;
$renderChildrenClosure49 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper50 = $self->getViewHelper('$viewHelper50', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper50->setArguments($arguments48);
$viewHelper50->setRenderingContext($renderingContext);
$viewHelper50->setRenderChildrenClosure($renderChildrenClosure49);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output41 .= $viewHelper50->initializeArgumentsAndRender();

$output41 .= '</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            ';
return $output41;
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper51->setArguments($arguments39);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure40);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output38 .= $viewHelper51->initializeArgumentsAndRender();

$output38 .= '
            <br />
            Not yet an account? ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments52 = array();
$arguments52['action'] = 'register';
$arguments52['controller'] = 'Login';
$arguments52['additionalAttributes'] = NULL;
$arguments52['data'] = NULL;
$arguments52['arguments'] = array (
);
$arguments52['package'] = NULL;
$arguments52['subpackage'] = NULL;
$arguments52['section'] = '';
$arguments52['format'] = '';
$arguments52['additionalParams'] = array (
);
$arguments52['addQueryString'] = false;
$arguments52['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments52['useParentRequest'] = false;
$arguments52['absolute'] = true;
$arguments52['class'] = NULL;
$arguments52['dir'] = NULL;
$arguments52['id'] = NULL;
$arguments52['lang'] = NULL;
$arguments52['style'] = NULL;
$arguments52['title'] = NULL;
$arguments52['accesskey'] = NULL;
$arguments52['tabindex'] = NULL;
$arguments52['onclick'] = NULL;
$arguments52['name'] = NULL;
$arguments52['rel'] = NULL;
$arguments52['rev'] = NULL;
$arguments52['target'] = NULL;
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
return 'Register here!!';
};
$viewHelper54 = $self->getViewHelper('$viewHelper54', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper54->setArguments($arguments52);
$viewHelper54->setRenderingContext($renderingContext);
$viewHelper54->setRenderChildrenClosure($renderChildrenClosure53);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output38 .= $viewHelper54->initializeArgumentsAndRender();

$output38 .= '
        ';
return $output38;
};
$viewHelper55 = $self->getViewHelper('$viewHelper55', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper');
$viewHelper55->setArguments($arguments4);
$viewHelper55->setRenderingContext($renderingContext);
$viewHelper55->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper

$output0 .= $viewHelper55->initializeArgumentsAndRender();

$output0 .= '

';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output56 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments57 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments58 = array();
$arguments58['name'] = 'Default.html';
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper60 = $self->getViewHelper('$viewHelper60', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper60->setArguments($arguments58);
$viewHelper60->setRenderingContext($renderingContext);
$viewHelper60->setRenderChildrenClosure($renderChildrenClosure59);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments57['value'] = $viewHelper60->initializeArgumentsAndRender();
$arguments57['keepQuotes'] = false;
$arguments57['encoding'] = 'UTF-8';
$arguments57['doubleEncode'] = true;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};
$value62 = ($arguments57['value'] !== NULL ? $arguments57['value'] : $renderChildrenClosure61());

$output56 .= !is_string($value62) && !(is_object($value62) && method_exists($value62, '__toString')) ? $value62 : htmlspecialchars($value62, ($arguments57['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments57['encoding'], $arguments57['doubleEncode']);

$output56 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments63 = array();
$arguments63['name'] = 'Title';
$renderChildrenClosure64 = function() use ($renderingContext, $self) {
return NULL;
};

$output56 .= '';

$output56 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments65 = array();
$arguments65['name'] = 'Navigation';
$renderChildrenClosure66 = function() use ($renderingContext, $self) {
return NULL;
};

$output56 .= '';

$output56 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments67 = array();
$arguments67['name'] = 'Sidebar';
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};

$output56 .= '';

$output56 .= '


';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments69 = array();
$arguments69['name'] = 'Content';
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
$output71 = '';

$output71 .= '
    <h1>Login</h1>

    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments72 = array();
$arguments72['additionalAttributes'] = NULL;
$arguments72['data'] = NULL;
$arguments72['as'] = NULL;
$arguments72['severity'] = NULL;
$arguments72['class'] = NULL;
$arguments72['dir'] = NULL;
$arguments72['id'] = NULL;
$arguments72['lang'] = NULL;
$arguments72['style'] = NULL;
$arguments72['title'] = NULL;
$arguments72['accesskey'] = NULL;
$arguments72['tabindex'] = NULL;
$arguments72['onclick'] = NULL;
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper74 = $self->getViewHelper('$viewHelper74', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper74->setArguments($arguments72);
$viewHelper74->setRenderingContext($renderingContext);
$viewHelper74->setRenderChildrenClosure($renderChildrenClosure73);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output71 .= $viewHelper74->initializeArgumentsAndRender();

$output71 .= '

    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper
$arguments75 = array();
$arguments75['role'] = 'Visitor';
$arguments75['then'] = NULL;
$arguments75['else'] = NULL;
$arguments75['packageKey'] = NULL;
$arguments75['account'] = NULL;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
$output77 = '';

$output77 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments78 = array();
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
$output80 = '';

$output80 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments81 = array();
$arguments81['action'] = 'logout';
$arguments81['controller'] = 'Login';
$arguments81['additionalAttributes'] = NULL;
$arguments81['data'] = NULL;
$arguments81['arguments'] = array (
);
$arguments81['package'] = NULL;
$arguments81['subpackage'] = NULL;
$arguments81['section'] = '';
$arguments81['format'] = '';
$arguments81['additionalParams'] = array (
);
$arguments81['addQueryString'] = false;
$arguments81['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments81['useParentRequest'] = false;
$arguments81['absolute'] = true;
$arguments81['class'] = NULL;
$arguments81['dir'] = NULL;
$arguments81['id'] = NULL;
$arguments81['lang'] = NULL;
$arguments81['style'] = NULL;
$arguments81['title'] = NULL;
$arguments81['accesskey'] = NULL;
$arguments81['tabindex'] = NULL;
$arguments81['onclick'] = NULL;
$arguments81['name'] = NULL;
$arguments81['rel'] = NULL;
$arguments81['rev'] = NULL;
$arguments81['target'] = NULL;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper83 = $self->getViewHelper('$viewHelper83', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper83->setArguments($arguments81);
$viewHelper83->setRenderingContext($renderingContext);
$viewHelper83->setRenderChildrenClosure($renderChildrenClosure82);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output80 .= $viewHelper83->initializeArgumentsAndRender();

$output80 .= '
        ';
return $output80;
};
$viewHelper84 = $self->getViewHelper('$viewHelper84', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper84->setArguments($arguments78);
$viewHelper84->setRenderingContext($renderingContext);
$viewHelper84->setRenderChildrenClosure($renderChildrenClosure79);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output77 .= $viewHelper84->initializeArgumentsAndRender();

$output77 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments85 = array();
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
$output87 = '';

$output87 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments88 = array();
$arguments88['action'] = 'authenticate';
$arguments88['method'] = 'post';
$arguments88['name'] = 'loginform';
$arguments88['additionalAttributes'] = NULL;
$arguments88['data'] = NULL;
$arguments88['arguments'] = array (
);
$arguments88['controller'] = NULL;
$arguments88['package'] = NULL;
$arguments88['subpackage'] = NULL;
$arguments88['object'] = NULL;
$arguments88['section'] = '';
$arguments88['format'] = '';
$arguments88['additionalParams'] = array (
);
$arguments88['absolute'] = false;
$arguments88['addQueryString'] = false;
$arguments88['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments88['fieldNamePrefix'] = NULL;
$arguments88['actionUri'] = NULL;
$arguments88['objectName'] = NULL;
$arguments88['useParentRequest'] = false;
$arguments88['enctype'] = NULL;
$arguments88['onreset'] = NULL;
$arguments88['onsubmit'] = NULL;
$arguments88['class'] = NULL;
$arguments88['dir'] = NULL;
$arguments88['id'] = NULL;
$arguments88['lang'] = NULL;
$arguments88['style'] = NULL;
$arguments88['title'] = NULL;
$arguments88['accesskey'] = NULL;
$arguments88['tabindex'] = NULL;
$arguments88['onclick'] = NULL;
$renderChildrenClosure89 = function() use ($renderingContext, $self) {
$output90 = '';

$output90 .= '
                <div class="col-md-7 center">
                    <table class="table">
                        <tr>
                            <td>User: </td>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments91 = array();
$arguments91['class'] = 'form-control';
$arguments91['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]';
$arguments91['additionalAttributes'] = NULL;
$arguments91['data'] = NULL;
$arguments91['required'] = false;
$arguments91['type'] = 'text';
$arguments91['value'] = NULL;
$arguments91['property'] = NULL;
$arguments91['disabled'] = NULL;
$arguments91['maxlength'] = NULL;
$arguments91['readonly'] = NULL;
$arguments91['size'] = NULL;
$arguments91['placeholder'] = NULL;
$arguments91['autofocus'] = NULL;
$arguments91['errorClass'] = 'f3-form-error';
$arguments91['dir'] = NULL;
$arguments91['id'] = NULL;
$arguments91['lang'] = NULL;
$arguments91['style'] = NULL;
$arguments91['title'] = NULL;
$arguments91['accesskey'] = NULL;
$arguments91['tabindex'] = NULL;
$arguments91['onclick'] = NULL;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper93 = $self->getViewHelper('$viewHelper93', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper93->setArguments($arguments91);
$viewHelper93->setRenderingContext($renderingContext);
$viewHelper93->setRenderChildrenClosure($renderChildrenClosure92);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output90 .= $viewHelper93->initializeArgumentsAndRender();

$output90 .= '</td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments94 = array();
$arguments94['class'] = 'form-control';
$arguments94['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]';
$arguments94['additionalAttributes'] = NULL;
$arguments94['data'] = NULL;
$arguments94['value'] = NULL;
$arguments94['property'] = NULL;
$arguments94['disabled'] = NULL;
$arguments94['maxlength'] = NULL;
$arguments94['readonly'] = NULL;
$arguments94['size'] = NULL;
$arguments94['placeholder'] = NULL;
$arguments94['errorClass'] = 'f3-form-error';
$arguments94['dir'] = NULL;
$arguments94['id'] = NULL;
$arguments94['lang'] = NULL;
$arguments94['style'] = NULL;
$arguments94['title'] = NULL;
$arguments94['accesskey'] = NULL;
$arguments94['tabindex'] = NULL;
$arguments94['onclick'] = NULL;
$renderChildrenClosure95 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper96 = $self->getViewHelper('$viewHelper96', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper96->setArguments($arguments94);
$viewHelper96->setRenderingContext($renderingContext);
$viewHelper96->setRenderChildrenClosure($renderChildrenClosure95);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output90 .= $viewHelper96->initializeArgumentsAndRender();

$output90 .= '</td>
                        </tr>
                        <tr>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments97 = array();
$arguments97['value'] = 'Login';
$arguments97['additionalAttributes'] = NULL;
$arguments97['data'] = NULL;
$arguments97['name'] = NULL;
$arguments97['property'] = NULL;
$arguments97['disabled'] = NULL;
$arguments97['class'] = NULL;
$arguments97['dir'] = NULL;
$arguments97['id'] = NULL;
$arguments97['lang'] = NULL;
$arguments97['style'] = NULL;
$arguments97['title'] = NULL;
$arguments97['accesskey'] = NULL;
$arguments97['tabindex'] = NULL;
$arguments97['onclick'] = NULL;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper99 = $self->getViewHelper('$viewHelper99', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper99->setArguments($arguments97);
$viewHelper99->setRenderingContext($renderingContext);
$viewHelper99->setRenderChildrenClosure($renderChildrenClosure98);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output90 .= $viewHelper99->initializeArgumentsAndRender();

$output90 .= '</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            ';
return $output90;
};
$viewHelper100 = $self->getViewHelper('$viewHelper100', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper100->setArguments($arguments88);
$viewHelper100->setRenderingContext($renderingContext);
$viewHelper100->setRenderChildrenClosure($renderChildrenClosure89);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output87 .= $viewHelper100->initializeArgumentsAndRender();

$output87 .= '
            <br />
            Not yet an account? ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments101 = array();
$arguments101['action'] = 'register';
$arguments101['controller'] = 'Login';
$arguments101['additionalAttributes'] = NULL;
$arguments101['data'] = NULL;
$arguments101['arguments'] = array (
);
$arguments101['package'] = NULL;
$arguments101['subpackage'] = NULL;
$arguments101['section'] = '';
$arguments101['format'] = '';
$arguments101['additionalParams'] = array (
);
$arguments101['addQueryString'] = false;
$arguments101['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments101['useParentRequest'] = false;
$arguments101['absolute'] = true;
$arguments101['class'] = NULL;
$arguments101['dir'] = NULL;
$arguments101['id'] = NULL;
$arguments101['lang'] = NULL;
$arguments101['style'] = NULL;
$arguments101['title'] = NULL;
$arguments101['accesskey'] = NULL;
$arguments101['tabindex'] = NULL;
$arguments101['onclick'] = NULL;
$arguments101['name'] = NULL;
$arguments101['rel'] = NULL;
$arguments101['rev'] = NULL;
$arguments101['target'] = NULL;
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
return 'Register here!!';
};
$viewHelper103 = $self->getViewHelper('$viewHelper103', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper103->setArguments($arguments101);
$viewHelper103->setRenderingContext($renderingContext);
$viewHelper103->setRenderChildrenClosure($renderChildrenClosure102);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output87 .= $viewHelper103->initializeArgumentsAndRender();

$output87 .= '
        ';
return $output87;
};
$viewHelper104 = $self->getViewHelper('$viewHelper104', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper104->setArguments($arguments85);
$viewHelper104->setRenderingContext($renderingContext);
$viewHelper104->setRenderChildrenClosure($renderChildrenClosure86);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output77 .= $viewHelper104->initializeArgumentsAndRender();

$output77 .= '
    ';
return $output77;
};
$arguments75['__thenClosure'] = function() use ($renderingContext, $self) {
$output105 = '';

$output105 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments106 = array();
$arguments106['action'] = 'logout';
$arguments106['controller'] = 'Login';
$arguments106['additionalAttributes'] = NULL;
$arguments106['data'] = NULL;
$arguments106['arguments'] = array (
);
$arguments106['package'] = NULL;
$arguments106['subpackage'] = NULL;
$arguments106['section'] = '';
$arguments106['format'] = '';
$arguments106['additionalParams'] = array (
);
$arguments106['addQueryString'] = false;
$arguments106['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments106['useParentRequest'] = false;
$arguments106['absolute'] = true;
$arguments106['class'] = NULL;
$arguments106['dir'] = NULL;
$arguments106['id'] = NULL;
$arguments106['lang'] = NULL;
$arguments106['style'] = NULL;
$arguments106['title'] = NULL;
$arguments106['accesskey'] = NULL;
$arguments106['tabindex'] = NULL;
$arguments106['onclick'] = NULL;
$arguments106['name'] = NULL;
$arguments106['rel'] = NULL;
$arguments106['rev'] = NULL;
$arguments106['target'] = NULL;
$renderChildrenClosure107 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper108 = $self->getViewHelper('$viewHelper108', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper108->setArguments($arguments106);
$viewHelper108->setRenderingContext($renderingContext);
$viewHelper108->setRenderChildrenClosure($renderChildrenClosure107);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output105 .= $viewHelper108->initializeArgumentsAndRender();

$output105 .= '
        ';
return $output105;
};
$arguments75['__elseClosure'] = function() use ($renderingContext, $self) {
$output109 = '';

$output109 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments110 = array();
$arguments110['action'] = 'authenticate';
$arguments110['method'] = 'post';
$arguments110['name'] = 'loginform';
$arguments110['additionalAttributes'] = NULL;
$arguments110['data'] = NULL;
$arguments110['arguments'] = array (
);
$arguments110['controller'] = NULL;
$arguments110['package'] = NULL;
$arguments110['subpackage'] = NULL;
$arguments110['object'] = NULL;
$arguments110['section'] = '';
$arguments110['format'] = '';
$arguments110['additionalParams'] = array (
);
$arguments110['absolute'] = false;
$arguments110['addQueryString'] = false;
$arguments110['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments110['fieldNamePrefix'] = NULL;
$arguments110['actionUri'] = NULL;
$arguments110['objectName'] = NULL;
$arguments110['useParentRequest'] = false;
$arguments110['enctype'] = NULL;
$arguments110['onreset'] = NULL;
$arguments110['onsubmit'] = NULL;
$arguments110['class'] = NULL;
$arguments110['dir'] = NULL;
$arguments110['id'] = NULL;
$arguments110['lang'] = NULL;
$arguments110['style'] = NULL;
$arguments110['title'] = NULL;
$arguments110['accesskey'] = NULL;
$arguments110['tabindex'] = NULL;
$arguments110['onclick'] = NULL;
$renderChildrenClosure111 = function() use ($renderingContext, $self) {
$output112 = '';

$output112 .= '
                <div class="col-md-7 center">
                    <table class="table">
                        <tr>
                            <td>User: </td>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments113 = array();
$arguments113['class'] = 'form-control';
$arguments113['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]';
$arguments113['additionalAttributes'] = NULL;
$arguments113['data'] = NULL;
$arguments113['required'] = false;
$arguments113['type'] = 'text';
$arguments113['value'] = NULL;
$arguments113['property'] = NULL;
$arguments113['disabled'] = NULL;
$arguments113['maxlength'] = NULL;
$arguments113['readonly'] = NULL;
$arguments113['size'] = NULL;
$arguments113['placeholder'] = NULL;
$arguments113['autofocus'] = NULL;
$arguments113['errorClass'] = 'f3-form-error';
$arguments113['dir'] = NULL;
$arguments113['id'] = NULL;
$arguments113['lang'] = NULL;
$arguments113['style'] = NULL;
$arguments113['title'] = NULL;
$arguments113['accesskey'] = NULL;
$arguments113['tabindex'] = NULL;
$arguments113['onclick'] = NULL;
$renderChildrenClosure114 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper115 = $self->getViewHelper('$viewHelper115', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper115->setArguments($arguments113);
$viewHelper115->setRenderingContext($renderingContext);
$viewHelper115->setRenderChildrenClosure($renderChildrenClosure114);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output112 .= $viewHelper115->initializeArgumentsAndRender();

$output112 .= '</td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper
$arguments116 = array();
$arguments116['class'] = 'form-control';
$arguments116['name'] = '__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]';
$arguments116['additionalAttributes'] = NULL;
$arguments116['data'] = NULL;
$arguments116['value'] = NULL;
$arguments116['property'] = NULL;
$arguments116['disabled'] = NULL;
$arguments116['maxlength'] = NULL;
$arguments116['readonly'] = NULL;
$arguments116['size'] = NULL;
$arguments116['placeholder'] = NULL;
$arguments116['errorClass'] = 'f3-form-error';
$arguments116['dir'] = NULL;
$arguments116['id'] = NULL;
$arguments116['lang'] = NULL;
$arguments116['style'] = NULL;
$arguments116['title'] = NULL;
$arguments116['accesskey'] = NULL;
$arguments116['tabindex'] = NULL;
$arguments116['onclick'] = NULL;
$renderChildrenClosure117 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper118 = $self->getViewHelper('$viewHelper118', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper');
$viewHelper118->setArguments($arguments116);
$viewHelper118->setRenderingContext($renderingContext);
$viewHelper118->setRenderChildrenClosure($renderChildrenClosure117);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\PasswordViewHelper

$output112 .= $viewHelper118->initializeArgumentsAndRender();

$output112 .= '</td>
                        </tr>
                        <tr>
                            <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments119 = array();
$arguments119['value'] = 'Login';
$arguments119['additionalAttributes'] = NULL;
$arguments119['data'] = NULL;
$arguments119['name'] = NULL;
$arguments119['property'] = NULL;
$arguments119['disabled'] = NULL;
$arguments119['class'] = NULL;
$arguments119['dir'] = NULL;
$arguments119['id'] = NULL;
$arguments119['lang'] = NULL;
$arguments119['style'] = NULL;
$arguments119['title'] = NULL;
$arguments119['accesskey'] = NULL;
$arguments119['tabindex'] = NULL;
$arguments119['onclick'] = NULL;
$renderChildrenClosure120 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper121 = $self->getViewHelper('$viewHelper121', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper121->setArguments($arguments119);
$viewHelper121->setRenderingContext($renderingContext);
$viewHelper121->setRenderChildrenClosure($renderChildrenClosure120);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output112 .= $viewHelper121->initializeArgumentsAndRender();

$output112 .= '</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            ';
return $output112;
};
$viewHelper122 = $self->getViewHelper('$viewHelper122', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper122->setArguments($arguments110);
$viewHelper122->setRenderingContext($renderingContext);
$viewHelper122->setRenderChildrenClosure($renderChildrenClosure111);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output109 .= $viewHelper122->initializeArgumentsAndRender();

$output109 .= '
            <br />
            Not yet an account? ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments123 = array();
$arguments123['action'] = 'register';
$arguments123['controller'] = 'Login';
$arguments123['additionalAttributes'] = NULL;
$arguments123['data'] = NULL;
$arguments123['arguments'] = array (
);
$arguments123['package'] = NULL;
$arguments123['subpackage'] = NULL;
$arguments123['section'] = '';
$arguments123['format'] = '';
$arguments123['additionalParams'] = array (
);
$arguments123['addQueryString'] = false;
$arguments123['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments123['useParentRequest'] = false;
$arguments123['absolute'] = true;
$arguments123['class'] = NULL;
$arguments123['dir'] = NULL;
$arguments123['id'] = NULL;
$arguments123['lang'] = NULL;
$arguments123['style'] = NULL;
$arguments123['title'] = NULL;
$arguments123['accesskey'] = NULL;
$arguments123['tabindex'] = NULL;
$arguments123['onclick'] = NULL;
$arguments123['name'] = NULL;
$arguments123['rel'] = NULL;
$arguments123['rev'] = NULL;
$arguments123['target'] = NULL;
$renderChildrenClosure124 = function() use ($renderingContext, $self) {
return 'Register here!!';
};
$viewHelper125 = $self->getViewHelper('$viewHelper125', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper125->setArguments($arguments123);
$viewHelper125->setRenderingContext($renderingContext);
$viewHelper125->setRenderChildrenClosure($renderChildrenClosure124);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output109 .= $viewHelper125->initializeArgumentsAndRender();

$output109 .= '
        ';
return $output109;
};
$viewHelper126 = $self->getViewHelper('$viewHelper126', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper');
$viewHelper126->setArguments($arguments75);
$viewHelper126->setRenderingContext($renderingContext);
$viewHelper126->setRenderChildrenClosure($renderChildrenClosure76);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper

$output71 .= $viewHelper126->initializeArgumentsAndRender();

$output71 .= '

';
return $output71;
};

$output56 .= '';

return $output56;
}


}
#0             48768     