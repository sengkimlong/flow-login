<?php class FluidCache_SKL_Test_Form_action_show_097054e6f0f73bbae32d82ea1c05ae03e60e9a40 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'Default';
}
public function hasLayout() {
return TRUE;
}

/**
 * section Title
 */
public function section_768e0c1c69573fb588f61f1308a015c11468e05f(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= 'Show form"';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments1 = array();
$arguments1['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments1['keepQuotes'] = false;
$arguments1['encoding'] = 'UTF-8';
$arguments1['doubleEncode'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$value3 = ($arguments1['value'] !== NULL ? $arguments1['value'] : $renderChildrenClosure2());

$output0 .= !is_string($value3) && !(is_object($value3) && method_exists($value3, '__toString')) ? $value3 : htmlspecialchars($value3, ($arguments1['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments1['encoding'], $arguments1['doubleEncode']);

$output0 .= '"';

return $output0;
}
/**
 * section stylesheet
 */
public function section_220d19d1bc706bb369de96ef5d33b4398c5314ef(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return NULL;
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output4 = '';

$output4 .= '
	<table>
		<tr>
			<th>Name</th>
			<td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments5 = array();
$arguments5['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments5['keepQuotes'] = false;
$arguments5['encoding'] = 'UTF-8';
$arguments5['doubleEncode'] = true;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
return NULL;
};
$value7 = ($arguments5['value'] !== NULL ? $arguments5['value'] : $renderChildrenClosure6());

$output4 .= !is_string($value7) && !(is_object($value7) && method_exists($value7, '__toString')) ? $value7 : htmlspecialchars($value7, ($arguments5['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments5['encoding'], $arguments5['doubleEncode']);

$output4 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments8 = array();
$arguments8['action'] = 'create';
$arguments8['controller'] = 'question';
$arguments8['objectName'] = 'question';
$arguments8['additionalAttributes'] = NULL;
$arguments8['data'] = NULL;
$arguments8['arguments'] = array (
);
$arguments8['package'] = NULL;
$arguments8['subpackage'] = NULL;
$arguments8['object'] = NULL;
$arguments8['section'] = '';
$arguments8['format'] = '';
$arguments8['additionalParams'] = array (
);
$arguments8['absolute'] = false;
$arguments8['addQueryString'] = false;
$arguments8['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments8['fieldNamePrefix'] = NULL;
$arguments8['actionUri'] = NULL;
$arguments8['useParentRequest'] = false;
$arguments8['enctype'] = NULL;
$arguments8['method'] = NULL;
$arguments8['name'] = NULL;
$arguments8['onreset'] = NULL;
$arguments8['onsubmit'] = NULL;
$arguments8['class'] = NULL;
$arguments8['dir'] = NULL;
$arguments8['id'] = NULL;
$arguments8['lang'] = NULL;
$arguments8['style'] = NULL;
$arguments8['title'] = NULL;
$arguments8['accesskey'] = NULL;
$arguments8['tabindex'] = NULL;
$arguments8['onclick'] = NULL;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
$output10 = '';

$output10 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments11 = array();
$arguments11['property'] = 'sentence';
$arguments11['additionalAttributes'] = NULL;
$arguments11['data'] = NULL;
$arguments11['required'] = false;
$arguments11['type'] = 'text';
$arguments11['name'] = NULL;
$arguments11['value'] = NULL;
$arguments11['disabled'] = NULL;
$arguments11['maxlength'] = NULL;
$arguments11['readonly'] = NULL;
$arguments11['size'] = NULL;
$arguments11['placeholder'] = NULL;
$arguments11['autofocus'] = NULL;
$arguments11['errorClass'] = 'f3-form-error';
$arguments11['class'] = NULL;
$arguments11['dir'] = NULL;
$arguments11['id'] = NULL;
$arguments11['lang'] = NULL;
$arguments11['style'] = NULL;
$arguments11['title'] = NULL;
$arguments11['accesskey'] = NULL;
$arguments11['tabindex'] = NULL;
$arguments11['onclick'] = NULL;
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper13->setArguments($arguments11);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure12);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output10 .= $viewHelper13->initializeArgumentsAndRender();

$output10 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments14 = array();
$arguments14['property'] = 'form';
$arguments14['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments14['additionalAttributes'] = NULL;
$arguments14['data'] = NULL;
$arguments14['name'] = NULL;
$arguments14['class'] = NULL;
$arguments14['dir'] = NULL;
$arguments14['id'] = NULL;
$arguments14['lang'] = NULL;
$arguments14['style'] = NULL;
$arguments14['title'] = NULL;
$arguments14['accesskey'] = NULL;
$arguments14['tabindex'] = NULL;
$arguments14['onclick'] = NULL;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper16->setArguments($arguments14);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output10 .= $viewHelper16->initializeArgumentsAndRender();

$output10 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments17 = array();
$arguments17['value'] = 'Submit';
$arguments17['additionalAttributes'] = NULL;
$arguments17['data'] = NULL;
$arguments17['name'] = NULL;
$arguments17['property'] = NULL;
$arguments17['disabled'] = NULL;
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
return NULL;
};
$viewHelper19 = $self->getViewHelper('$viewHelper19', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper19->setArguments($arguments17);
$viewHelper19->setRenderingContext($renderingContext);
$viewHelper19->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output10 .= $viewHelper19->initializeArgumentsAndRender();

$output10 .= '
            ';
return $output10;
};
$viewHelper20 = $self->getViewHelper('$viewHelper20', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper20->setArguments($arguments8);
$viewHelper20->setRenderingContext($renderingContext);
$viewHelper20->setRenderChildrenClosure($renderChildrenClosure9);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output4 .= $viewHelper20->initializeArgumentsAndRender();

$output4 .= '
            </td>
		</tr>
	</table>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments21 = array();
$arguments21['action'] = 'index';
$arguments21['additionalAttributes'] = NULL;
$arguments21['data'] = NULL;
$arguments21['arguments'] = array (
);
$arguments21['controller'] = NULL;
$arguments21['package'] = NULL;
$arguments21['subpackage'] = NULL;
$arguments21['section'] = '';
$arguments21['format'] = '';
$arguments21['additionalParams'] = array (
);
$arguments21['addQueryString'] = false;
$arguments21['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments21['useParentRequest'] = false;
$arguments21['absolute'] = true;
$arguments21['class'] = NULL;
$arguments21['dir'] = NULL;
$arguments21['id'] = NULL;
$arguments21['lang'] = NULL;
$arguments21['style'] = NULL;
$arguments21['title'] = NULL;
$arguments21['accesskey'] = NULL;
$arguments21['tabindex'] = NULL;
$arguments21['onclick'] = NULL;
$arguments21['name'] = NULL;
$arguments21['rel'] = NULL;
$arguments21['rev'] = NULL;
$arguments21['target'] = NULL;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper23->setArguments($arguments21);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure22);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output4 .= $viewHelper23->initializeArgumentsAndRender();

$output4 .= '
';

return $output4;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output24 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments25 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments26 = array();
$arguments26['name'] = 'Default';
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper28 = $self->getViewHelper('$viewHelper28', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper28->setArguments($arguments26);
$viewHelper28->setRenderingContext($renderingContext);
$viewHelper28->setRenderChildrenClosure($renderChildrenClosure27);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments25['value'] = $viewHelper28->initializeArgumentsAndRender();
$arguments25['keepQuotes'] = false;
$arguments25['encoding'] = 'UTF-8';
$arguments25['doubleEncode'] = true;
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
return NULL;
};
$value30 = ($arguments25['value'] !== NULL ? $arguments25['value'] : $renderChildrenClosure29());

$output24 .= !is_string($value30) && !(is_object($value30) && method_exists($value30, '__toString')) ? $value30 : htmlspecialchars($value30, ($arguments25['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments25['encoding'], $arguments25['doubleEncode']);

$output24 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments31 = array();
$arguments31['name'] = 'Title';
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
$output33 = '';

$output33 .= 'Show form"';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments34 = array();
$arguments34['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments34['keepQuotes'] = false;
$arguments34['encoding'] = 'UTF-8';
$arguments34['doubleEncode'] = true;
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
return NULL;
};
$value36 = ($arguments34['value'] !== NULL ? $arguments34['value'] : $renderChildrenClosure35());

$output33 .= !is_string($value36) && !(is_object($value36) && method_exists($value36, '__toString')) ? $value36 : htmlspecialchars($value36, ($arguments34['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments34['encoding'], $arguments34['doubleEncode']);

$output33 .= '"';
return $output33;
};

$output24 .= '';

$output24 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments37 = array();
$arguments37['name'] = 'stylesheet';
$renderChildrenClosure38 = function() use ($renderingContext, $self) {
return NULL;
};

$output24 .= '';

$output24 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments39 = array();
$arguments39['name'] = 'Content';
$renderChildrenClosure40 = function() use ($renderingContext, $self) {
$output41 = '';

$output41 .= '
	<table>
		<tr>
			<th>Name</th>
			<td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments42 = array();
$arguments42['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments42['keepQuotes'] = false;
$arguments42['encoding'] = 'UTF-8';
$arguments42['doubleEncode'] = true;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};
$value44 = ($arguments42['value'] !== NULL ? $arguments42['value'] : $renderChildrenClosure43());

$output41 .= !is_string($value44) && !(is_object($value44) && method_exists($value44, '__toString')) ? $value44 : htmlspecialchars($value44, ($arguments42['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments42['encoding'], $arguments42['doubleEncode']);

$output41 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments45 = array();
$arguments45['action'] = 'create';
$arguments45['controller'] = 'question';
$arguments45['objectName'] = 'question';
$arguments45['additionalAttributes'] = NULL;
$arguments45['data'] = NULL;
$arguments45['arguments'] = array (
);
$arguments45['package'] = NULL;
$arguments45['subpackage'] = NULL;
$arguments45['object'] = NULL;
$arguments45['section'] = '';
$arguments45['format'] = '';
$arguments45['additionalParams'] = array (
);
$arguments45['absolute'] = false;
$arguments45['addQueryString'] = false;
$arguments45['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments45['fieldNamePrefix'] = NULL;
$arguments45['actionUri'] = NULL;
$arguments45['useParentRequest'] = false;
$arguments45['enctype'] = NULL;
$arguments45['method'] = NULL;
$arguments45['name'] = NULL;
$arguments45['onreset'] = NULL;
$arguments45['onsubmit'] = NULL;
$arguments45['class'] = NULL;
$arguments45['dir'] = NULL;
$arguments45['id'] = NULL;
$arguments45['lang'] = NULL;
$arguments45['style'] = NULL;
$arguments45['title'] = NULL;
$arguments45['accesskey'] = NULL;
$arguments45['tabindex'] = NULL;
$arguments45['onclick'] = NULL;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
$output47 = '';

$output47 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments48 = array();
$arguments48['property'] = 'sentence';
$arguments48['additionalAttributes'] = NULL;
$arguments48['data'] = NULL;
$arguments48['required'] = false;
$arguments48['type'] = 'text';
$arguments48['name'] = NULL;
$arguments48['value'] = NULL;
$arguments48['disabled'] = NULL;
$arguments48['maxlength'] = NULL;
$arguments48['readonly'] = NULL;
$arguments48['size'] = NULL;
$arguments48['placeholder'] = NULL;
$arguments48['autofocus'] = NULL;
$arguments48['errorClass'] = 'f3-form-error';
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
$viewHelper50 = $self->getViewHelper('$viewHelper50', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper50->setArguments($arguments48);
$viewHelper50->setRenderingContext($renderingContext);
$viewHelper50->setRenderChildrenClosure($renderChildrenClosure49);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output47 .= $viewHelper50->initializeArgumentsAndRender();

$output47 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments51 = array();
$arguments51['property'] = 'form';
$arguments51['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments51['additionalAttributes'] = NULL;
$arguments51['data'] = NULL;
$arguments51['name'] = NULL;
$arguments51['class'] = NULL;
$arguments51['dir'] = NULL;
$arguments51['id'] = NULL;
$arguments51['lang'] = NULL;
$arguments51['style'] = NULL;
$arguments51['title'] = NULL;
$arguments51['accesskey'] = NULL;
$arguments51['tabindex'] = NULL;
$arguments51['onclick'] = NULL;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper53 = $self->getViewHelper('$viewHelper53', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper53->setArguments($arguments51);
$viewHelper53->setRenderingContext($renderingContext);
$viewHelper53->setRenderChildrenClosure($renderChildrenClosure52);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output47 .= $viewHelper53->initializeArgumentsAndRender();

$output47 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments54 = array();
$arguments54['value'] = 'Submit';
$arguments54['additionalAttributes'] = NULL;
$arguments54['data'] = NULL;
$arguments54['name'] = NULL;
$arguments54['property'] = NULL;
$arguments54['disabled'] = NULL;
$arguments54['class'] = NULL;
$arguments54['dir'] = NULL;
$arguments54['id'] = NULL;
$arguments54['lang'] = NULL;
$arguments54['style'] = NULL;
$arguments54['title'] = NULL;
$arguments54['accesskey'] = NULL;
$arguments54['tabindex'] = NULL;
$arguments54['onclick'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper56 = $self->getViewHelper('$viewHelper56', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper56->setArguments($arguments54);
$viewHelper56->setRenderingContext($renderingContext);
$viewHelper56->setRenderChildrenClosure($renderChildrenClosure55);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output47 .= $viewHelper56->initializeArgumentsAndRender();

$output47 .= '
            ';
return $output47;
};
$viewHelper57 = $self->getViewHelper('$viewHelper57', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper57->setArguments($arguments45);
$viewHelper57->setRenderingContext($renderingContext);
$viewHelper57->setRenderChildrenClosure($renderChildrenClosure46);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output41 .= $viewHelper57->initializeArgumentsAndRender();

$output41 .= '
            </td>
		</tr>
	</table>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments58 = array();
$arguments58['action'] = 'index';
$arguments58['additionalAttributes'] = NULL;
$arguments58['data'] = NULL;
$arguments58['arguments'] = array (
);
$arguments58['controller'] = NULL;
$arguments58['package'] = NULL;
$arguments58['subpackage'] = NULL;
$arguments58['section'] = '';
$arguments58['format'] = '';
$arguments58['additionalParams'] = array (
);
$arguments58['addQueryString'] = false;
$arguments58['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments58['useParentRequest'] = false;
$arguments58['absolute'] = true;
$arguments58['class'] = NULL;
$arguments58['dir'] = NULL;
$arguments58['id'] = NULL;
$arguments58['lang'] = NULL;
$arguments58['style'] = NULL;
$arguments58['title'] = NULL;
$arguments58['accesskey'] = NULL;
$arguments58['tabindex'] = NULL;
$arguments58['onclick'] = NULL;
$arguments58['name'] = NULL;
$arguments58['rel'] = NULL;
$arguments58['rev'] = NULL;
$arguments58['target'] = NULL;
$renderChildrenClosure59 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper60 = $self->getViewHelper('$viewHelper60', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper60->setArguments($arguments58);
$viewHelper60->setRenderingContext($renderingContext);
$viewHelper60->setRenderChildrenClosure($renderChildrenClosure59);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output41 .= $viewHelper60->initializeArgumentsAndRender();

$output41 .= '
';
return $output41;
};

$output24 .= '';

return $output24;
}


}
#0             21029     