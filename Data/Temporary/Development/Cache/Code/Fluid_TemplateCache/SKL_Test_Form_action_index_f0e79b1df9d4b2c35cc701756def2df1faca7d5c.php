<?php class FluidCache_SKL_Test_Form_action_index_f0e79b1df9d4b2c35cc701756def2df1faca7d5c extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

return 'A list of forms';
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
$output0 = '';

$output0 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments4 = array();
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$output6 = '';

$output6 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments7 = array();
$arguments7['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments7['as'] = 'form';
$arguments7['key'] = '';
$arguments7['reverse'] = false;
$arguments7['iteration'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
$output9 = '';

$output9 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments10 = array();
$arguments10['action'] = 'show';
// Rendering Array
$array11 = array();
$array11['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments10['arguments'] = $array11;
$arguments10['additionalAttributes'] = NULL;
$arguments10['data'] = NULL;
$arguments10['controller'] = NULL;
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
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments13 = array();
$arguments13['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments13['keepQuotes'] = false;
$arguments13['encoding'] = 'UTF-8';
$arguments13['doubleEncode'] = true;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$value15 = ($arguments13['value'] !== NULL ? $arguments13['value'] : $renderChildrenClosure14());
return !is_string($value15) && !(is_object($value15) && method_exists($value15, '__toString')) ? $value15 : htmlspecialchars($value15, ($arguments13['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments13['encoding'], $arguments13['doubleEncode']);
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper16->setArguments($arguments10);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure12);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output9 .= $viewHelper16->initializeArgumentsAndRender();

$output9 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments17 = array();
$arguments17['action'] = 'edit';
// Rendering Array
$array18 = array();
$array18['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments17['arguments'] = $array18;
$arguments17['additionalAttributes'] = NULL;
$arguments17['data'] = NULL;
$arguments17['controller'] = NULL;
$arguments17['package'] = NULL;
$arguments17['subpackage'] = NULL;
$arguments17['section'] = '';
$arguments17['format'] = '';
$arguments17['additionalParams'] = array (
);
$arguments17['addQueryString'] = false;
$arguments17['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments17['useParentRequest'] = false;
$arguments17['absolute'] = true;
$arguments17['class'] = NULL;
$arguments17['dir'] = NULL;
$arguments17['id'] = NULL;
$arguments17['lang'] = NULL;
$arguments17['style'] = NULL;
$arguments17['title'] = NULL;
$arguments17['accesskey'] = NULL;
$arguments17['tabindex'] = NULL;
$arguments17['onclick'] = NULL;
$arguments17['name'] = NULL;
$arguments17['rel'] = NULL;
$arguments17['rev'] = NULL;
$arguments17['target'] = NULL;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper20 = $self->getViewHelper('$viewHelper20', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper20->setArguments($arguments17);
$viewHelper20->setRenderingContext($renderingContext);
$viewHelper20->setRenderChildrenClosure($renderChildrenClosure19);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output9 .= $viewHelper20->initializeArgumentsAndRender();

$output9 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments21 = array();
$arguments21['action'] = 'delete';
// Rendering Array
$array22 = array();
$array22['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments21['arguments'] = $array22;
$arguments21['additionalAttributes'] = NULL;
$arguments21['data'] = NULL;
$arguments21['controller'] = NULL;
$arguments21['package'] = NULL;
$arguments21['subpackage'] = NULL;
$arguments21['object'] = NULL;
$arguments21['section'] = '';
$arguments21['format'] = '';
$arguments21['additionalParams'] = array (
);
$arguments21['absolute'] = false;
$arguments21['addQueryString'] = false;
$arguments21['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments21['fieldNamePrefix'] = NULL;
$arguments21['actionUri'] = NULL;
$arguments21['objectName'] = NULL;
$arguments21['useParentRequest'] = false;
$arguments21['enctype'] = NULL;
$arguments21['method'] = NULL;
$arguments21['name'] = NULL;
$arguments21['onreset'] = NULL;
$arguments21['onsubmit'] = NULL;
$arguments21['class'] = NULL;
$arguments21['dir'] = NULL;
$arguments21['id'] = NULL;
$arguments21['lang'] = NULL;
$arguments21['style'] = NULL;
$arguments21['title'] = NULL;
$arguments21['accesskey'] = NULL;
$arguments21['tabindex'] = NULL;
$arguments21['onclick'] = NULL;
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
$output24 = '';

$output24 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments25 = array();
$arguments25['value'] = 'Delete';
$arguments25['additionalAttributes'] = NULL;
$arguments25['data'] = NULL;
$arguments25['name'] = NULL;
$arguments25['property'] = NULL;
$arguments25['disabled'] = NULL;
$arguments25['class'] = NULL;
$arguments25['dir'] = NULL;
$arguments25['id'] = NULL;
$arguments25['lang'] = NULL;
$arguments25['style'] = NULL;
$arguments25['title'] = NULL;
$arguments25['accesskey'] = NULL;
$arguments25['tabindex'] = NULL;
$arguments25['onclick'] = NULL;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper27 = $self->getViewHelper('$viewHelper27', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper27->setArguments($arguments25);
$viewHelper27->setRenderingContext($renderingContext);
$viewHelper27->setRenderChildrenClosure($renderChildrenClosure26);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output24 .= $viewHelper27->initializeArgumentsAndRender();

$output24 .= '
						';
return $output24;
};
$viewHelper28 = $self->getViewHelper('$viewHelper28', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper28->setArguments($arguments21);
$viewHelper28->setRenderingContext($renderingContext);
$viewHelper28->setRenderChildrenClosure($renderChildrenClosure23);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output9 .= $viewHelper28->initializeArgumentsAndRender();

$output9 .= '
					</li>
				';
return $output9;
};

$output6 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);

$output6 .= '
			</ul>
		';
return $output6;
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper29->setArguments($arguments4);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output3 .= $viewHelper29->initializeArgumentsAndRender();

$output3 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments30 = array();
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper32 = $self->getViewHelper('$viewHelper32', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper32->setArguments($arguments30);
$viewHelper32->setRenderingContext($renderingContext);
$viewHelper32->setRenderChildrenClosure($renderChildrenClosure31);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output3 .= $viewHelper32->initializeArgumentsAndRender();

$output3 .= '
	';
return $output3;
};
$arguments1['__thenClosure'] = function() use ($renderingContext, $self) {
$output33 = '';

$output33 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments34 = array();
$arguments34['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments34['as'] = 'form';
$arguments34['key'] = '';
$arguments34['reverse'] = false;
$arguments34['iteration'] = NULL;
$renderChildrenClosure35 = function() use ($renderingContext, $self) {
$output36 = '';

$output36 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments37 = array();
$arguments37['action'] = 'show';
// Rendering Array
$array38 = array();
$array38['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments37['arguments'] = $array38;
$arguments37['additionalAttributes'] = NULL;
$arguments37['data'] = NULL;
$arguments37['controller'] = NULL;
$arguments37['package'] = NULL;
$arguments37['subpackage'] = NULL;
$arguments37['section'] = '';
$arguments37['format'] = '';
$arguments37['additionalParams'] = array (
);
$arguments37['addQueryString'] = false;
$arguments37['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments37['useParentRequest'] = false;
$arguments37['absolute'] = true;
$arguments37['class'] = NULL;
$arguments37['dir'] = NULL;
$arguments37['id'] = NULL;
$arguments37['lang'] = NULL;
$arguments37['style'] = NULL;
$arguments37['title'] = NULL;
$arguments37['accesskey'] = NULL;
$arguments37['tabindex'] = NULL;
$arguments37['onclick'] = NULL;
$arguments37['name'] = NULL;
$arguments37['rel'] = NULL;
$arguments37['rev'] = NULL;
$arguments37['target'] = NULL;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
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
return !is_string($value42) && !(is_object($value42) && method_exists($value42, '__toString')) ? $value42 : htmlspecialchars($value42, ($arguments40['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments40['encoding'], $arguments40['doubleEncode']);
};
$viewHelper43 = $self->getViewHelper('$viewHelper43', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper43->setArguments($arguments37);
$viewHelper43->setRenderingContext($renderingContext);
$viewHelper43->setRenderChildrenClosure($renderChildrenClosure39);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output36 .= $viewHelper43->initializeArgumentsAndRender();

$output36 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments44 = array();
$arguments44['action'] = 'edit';
// Rendering Array
$array45 = array();
$array45['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments44['arguments'] = $array45;
$arguments44['additionalAttributes'] = NULL;
$arguments44['data'] = NULL;
$arguments44['controller'] = NULL;
$arguments44['package'] = NULL;
$arguments44['subpackage'] = NULL;
$arguments44['section'] = '';
$arguments44['format'] = '';
$arguments44['additionalParams'] = array (
);
$arguments44['addQueryString'] = false;
$arguments44['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments44['useParentRequest'] = false;
$arguments44['absolute'] = true;
$arguments44['class'] = NULL;
$arguments44['dir'] = NULL;
$arguments44['id'] = NULL;
$arguments44['lang'] = NULL;
$arguments44['style'] = NULL;
$arguments44['title'] = NULL;
$arguments44['accesskey'] = NULL;
$arguments44['tabindex'] = NULL;
$arguments44['onclick'] = NULL;
$arguments44['name'] = NULL;
$arguments44['rel'] = NULL;
$arguments44['rev'] = NULL;
$arguments44['target'] = NULL;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper47 = $self->getViewHelper('$viewHelper47', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper47->setArguments($arguments44);
$viewHelper47->setRenderingContext($renderingContext);
$viewHelper47->setRenderChildrenClosure($renderChildrenClosure46);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output36 .= $viewHelper47->initializeArgumentsAndRender();

$output36 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments48 = array();
$arguments48['action'] = 'delete';
// Rendering Array
$array49 = array();
$array49['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments48['arguments'] = $array49;
$arguments48['additionalAttributes'] = NULL;
$arguments48['data'] = NULL;
$arguments48['controller'] = NULL;
$arguments48['package'] = NULL;
$arguments48['subpackage'] = NULL;
$arguments48['object'] = NULL;
$arguments48['section'] = '';
$arguments48['format'] = '';
$arguments48['additionalParams'] = array (
);
$arguments48['absolute'] = false;
$arguments48['addQueryString'] = false;
$arguments48['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments48['fieldNamePrefix'] = NULL;
$arguments48['actionUri'] = NULL;
$arguments48['objectName'] = NULL;
$arguments48['useParentRequest'] = false;
$arguments48['enctype'] = NULL;
$arguments48['method'] = NULL;
$arguments48['name'] = NULL;
$arguments48['onreset'] = NULL;
$arguments48['onsubmit'] = NULL;
$arguments48['class'] = NULL;
$arguments48['dir'] = NULL;
$arguments48['id'] = NULL;
$arguments48['lang'] = NULL;
$arguments48['style'] = NULL;
$arguments48['title'] = NULL;
$arguments48['accesskey'] = NULL;
$arguments48['tabindex'] = NULL;
$arguments48['onclick'] = NULL;
$renderChildrenClosure50 = function() use ($renderingContext, $self) {
$output51 = '';

$output51 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments52 = array();
$arguments52['value'] = 'Delete';
$arguments52['additionalAttributes'] = NULL;
$arguments52['data'] = NULL;
$arguments52['name'] = NULL;
$arguments52['property'] = NULL;
$arguments52['disabled'] = NULL;
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
return NULL;
};
$viewHelper54 = $self->getViewHelper('$viewHelper54', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper54->setArguments($arguments52);
$viewHelper54->setRenderingContext($renderingContext);
$viewHelper54->setRenderChildrenClosure($renderChildrenClosure53);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output51 .= $viewHelper54->initializeArgumentsAndRender();

$output51 .= '
						';
return $output51;
};
$viewHelper55 = $self->getViewHelper('$viewHelper55', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper55->setArguments($arguments48);
$viewHelper55->setRenderingContext($renderingContext);
$viewHelper55->setRenderChildrenClosure($renderChildrenClosure50);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output36 .= $viewHelper55->initializeArgumentsAndRender();

$output36 .= '
					</li>
				';
return $output36;
};

$output33 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments34, $renderChildrenClosure35, $renderingContext);

$output33 .= '
			</ul>
		';
return $output33;
};
$arguments1['__elseClosure'] = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper56 = $self->getViewHelper('$viewHelper56', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper56->setArguments($arguments1);
$viewHelper56->setRenderingContext($renderingContext);
$viewHelper56->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper56->initializeArgumentsAndRender();

$output0 .= '
	<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments57 = array();
$arguments57['action'] = 'new';
$arguments57['additionalAttributes'] = NULL;
$arguments57['data'] = NULL;
$arguments57['arguments'] = array (
);
$arguments57['controller'] = NULL;
$arguments57['package'] = NULL;
$arguments57['subpackage'] = NULL;
$arguments57['section'] = '';
$arguments57['format'] = '';
$arguments57['additionalParams'] = array (
);
$arguments57['addQueryString'] = false;
$arguments57['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments57['useParentRequest'] = false;
$arguments57['absolute'] = true;
$arguments57['class'] = NULL;
$arguments57['dir'] = NULL;
$arguments57['id'] = NULL;
$arguments57['lang'] = NULL;
$arguments57['style'] = NULL;
$arguments57['title'] = NULL;
$arguments57['accesskey'] = NULL;
$arguments57['tabindex'] = NULL;
$arguments57['onclick'] = NULL;
$arguments57['name'] = NULL;
$arguments57['rel'] = NULL;
$arguments57['rev'] = NULL;
$arguments57['target'] = NULL;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
return 'Create a new form';
};
$viewHelper59 = $self->getViewHelper('$viewHelper59', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper59->setArguments($arguments57);
$viewHelper59->setRenderingContext($renderingContext);
$viewHelper59->setRenderChildrenClosure($renderChildrenClosure58);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper59->initializeArgumentsAndRender();

$output0 .= '</p>
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output60 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments61 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments62 = array();
$arguments62['name'] = 'Default';
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper64 = $self->getViewHelper('$viewHelper64', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper64->setArguments($arguments62);
$viewHelper64->setRenderingContext($renderingContext);
$viewHelper64->setRenderChildrenClosure($renderChildrenClosure63);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments61['value'] = $viewHelper64->initializeArgumentsAndRender();
$arguments61['keepQuotes'] = false;
$arguments61['encoding'] = 'UTF-8';
$arguments61['doubleEncode'] = true;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return NULL;
};
$value66 = ($arguments61['value'] !== NULL ? $arguments61['value'] : $renderChildrenClosure65());

$output60 .= !is_string($value66) && !(is_object($value66) && method_exists($value66, '__toString')) ? $value66 : htmlspecialchars($value66, ($arguments61['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments61['encoding'], $arguments61['doubleEncode']);

$output60 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments67 = array();
$arguments67['name'] = 'Title';
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return 'A list of forms';
};

$output60 .= '';

$output60 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments69 = array();
$arguments69['name'] = 'stylesheet';
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};

$output60 .= '';

$output60 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments71 = array();
$arguments71['name'] = 'Content';
$renderChildrenClosure72 = function() use ($renderingContext, $self) {
$output73 = '';

$output73 .= '
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments74 = array();
// Rendering Boolean node
$arguments74['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments74['then'] = NULL;
$arguments74['else'] = NULL;
$renderChildrenClosure75 = function() use ($renderingContext, $self) {
$output76 = '';

$output76 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments77 = array();
$renderChildrenClosure78 = function() use ($renderingContext, $self) {
$output79 = '';

$output79 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments80 = array();
$arguments80['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments80['as'] = 'form';
$arguments80['key'] = '';
$arguments80['reverse'] = false;
$arguments80['iteration'] = NULL;
$renderChildrenClosure81 = function() use ($renderingContext, $self) {
$output82 = '';

$output82 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments83 = array();
$arguments83['action'] = 'show';
// Rendering Array
$array84 = array();
$array84['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments83['arguments'] = $array84;
$arguments83['additionalAttributes'] = NULL;
$arguments83['data'] = NULL;
$arguments83['controller'] = NULL;
$arguments83['package'] = NULL;
$arguments83['subpackage'] = NULL;
$arguments83['section'] = '';
$arguments83['format'] = '';
$arguments83['additionalParams'] = array (
);
$arguments83['addQueryString'] = false;
$arguments83['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments83['useParentRequest'] = false;
$arguments83['absolute'] = true;
$arguments83['class'] = NULL;
$arguments83['dir'] = NULL;
$arguments83['id'] = NULL;
$arguments83['lang'] = NULL;
$arguments83['style'] = NULL;
$arguments83['title'] = NULL;
$arguments83['accesskey'] = NULL;
$arguments83['tabindex'] = NULL;
$arguments83['onclick'] = NULL;
$arguments83['name'] = NULL;
$arguments83['rel'] = NULL;
$arguments83['rev'] = NULL;
$arguments83['target'] = NULL;
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments86 = array();
$arguments86['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments86['keepQuotes'] = false;
$arguments86['encoding'] = 'UTF-8';
$arguments86['doubleEncode'] = true;
$renderChildrenClosure87 = function() use ($renderingContext, $self) {
return NULL;
};
$value88 = ($arguments86['value'] !== NULL ? $arguments86['value'] : $renderChildrenClosure87());
return !is_string($value88) && !(is_object($value88) && method_exists($value88, '__toString')) ? $value88 : htmlspecialchars($value88, ($arguments86['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments86['encoding'], $arguments86['doubleEncode']);
};
$viewHelper89 = $self->getViewHelper('$viewHelper89', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper89->setArguments($arguments83);
$viewHelper89->setRenderingContext($renderingContext);
$viewHelper89->setRenderChildrenClosure($renderChildrenClosure85);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output82 .= $viewHelper89->initializeArgumentsAndRender();

$output82 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments90 = array();
$arguments90['action'] = 'edit';
// Rendering Array
$array91 = array();
$array91['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments90['arguments'] = $array91;
$arguments90['additionalAttributes'] = NULL;
$arguments90['data'] = NULL;
$arguments90['controller'] = NULL;
$arguments90['package'] = NULL;
$arguments90['subpackage'] = NULL;
$arguments90['section'] = '';
$arguments90['format'] = '';
$arguments90['additionalParams'] = array (
);
$arguments90['addQueryString'] = false;
$arguments90['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments90['useParentRequest'] = false;
$arguments90['absolute'] = true;
$arguments90['class'] = NULL;
$arguments90['dir'] = NULL;
$arguments90['id'] = NULL;
$arguments90['lang'] = NULL;
$arguments90['style'] = NULL;
$arguments90['title'] = NULL;
$arguments90['accesskey'] = NULL;
$arguments90['tabindex'] = NULL;
$arguments90['onclick'] = NULL;
$arguments90['name'] = NULL;
$arguments90['rel'] = NULL;
$arguments90['rev'] = NULL;
$arguments90['target'] = NULL;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper93 = $self->getViewHelper('$viewHelper93', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper93->setArguments($arguments90);
$viewHelper93->setRenderingContext($renderingContext);
$viewHelper93->setRenderChildrenClosure($renderChildrenClosure92);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output82 .= $viewHelper93->initializeArgumentsAndRender();

$output82 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments94 = array();
$arguments94['action'] = 'delete';
// Rendering Array
$array95 = array();
$array95['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments94['arguments'] = $array95;
$arguments94['additionalAttributes'] = NULL;
$arguments94['data'] = NULL;
$arguments94['controller'] = NULL;
$arguments94['package'] = NULL;
$arguments94['subpackage'] = NULL;
$arguments94['object'] = NULL;
$arguments94['section'] = '';
$arguments94['format'] = '';
$arguments94['additionalParams'] = array (
);
$arguments94['absolute'] = false;
$arguments94['addQueryString'] = false;
$arguments94['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments94['fieldNamePrefix'] = NULL;
$arguments94['actionUri'] = NULL;
$arguments94['objectName'] = NULL;
$arguments94['useParentRequest'] = false;
$arguments94['enctype'] = NULL;
$arguments94['method'] = NULL;
$arguments94['name'] = NULL;
$arguments94['onreset'] = NULL;
$arguments94['onsubmit'] = NULL;
$arguments94['class'] = NULL;
$arguments94['dir'] = NULL;
$arguments94['id'] = NULL;
$arguments94['lang'] = NULL;
$arguments94['style'] = NULL;
$arguments94['title'] = NULL;
$arguments94['accesskey'] = NULL;
$arguments94['tabindex'] = NULL;
$arguments94['onclick'] = NULL;
$renderChildrenClosure96 = function() use ($renderingContext, $self) {
$output97 = '';

$output97 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments98 = array();
$arguments98['value'] = 'Delete';
$arguments98['additionalAttributes'] = NULL;
$arguments98['data'] = NULL;
$arguments98['name'] = NULL;
$arguments98['property'] = NULL;
$arguments98['disabled'] = NULL;
$arguments98['class'] = NULL;
$arguments98['dir'] = NULL;
$arguments98['id'] = NULL;
$arguments98['lang'] = NULL;
$arguments98['style'] = NULL;
$arguments98['title'] = NULL;
$arguments98['accesskey'] = NULL;
$arguments98['tabindex'] = NULL;
$arguments98['onclick'] = NULL;
$renderChildrenClosure99 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper100 = $self->getViewHelper('$viewHelper100', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper100->setArguments($arguments98);
$viewHelper100->setRenderingContext($renderingContext);
$viewHelper100->setRenderChildrenClosure($renderChildrenClosure99);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output97 .= $viewHelper100->initializeArgumentsAndRender();

$output97 .= '
						';
return $output97;
};
$viewHelper101 = $self->getViewHelper('$viewHelper101', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper101->setArguments($arguments94);
$viewHelper101->setRenderingContext($renderingContext);
$viewHelper101->setRenderChildrenClosure($renderChildrenClosure96);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output82 .= $viewHelper101->initializeArgumentsAndRender();

$output82 .= '
					</li>
				';
return $output82;
};

$output79 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments80, $renderChildrenClosure81, $renderingContext);

$output79 .= '
			</ul>
		';
return $output79;
};
$viewHelper102 = $self->getViewHelper('$viewHelper102', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper102->setArguments($arguments77);
$viewHelper102->setRenderingContext($renderingContext);
$viewHelper102->setRenderChildrenClosure($renderChildrenClosure78);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output76 .= $viewHelper102->initializeArgumentsAndRender();

$output76 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments103 = array();
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper105 = $self->getViewHelper('$viewHelper105', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper105->setArguments($arguments103);
$viewHelper105->setRenderingContext($renderingContext);
$viewHelper105->setRenderChildrenClosure($renderChildrenClosure104);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output76 .= $viewHelper105->initializeArgumentsAndRender();

$output76 .= '
	';
return $output76;
};
$arguments74['__thenClosure'] = function() use ($renderingContext, $self) {
$output106 = '';

$output106 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments107 = array();
$arguments107['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments107['as'] = 'form';
$arguments107['key'] = '';
$arguments107['reverse'] = false;
$arguments107['iteration'] = NULL;
$renderChildrenClosure108 = function() use ($renderingContext, $self) {
$output109 = '';

$output109 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments110 = array();
$arguments110['action'] = 'show';
// Rendering Array
$array111 = array();
$array111['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments110['arguments'] = $array111;
$arguments110['additionalAttributes'] = NULL;
$arguments110['data'] = NULL;
$arguments110['controller'] = NULL;
$arguments110['package'] = NULL;
$arguments110['subpackage'] = NULL;
$arguments110['section'] = '';
$arguments110['format'] = '';
$arguments110['additionalParams'] = array (
);
$arguments110['addQueryString'] = false;
$arguments110['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments110['useParentRequest'] = false;
$arguments110['absolute'] = true;
$arguments110['class'] = NULL;
$arguments110['dir'] = NULL;
$arguments110['id'] = NULL;
$arguments110['lang'] = NULL;
$arguments110['style'] = NULL;
$arguments110['title'] = NULL;
$arguments110['accesskey'] = NULL;
$arguments110['tabindex'] = NULL;
$arguments110['onclick'] = NULL;
$arguments110['name'] = NULL;
$arguments110['rel'] = NULL;
$arguments110['rev'] = NULL;
$arguments110['target'] = NULL;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments113 = array();
$arguments113['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments113['keepQuotes'] = false;
$arguments113['encoding'] = 'UTF-8';
$arguments113['doubleEncode'] = true;
$renderChildrenClosure114 = function() use ($renderingContext, $self) {
return NULL;
};
$value115 = ($arguments113['value'] !== NULL ? $arguments113['value'] : $renderChildrenClosure114());
return !is_string($value115) && !(is_object($value115) && method_exists($value115, '__toString')) ? $value115 : htmlspecialchars($value115, ($arguments113['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments113['encoding'], $arguments113['doubleEncode']);
};
$viewHelper116 = $self->getViewHelper('$viewHelper116', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper116->setArguments($arguments110);
$viewHelper116->setRenderingContext($renderingContext);
$viewHelper116->setRenderChildrenClosure($renderChildrenClosure112);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output109 .= $viewHelper116->initializeArgumentsAndRender();

$output109 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments117 = array();
$arguments117['action'] = 'edit';
// Rendering Array
$array118 = array();
$array118['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments117['arguments'] = $array118;
$arguments117['additionalAttributes'] = NULL;
$arguments117['data'] = NULL;
$arguments117['controller'] = NULL;
$arguments117['package'] = NULL;
$arguments117['subpackage'] = NULL;
$arguments117['section'] = '';
$arguments117['format'] = '';
$arguments117['additionalParams'] = array (
);
$arguments117['addQueryString'] = false;
$arguments117['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments117['useParentRequest'] = false;
$arguments117['absolute'] = true;
$arguments117['class'] = NULL;
$arguments117['dir'] = NULL;
$arguments117['id'] = NULL;
$arguments117['lang'] = NULL;
$arguments117['style'] = NULL;
$arguments117['title'] = NULL;
$arguments117['accesskey'] = NULL;
$arguments117['tabindex'] = NULL;
$arguments117['onclick'] = NULL;
$arguments117['name'] = NULL;
$arguments117['rel'] = NULL;
$arguments117['rev'] = NULL;
$arguments117['target'] = NULL;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper120 = $self->getViewHelper('$viewHelper120', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper120->setArguments($arguments117);
$viewHelper120->setRenderingContext($renderingContext);
$viewHelper120->setRenderChildrenClosure($renderChildrenClosure119);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output109 .= $viewHelper120->initializeArgumentsAndRender();

$output109 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments121 = array();
$arguments121['action'] = 'delete';
// Rendering Array
$array122 = array();
$array122['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments121['arguments'] = $array122;
$arguments121['additionalAttributes'] = NULL;
$arguments121['data'] = NULL;
$arguments121['controller'] = NULL;
$arguments121['package'] = NULL;
$arguments121['subpackage'] = NULL;
$arguments121['object'] = NULL;
$arguments121['section'] = '';
$arguments121['format'] = '';
$arguments121['additionalParams'] = array (
);
$arguments121['absolute'] = false;
$arguments121['addQueryString'] = false;
$arguments121['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments121['fieldNamePrefix'] = NULL;
$arguments121['actionUri'] = NULL;
$arguments121['objectName'] = NULL;
$arguments121['useParentRequest'] = false;
$arguments121['enctype'] = NULL;
$arguments121['method'] = NULL;
$arguments121['name'] = NULL;
$arguments121['onreset'] = NULL;
$arguments121['onsubmit'] = NULL;
$arguments121['class'] = NULL;
$arguments121['dir'] = NULL;
$arguments121['id'] = NULL;
$arguments121['lang'] = NULL;
$arguments121['style'] = NULL;
$arguments121['title'] = NULL;
$arguments121['accesskey'] = NULL;
$arguments121['tabindex'] = NULL;
$arguments121['onclick'] = NULL;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
$output124 = '';

$output124 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments125 = array();
$arguments125['value'] = 'Delete';
$arguments125['additionalAttributes'] = NULL;
$arguments125['data'] = NULL;
$arguments125['name'] = NULL;
$arguments125['property'] = NULL;
$arguments125['disabled'] = NULL;
$arguments125['class'] = NULL;
$arguments125['dir'] = NULL;
$arguments125['id'] = NULL;
$arguments125['lang'] = NULL;
$arguments125['style'] = NULL;
$arguments125['title'] = NULL;
$arguments125['accesskey'] = NULL;
$arguments125['tabindex'] = NULL;
$arguments125['onclick'] = NULL;
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper127 = $self->getViewHelper('$viewHelper127', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper127->setArguments($arguments125);
$viewHelper127->setRenderingContext($renderingContext);
$viewHelper127->setRenderChildrenClosure($renderChildrenClosure126);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output124 .= $viewHelper127->initializeArgumentsAndRender();

$output124 .= '
						';
return $output124;
};
$viewHelper128 = $self->getViewHelper('$viewHelper128', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper128->setArguments($arguments121);
$viewHelper128->setRenderingContext($renderingContext);
$viewHelper128->setRenderChildrenClosure($renderChildrenClosure123);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output109 .= $viewHelper128->initializeArgumentsAndRender();

$output109 .= '
					</li>
				';
return $output109;
};

$output106 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments107, $renderChildrenClosure108, $renderingContext);

$output106 .= '
			</ul>
		';
return $output106;
};
$arguments74['__elseClosure'] = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper129 = $self->getViewHelper('$viewHelper129', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper129->setArguments($arguments74);
$viewHelper129->setRenderingContext($renderingContext);
$viewHelper129->setRenderChildrenClosure($renderChildrenClosure75);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output73 .= $viewHelper129->initializeArgumentsAndRender();

$output73 .= '
	<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments130 = array();
$arguments130['action'] = 'new';
$arguments130['additionalAttributes'] = NULL;
$arguments130['data'] = NULL;
$arguments130['arguments'] = array (
);
$arguments130['controller'] = NULL;
$arguments130['package'] = NULL;
$arguments130['subpackage'] = NULL;
$arguments130['section'] = '';
$arguments130['format'] = '';
$arguments130['additionalParams'] = array (
);
$arguments130['addQueryString'] = false;
$arguments130['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments130['useParentRequest'] = false;
$arguments130['absolute'] = true;
$arguments130['class'] = NULL;
$arguments130['dir'] = NULL;
$arguments130['id'] = NULL;
$arguments130['lang'] = NULL;
$arguments130['style'] = NULL;
$arguments130['title'] = NULL;
$arguments130['accesskey'] = NULL;
$arguments130['tabindex'] = NULL;
$arguments130['onclick'] = NULL;
$arguments130['name'] = NULL;
$arguments130['rel'] = NULL;
$arguments130['rev'] = NULL;
$arguments130['target'] = NULL;
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
return 'Create a new form';
};
$viewHelper132 = $self->getViewHelper('$viewHelper132', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper132->setArguments($arguments130);
$viewHelper132->setRenderingContext($renderingContext);
$viewHelper132->setRenderChildrenClosure($renderChildrenClosure131);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output73 .= $viewHelper132->initializeArgumentsAndRender();

$output73 .= '</p>
';
return $output73;
};

$output60 .= '';

return $output60;
}


}
#0             44049     