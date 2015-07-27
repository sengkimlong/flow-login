<?php class FluidCache_SKL_Test_Form_action_show_3af6d481f23d7607d3d42eb7f30c99080e1a5bbb extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments5 = array();
$arguments5['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments5['as'] = 'question';
$arguments5['key'] = '';
$arguments5['reverse'] = false;
$arguments5['iteration'] = NULL;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
$output7 = '';

$output7 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments8 = array();
$arguments8['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments8['keepQuotes'] = false;
$arguments8['encoding'] = 'UTF-8';
$arguments8['doubleEncode'] = true;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
return NULL;
};
$value10 = ($arguments8['value'] !== NULL ? $arguments8['value'] : $renderChildrenClosure9());

$output7 .= !is_string($value10) && !(is_object($value10) && method_exists($value10, '__toString')) ? $value10 : htmlspecialchars($value10, ($arguments8['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments8['encoding'], $arguments8['doubleEncode']);

$output7 .= '
        ';
return $output7;
};

$output4 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments5, $renderChildrenClosure6, $renderingContext);

$output4 .= '
	<table>
		<tr>
			<th>Name</th>
			<td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments11 = array();
$arguments11['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments11['keepQuotes'] = false;
$arguments11['encoding'] = 'UTF-8';
$arguments11['doubleEncode'] = true;
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
return NULL;
};
$value13 = ($arguments11['value'] !== NULL ? $arguments11['value'] : $renderChildrenClosure12());

$output4 .= !is_string($value13) && !(is_object($value13) && method_exists($value13, '__toString')) ? $value13 : htmlspecialchars($value13, ($arguments11['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments11['encoding'], $arguments11['doubleEncode']);

$output4 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments14 = array();
$arguments14['action'] = 'create';
$arguments14['controller'] = 'question';
$arguments14['objectName'] = 'question';
$arguments14['additionalAttributes'] = NULL;
$arguments14['data'] = NULL;
$arguments14['arguments'] = array (
);
$arguments14['package'] = NULL;
$arguments14['subpackage'] = NULL;
$arguments14['object'] = NULL;
$arguments14['section'] = '';
$arguments14['format'] = '';
$arguments14['additionalParams'] = array (
);
$arguments14['absolute'] = false;
$arguments14['addQueryString'] = false;
$arguments14['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments14['fieldNamePrefix'] = NULL;
$arguments14['actionUri'] = NULL;
$arguments14['useParentRequest'] = false;
$arguments14['enctype'] = NULL;
$arguments14['method'] = NULL;
$arguments14['name'] = NULL;
$arguments14['onreset'] = NULL;
$arguments14['onsubmit'] = NULL;
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
$output16 = '';

$output16 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments17 = array();
$arguments17['property'] = 'sentence';
$arguments17['additionalAttributes'] = NULL;
$arguments17['data'] = NULL;
$arguments17['required'] = false;
$arguments17['type'] = 'text';
$arguments17['name'] = NULL;
$arguments17['value'] = NULL;
$arguments17['disabled'] = NULL;
$arguments17['maxlength'] = NULL;
$arguments17['readonly'] = NULL;
$arguments17['size'] = NULL;
$arguments17['placeholder'] = NULL;
$arguments17['autofocus'] = NULL;
$arguments17['errorClass'] = 'f3-form-error';
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
$viewHelper19 = $self->getViewHelper('$viewHelper19', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper19->setArguments($arguments17);
$viewHelper19->setRenderingContext($renderingContext);
$viewHelper19->setRenderChildrenClosure($renderChildrenClosure18);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output16 .= $viewHelper19->initializeArgumentsAndRender();

$output16 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments20 = array();
$arguments20['property'] = 'form';
$arguments20['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments20['additionalAttributes'] = NULL;
$arguments20['data'] = NULL;
$arguments20['name'] = NULL;
$arguments20['class'] = NULL;
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
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper22->setArguments($arguments20);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure21);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output16 .= $viewHelper22->initializeArgumentsAndRender();

$output16 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments23 = array();
$arguments23['value'] = 'Submit';
$arguments23['additionalAttributes'] = NULL;
$arguments23['data'] = NULL;
$arguments23['name'] = NULL;
$arguments23['property'] = NULL;
$arguments23['disabled'] = NULL;
$arguments23['class'] = NULL;
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
$viewHelper25 = $self->getViewHelper('$viewHelper25', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper25->setArguments($arguments23);
$viewHelper25->setRenderingContext($renderingContext);
$viewHelper25->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output16 .= $viewHelper25->initializeArgumentsAndRender();

$output16 .= '
            ';
return $output16;
};
$viewHelper26 = $self->getViewHelper('$viewHelper26', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper26->setArguments($arguments14);
$viewHelper26->setRenderingContext($renderingContext);
$viewHelper26->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output4 .= $viewHelper26->initializeArgumentsAndRender();

$output4 .= '
            </td>
		</tr>
	</table>
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
return 'Back';
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper29->setArguments($arguments27);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure28);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output4 .= $viewHelper29->initializeArgumentsAndRender();

$output4 .= '
';

return $output4;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output30 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments31 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments32 = array();
$arguments32['name'] = 'Default';
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper34 = $self->getViewHelper('$viewHelper34', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper34->setArguments($arguments32);
$viewHelper34->setRenderingContext($renderingContext);
$viewHelper34->setRenderChildrenClosure($renderChildrenClosure33);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments31['value'] = $viewHelper34->initializeArgumentsAndRender();
$arguments31['keepQuotes'] = false;
$arguments31['encoding'] = 'UTF-8';
$arguments31['doubleEncode'] = true;
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
return NULL;
};
$value36 = ($arguments31['value'] !== NULL ? $arguments31['value'] : $renderChildrenClosure35());

$output30 .= !is_string($value36) && !(is_object($value36) && method_exists($value36, '__toString')) ? $value36 : htmlspecialchars($value36, ($arguments31['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments31['encoding'], $arguments31['doubleEncode']);

$output30 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments37 = array();
$arguments37['name'] = 'Title';
$renderChildrenClosure38 = function() use ($renderingContext, $self) {
$output39 = '';

$output39 .= 'Show form"';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments40 = array();
$arguments40['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments40['keepQuotes'] = false;
$arguments40['encoding'] = 'UTF-8';
$arguments40['doubleEncode'] = true;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
return NULL;
};
$value42 = ($arguments40['value'] !== NULL ? $arguments40['value'] : $renderChildrenClosure41());

$output39 .= !is_string($value42) && !(is_object($value42) && method_exists($value42, '__toString')) ? $value42 : htmlspecialchars($value42, ($arguments40['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments40['encoding'], $arguments40['doubleEncode']);

$output39 .= '"';
return $output39;
};

$output30 .= '';

$output30 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments43 = array();
$arguments43['name'] = 'stylesheet';
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
return NULL;
};

$output30 .= '';

$output30 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments45 = array();
$arguments45['name'] = 'Content';
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
$output47 = '';

$output47 .= '
    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments48 = array();
$arguments48['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments48['as'] = 'question';
$arguments48['key'] = '';
$arguments48['reverse'] = false;
$arguments48['iteration'] = NULL;
$renderChildrenClosure49 = function() use ($renderingContext, $self) {
$output50 = '';

$output50 .= '
        ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments51 = array();
$arguments51['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments51['keepQuotes'] = false;
$arguments51['encoding'] = 'UTF-8';
$arguments51['doubleEncode'] = true;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
return NULL;
};
$value53 = ($arguments51['value'] !== NULL ? $arguments51['value'] : $renderChildrenClosure52());

$output50 .= !is_string($value53) && !(is_object($value53) && method_exists($value53, '__toString')) ? $value53 : htmlspecialchars($value53, ($arguments51['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments51['encoding'], $arguments51['doubleEncode']);

$output50 .= '
        ';
return $output50;
};

$output47 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments48, $renderChildrenClosure49, $renderingContext);

$output47 .= '
	<table>
		<tr>
			<th>Name</th>
			<td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments54 = array();
$arguments54['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments54['keepQuotes'] = false;
$arguments54['encoding'] = 'UTF-8';
$arguments54['doubleEncode'] = true;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};
$value56 = ($arguments54['value'] !== NULL ? $arguments54['value'] : $renderChildrenClosure55());

$output47 .= !is_string($value56) && !(is_object($value56) && method_exists($value56, '__toString')) ? $value56 : htmlspecialchars($value56, ($arguments54['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments54['encoding'], $arguments54['doubleEncode']);

$output47 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments57 = array();
$arguments57['action'] = 'create';
$arguments57['controller'] = 'question';
$arguments57['objectName'] = 'question';
$arguments57['additionalAttributes'] = NULL;
$arguments57['data'] = NULL;
$arguments57['arguments'] = array (
);
$arguments57['package'] = NULL;
$arguments57['subpackage'] = NULL;
$arguments57['object'] = NULL;
$arguments57['section'] = '';
$arguments57['format'] = '';
$arguments57['additionalParams'] = array (
);
$arguments57['absolute'] = false;
$arguments57['addQueryString'] = false;
$arguments57['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments57['fieldNamePrefix'] = NULL;
$arguments57['actionUri'] = NULL;
$arguments57['useParentRequest'] = false;
$arguments57['enctype'] = NULL;
$arguments57['method'] = NULL;
$arguments57['name'] = NULL;
$arguments57['onreset'] = NULL;
$arguments57['onsubmit'] = NULL;
$arguments57['class'] = NULL;
$arguments57['dir'] = NULL;
$arguments57['id'] = NULL;
$arguments57['lang'] = NULL;
$arguments57['style'] = NULL;
$arguments57['title'] = NULL;
$arguments57['accesskey'] = NULL;
$arguments57['tabindex'] = NULL;
$arguments57['onclick'] = NULL;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
$output59 = '';

$output59 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments60 = array();
$arguments60['property'] = 'sentence';
$arguments60['additionalAttributes'] = NULL;
$arguments60['data'] = NULL;
$arguments60['required'] = false;
$arguments60['type'] = 'text';
$arguments60['name'] = NULL;
$arguments60['value'] = NULL;
$arguments60['disabled'] = NULL;
$arguments60['maxlength'] = NULL;
$arguments60['readonly'] = NULL;
$arguments60['size'] = NULL;
$arguments60['placeholder'] = NULL;
$arguments60['autofocus'] = NULL;
$arguments60['errorClass'] = 'f3-form-error';
$arguments60['class'] = NULL;
$arguments60['dir'] = NULL;
$arguments60['id'] = NULL;
$arguments60['lang'] = NULL;
$arguments60['style'] = NULL;
$arguments60['title'] = NULL;
$arguments60['accesskey'] = NULL;
$arguments60['tabindex'] = NULL;
$arguments60['onclick'] = NULL;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper62 = $self->getViewHelper('$viewHelper62', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper62->setArguments($arguments60);
$viewHelper62->setRenderingContext($renderingContext);
$viewHelper62->setRenderChildrenClosure($renderChildrenClosure61);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output59 .= $viewHelper62->initializeArgumentsAndRender();

$output59 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments63 = array();
$arguments63['property'] = 'form';
$arguments63['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments63['additionalAttributes'] = NULL;
$arguments63['data'] = NULL;
$arguments63['name'] = NULL;
$arguments63['class'] = NULL;
$arguments63['dir'] = NULL;
$arguments63['id'] = NULL;
$arguments63['lang'] = NULL;
$arguments63['style'] = NULL;
$arguments63['title'] = NULL;
$arguments63['accesskey'] = NULL;
$arguments63['tabindex'] = NULL;
$arguments63['onclick'] = NULL;
$renderChildrenClosure64 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper65 = $self->getViewHelper('$viewHelper65', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper65->setArguments($arguments63);
$viewHelper65->setRenderingContext($renderingContext);
$viewHelper65->setRenderChildrenClosure($renderChildrenClosure64);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output59 .= $viewHelper65->initializeArgumentsAndRender();

$output59 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments66 = array();
$arguments66['value'] = 'Submit';
$arguments66['additionalAttributes'] = NULL;
$arguments66['data'] = NULL;
$arguments66['name'] = NULL;
$arguments66['property'] = NULL;
$arguments66['disabled'] = NULL;
$arguments66['class'] = NULL;
$arguments66['dir'] = NULL;
$arguments66['id'] = NULL;
$arguments66['lang'] = NULL;
$arguments66['style'] = NULL;
$arguments66['title'] = NULL;
$arguments66['accesskey'] = NULL;
$arguments66['tabindex'] = NULL;
$arguments66['onclick'] = NULL;
$renderChildrenClosure67 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper68 = $self->getViewHelper('$viewHelper68', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper68->setArguments($arguments66);
$viewHelper68->setRenderingContext($renderingContext);
$viewHelper68->setRenderChildrenClosure($renderChildrenClosure67);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output59 .= $viewHelper68->initializeArgumentsAndRender();

$output59 .= '
            ';
return $output59;
};
$viewHelper69 = $self->getViewHelper('$viewHelper69', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper69->setArguments($arguments57);
$viewHelper69->setRenderingContext($renderingContext);
$viewHelper69->setRenderChildrenClosure($renderChildrenClosure58);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output47 .= $viewHelper69->initializeArgumentsAndRender();

$output47 .= '
            </td>
		</tr>
	</table>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments70 = array();
$arguments70['action'] = 'index';
$arguments70['additionalAttributes'] = NULL;
$arguments70['data'] = NULL;
$arguments70['arguments'] = array (
);
$arguments70['controller'] = NULL;
$arguments70['package'] = NULL;
$arguments70['subpackage'] = NULL;
$arguments70['section'] = '';
$arguments70['format'] = '';
$arguments70['additionalParams'] = array (
);
$arguments70['addQueryString'] = false;
$arguments70['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments70['useParentRequest'] = false;
$arguments70['absolute'] = true;
$arguments70['class'] = NULL;
$arguments70['dir'] = NULL;
$arguments70['id'] = NULL;
$arguments70['lang'] = NULL;
$arguments70['style'] = NULL;
$arguments70['title'] = NULL;
$arguments70['accesskey'] = NULL;
$arguments70['tabindex'] = NULL;
$arguments70['onclick'] = NULL;
$arguments70['name'] = NULL;
$arguments70['rel'] = NULL;
$arguments70['rev'] = NULL;
$arguments70['target'] = NULL;
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper72 = $self->getViewHelper('$viewHelper72', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper72->setArguments($arguments70);
$viewHelper72->setRenderingContext($renderingContext);
$viewHelper72->setRenderChildrenClosure($renderChildrenClosure71);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output47 .= $viewHelper72->initializeArgumentsAndRender();

$output47 .= '
';
return $output47;
};

$output30 .= '';

return $output30;
}


}
#0             24159     