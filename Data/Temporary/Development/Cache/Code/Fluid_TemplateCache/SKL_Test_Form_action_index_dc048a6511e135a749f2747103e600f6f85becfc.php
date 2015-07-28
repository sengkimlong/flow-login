<?php class FluidCache_SKL_Test_Form_action_index_dc048a6511e135a749f2747103e600f6f85becfc extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

return NULL;
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
	<!-- ';
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

$output0 .= ' -->
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

	<nav class="navbar navbar-default">
	  <div class="container">
	      <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	          </button>
	          <a href="" class="navbar-brand">Team 2</a>
	      </div> <!-- End navbar-header -->

	      <div class="collapse navbar-collapse" id="navigation">
	          <ul class="nav navbar-nav navbar-right">
	              <li id="list-1" class="item active"><a href="">Home</a></li>

								<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments60 = array();
$arguments60['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments60['keepQuotes'] = false;
$arguments60['encoding'] = 'UTF-8';
$arguments60['doubleEncode'] = true;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};
$value62 = ($arguments60['value'] !== NULL ? $arguments60['value'] : $renderChildrenClosure61());

$output0 .= !is_string($value62) && !(is_object($value62) && method_exists($value62, '__toString')) ? $value62 : htmlspecialchars($value62, ($arguments60['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments60['encoding'], $arguments60['doubleEncode']);

$output0 .= '" class="item"><a id="form-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments63 = array();
$arguments63['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments63['keepQuotes'] = false;
$arguments63['encoding'] = 'UTF-8';
$arguments63['doubleEncode'] = true;
$renderChildrenClosure64 = function() use ($renderingContext, $self) {
return NULL;
};
$value65 = ($arguments63['value'] !== NULL ? $arguments63['value'] : $renderChildrenClosure64());

$output0 .= !is_string($value65) && !(is_object($value65) && method_exists($value65, '__toString')) ? $value65 : htmlspecialchars($value65, ($arguments63['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments63['encoding'], $arguments63['doubleEncode']);

$output0 .= '" class="list" role="button" >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments66 = array();
$arguments66['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments66['keepQuotes'] = false;
$arguments66['encoding'] = 'UTF-8';
$arguments66['doubleEncode'] = true;
$renderChildrenClosure67 = function() use ($renderingContext, $self) {
return NULL;
};
$value68 = ($arguments66['value'] !== NULL ? $arguments66['value'] : $renderChildrenClosure67());

$output0 .= !is_string($value68) && !(is_object($value68) && method_exists($value68, '__toString')) ? $value68 : htmlspecialchars($value68, ($arguments66['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments66['encoding'], $arguments66['doubleEncode']);

$output0 .= '</a></li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments69 = array();
// Rendering Boolean node
$arguments69['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments69['then'] = NULL;
$arguments69['else'] = NULL;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
$output71 = '';

$output71 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments72 = array();
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
$output74 = '';

$output74 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments75 = array();
$arguments75['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments75['as'] = 'form';
$arguments75['iteration'] = 'key';
$arguments75['key'] = '';
$arguments75['reverse'] = false;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
$output77 = '';

$output77 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments78 = array();
$arguments78['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments78['keepQuotes'] = false;
$arguments78['encoding'] = 'UTF-8';
$arguments78['doubleEncode'] = true;
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
return NULL;
};
$value80 = ($arguments78['value'] !== NULL ? $arguments78['value'] : $renderChildrenClosure79());

$output77 .= !is_string($value80) && !(is_object($value80) && method_exists($value80, '__toString')) ? $value80 : htmlspecialchars($value80, ($arguments78['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments78['encoding'], $arguments78['doubleEncode']);

$output77 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments81 = array();
$arguments81['action'] = 'show';
// Rendering Array
$array82 = array();
$array82['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments81['arguments'] = $array82;
$output83 = '';

$output83 .= 'form-';

$output83 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments81['id'] = $output83;
$arguments81['class'] = 'list';
$arguments81['additionalAttributes'] = NULL;
$arguments81['data'] = NULL;
$arguments81['controller'] = NULL;
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
$arguments81['dir'] = NULL;
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
$renderChildrenClosure84 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments85 = array();
$arguments85['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments85['keepQuotes'] = false;
$arguments85['encoding'] = 'UTF-8';
$arguments85['doubleEncode'] = true;
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
return NULL;
};
$value87 = ($arguments85['value'] !== NULL ? $arguments85['value'] : $renderChildrenClosure86());
return !is_string($value87) && !(is_object($value87) && method_exists($value87, '__toString')) ? $value87 : htmlspecialchars($value87, ($arguments85['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments85['encoding'], $arguments85['doubleEncode']);
};
$viewHelper88 = $self->getViewHelper('$viewHelper88', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper88->setArguments($arguments81);
$viewHelper88->setRenderingContext($renderingContext);
$viewHelper88->setRenderChildrenClosure($renderChildrenClosure84);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output77 .= $viewHelper88->initializeArgumentsAndRender();

$output77 .= '
												</li>
											';
return $output77;
};

$output74 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments75, $renderChildrenClosure76, $renderingContext);

$output74 .= '
									';
return $output74;
};
$viewHelper89 = $self->getViewHelper('$viewHelper89', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper89->setArguments($arguments72);
$viewHelper89->setRenderingContext($renderingContext);
$viewHelper89->setRenderChildrenClosure($renderChildrenClosure73);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output71 .= $viewHelper89->initializeArgumentsAndRender();

$output71 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments90 = array();
$renderChildrenClosure91 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper92 = $self->getViewHelper('$viewHelper92', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper92->setArguments($arguments90);
$viewHelper92->setRenderingContext($renderingContext);
$viewHelper92->setRenderChildrenClosure($renderChildrenClosure91);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output71 .= $viewHelper92->initializeArgumentsAndRender();

$output71 .= '
								';
return $output71;
};
$arguments69['__thenClosure'] = function() use ($renderingContext, $self) {
$output93 = '';

$output93 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments94 = array();
$arguments94['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments94['as'] = 'form';
$arguments94['iteration'] = 'key';
$arguments94['key'] = '';
$arguments94['reverse'] = false;
$renderChildrenClosure95 = function() use ($renderingContext, $self) {
$output96 = '';

$output96 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments97 = array();
$arguments97['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments97['keepQuotes'] = false;
$arguments97['encoding'] = 'UTF-8';
$arguments97['doubleEncode'] = true;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
return NULL;
};
$value99 = ($arguments97['value'] !== NULL ? $arguments97['value'] : $renderChildrenClosure98());

$output96 .= !is_string($value99) && !(is_object($value99) && method_exists($value99, '__toString')) ? $value99 : htmlspecialchars($value99, ($arguments97['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments97['encoding'], $arguments97['doubleEncode']);

$output96 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments100 = array();
$arguments100['action'] = 'show';
// Rendering Array
$array101 = array();
$array101['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments100['arguments'] = $array101;
$output102 = '';

$output102 .= 'form-';

$output102 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments100['id'] = $output102;
$arguments100['class'] = 'list';
$arguments100['additionalAttributes'] = NULL;
$arguments100['data'] = NULL;
$arguments100['controller'] = NULL;
$arguments100['package'] = NULL;
$arguments100['subpackage'] = NULL;
$arguments100['section'] = '';
$arguments100['format'] = '';
$arguments100['additionalParams'] = array (
);
$arguments100['addQueryString'] = false;
$arguments100['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments100['useParentRequest'] = false;
$arguments100['absolute'] = true;
$arguments100['dir'] = NULL;
$arguments100['lang'] = NULL;
$arguments100['style'] = NULL;
$arguments100['title'] = NULL;
$arguments100['accesskey'] = NULL;
$arguments100['tabindex'] = NULL;
$arguments100['onclick'] = NULL;
$arguments100['name'] = NULL;
$arguments100['rel'] = NULL;
$arguments100['rev'] = NULL;
$arguments100['target'] = NULL;
$renderChildrenClosure103 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments104 = array();
$arguments104['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments104['keepQuotes'] = false;
$arguments104['encoding'] = 'UTF-8';
$arguments104['doubleEncode'] = true;
$renderChildrenClosure105 = function() use ($renderingContext, $self) {
return NULL;
};
$value106 = ($arguments104['value'] !== NULL ? $arguments104['value'] : $renderChildrenClosure105());
return !is_string($value106) && !(is_object($value106) && method_exists($value106, '__toString')) ? $value106 : htmlspecialchars($value106, ($arguments104['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments104['encoding'], $arguments104['doubleEncode']);
};
$viewHelper107 = $self->getViewHelper('$viewHelper107', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper107->setArguments($arguments100);
$viewHelper107->setRenderingContext($renderingContext);
$viewHelper107->setRenderChildrenClosure($renderChildrenClosure103);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output96 .= $viewHelper107->initializeArgumentsAndRender();

$output96 .= '
												</li>
											';
return $output96;
};

$output93 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments94, $renderChildrenClosure95, $renderingContext);

$output93 .= '
									';
return $output93;
};
$arguments69['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper108 = $self->getViewHelper('$viewHelper108', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper108->setArguments($arguments69);
$viewHelper108->setRenderingContext($renderingContext);
$viewHelper108->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper108->initializeArgumentsAndRender();

$output0 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments109 = array();
$arguments109['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments109['keepQuotes'] = false;
$arguments109['encoding'] = 'UTF-8';
$arguments109['doubleEncode'] = true;
$renderChildrenClosure110 = function() use ($renderingContext, $self) {
return NULL;
};
$value111 = ($arguments109['value'] !== NULL ? $arguments109['value'] : $renderChildrenClosure110());

$output0 .= !is_string($value111) && !(is_object($value111) && method_exists($value111, '__toString')) ? $value111 : htmlspecialchars($value111, ($arguments109['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments109['encoding'], $arguments109['doubleEncode']);

$output0 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments112 = array();
$arguments112['action'] = 'logout';
$arguments112['additionalAttributes'] = NULL;
$arguments112['data'] = NULL;
$arguments112['arguments'] = array (
);
$arguments112['controller'] = NULL;
$arguments112['package'] = NULL;
$arguments112['subpackage'] = NULL;
$arguments112['section'] = '';
$arguments112['format'] = '';
$arguments112['additionalParams'] = array (
);
$arguments112['addQueryString'] = false;
$arguments112['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments112['useParentRequest'] = false;
$arguments112['absolute'] = true;
$arguments112['class'] = NULL;
$arguments112['dir'] = NULL;
$arguments112['id'] = NULL;
$arguments112['lang'] = NULL;
$arguments112['style'] = NULL;
$arguments112['title'] = NULL;
$arguments112['accesskey'] = NULL;
$arguments112['tabindex'] = NULL;
$arguments112['onclick'] = NULL;
$arguments112['name'] = NULL;
$arguments112['rel'] = NULL;
$arguments112['rev'] = NULL;
$arguments112['target'] = NULL;
$renderChildrenClosure113 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper114 = $self->getViewHelper('$viewHelper114', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper114->setArguments($arguments112);
$viewHelper114->setRenderingContext($renderingContext);
$viewHelper114->setRenderChildrenClosure($renderChildrenClosure113);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper114->initializeArgumentsAndRender();

$output0 .= '</li>
	                  </ul>
	              </li>
	          </ul>
	      </div>

	  </div> <!-- End container-fluid -->
	</nav>

	<div class="container">
	  <div class="row">
	      <h3 id="listTitle" class="text-center" style="margin-bottom: 20px;margin-top: 0px;"></h3>
	  </div>
	</div>

	<div class="container">
	  <div id="questionList" class="row">
	      <div class="col-md-12 col-sm-12 col-xs-12">
	          <div class="jumbotron" style="padding: 5% 10%;">
	              <h1></h1>
	              <p id="content"></p>

	              <p class="text-right"><a id="next" class="btn btn-primary btn-lg" role="button">Next</a>
	              <a id="btn-frm1" class="btn btn-primary btn-lg" role="button" style="visibility:hidden">Go to Form1</a>
	  </p>
	          </div>
	      </div>

	      <!-- Question list here -->

	  </div>
	  <div id="btn-group" class="text-right">
	      <button class="btn btn-primary" type="button" name="Submit" data-toggle="modal" data-target="#myModal">Submit</button>
	      <button class="btn btn-danger" type="button" name="Cancel">Cancel</button>
	  </div>
	</div>

	<div class="container">
	  <div class="row">

	    <!-- Modal -->
	    <div id="myModal" class="modal fade" role="dialog">
	    <div class="modal-dialog">

	      <!-- Modal content-->
	      <div class="modal-content">
	        <!-- <div class="modal-header">
	          <h3>Your Answer here: </h3>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div> -->
	        <div class="modal-body" id="answerbody">
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <table id="answerContainer" class="table" style="display: none" border="0">
	                <tr>
	                    <th>Label:</th>
	                    <th>Answer:</th>
	                </tr>
	            </table>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>

	    </div>

	  </div>

	</div>

	</div>

';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output115 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments116 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments117 = array();
$arguments117['name'] = 'Default';
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper119 = $self->getViewHelper('$viewHelper119', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper119->setArguments($arguments117);
$viewHelper119->setRenderingContext($renderingContext);
$viewHelper119->setRenderChildrenClosure($renderChildrenClosure118);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments116['value'] = $viewHelper119->initializeArgumentsAndRender();
$arguments116['keepQuotes'] = false;
$arguments116['encoding'] = 'UTF-8';
$arguments116['doubleEncode'] = true;
$renderChildrenClosure120 = function() use ($renderingContext, $self) {
return NULL;
};
$value121 = ($arguments116['value'] !== NULL ? $arguments116['value'] : $renderChildrenClosure120());

$output115 .= !is_string($value121) && !(is_object($value121) && method_exists($value121, '__toString')) ? $value121 : htmlspecialchars($value121, ($arguments116['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments116['encoding'], $arguments116['doubleEncode']);

$output115 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments122 = array();
$arguments122['name'] = 'Title';
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
return NULL;
};

$output115 .= '';

$output115 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments124 = array();
$arguments124['name'] = 'stylesheet';
$renderChildrenClosure125 = function() use ($renderingContext, $self) {
return NULL;
};

$output115 .= '';

$output115 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments126 = array();
$arguments126['name'] = 'Content';
$renderChildrenClosure127 = function() use ($renderingContext, $self) {
$output128 = '';

$output128 .= '
	<!-- ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments129 = array();
// Rendering Boolean node
$arguments129['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments129['then'] = NULL;
$arguments129['else'] = NULL;
$renderChildrenClosure130 = function() use ($renderingContext, $self) {
$output131 = '';

$output131 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments132 = array();
$renderChildrenClosure133 = function() use ($renderingContext, $self) {
$output134 = '';

$output134 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments135 = array();
$arguments135['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments135['as'] = 'form';
$arguments135['key'] = '';
$arguments135['reverse'] = false;
$arguments135['iteration'] = NULL;
$renderChildrenClosure136 = function() use ($renderingContext, $self) {
$output137 = '';

$output137 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments138 = array();
$arguments138['action'] = 'show';
// Rendering Array
$array139 = array();
$array139['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments138['arguments'] = $array139;
$arguments138['additionalAttributes'] = NULL;
$arguments138['data'] = NULL;
$arguments138['controller'] = NULL;
$arguments138['package'] = NULL;
$arguments138['subpackage'] = NULL;
$arguments138['section'] = '';
$arguments138['format'] = '';
$arguments138['additionalParams'] = array (
);
$arguments138['addQueryString'] = false;
$arguments138['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments138['useParentRequest'] = false;
$arguments138['absolute'] = true;
$arguments138['class'] = NULL;
$arguments138['dir'] = NULL;
$arguments138['id'] = NULL;
$arguments138['lang'] = NULL;
$arguments138['style'] = NULL;
$arguments138['title'] = NULL;
$arguments138['accesskey'] = NULL;
$arguments138['tabindex'] = NULL;
$arguments138['onclick'] = NULL;
$arguments138['name'] = NULL;
$arguments138['rel'] = NULL;
$arguments138['rev'] = NULL;
$arguments138['target'] = NULL;
$renderChildrenClosure140 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments141 = array();
$arguments141['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments141['keepQuotes'] = false;
$arguments141['encoding'] = 'UTF-8';
$arguments141['doubleEncode'] = true;
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
return NULL;
};
$value143 = ($arguments141['value'] !== NULL ? $arguments141['value'] : $renderChildrenClosure142());
return !is_string($value143) && !(is_object($value143) && method_exists($value143, '__toString')) ? $value143 : htmlspecialchars($value143, ($arguments141['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments141['encoding'], $arguments141['doubleEncode']);
};
$viewHelper144 = $self->getViewHelper('$viewHelper144', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper144->setArguments($arguments138);
$viewHelper144->setRenderingContext($renderingContext);
$viewHelper144->setRenderChildrenClosure($renderChildrenClosure140);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output137 .= $viewHelper144->initializeArgumentsAndRender();

$output137 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments145 = array();
$arguments145['action'] = 'edit';
// Rendering Array
$array146 = array();
$array146['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments145['arguments'] = $array146;
$arguments145['additionalAttributes'] = NULL;
$arguments145['data'] = NULL;
$arguments145['controller'] = NULL;
$arguments145['package'] = NULL;
$arguments145['subpackage'] = NULL;
$arguments145['section'] = '';
$arguments145['format'] = '';
$arguments145['additionalParams'] = array (
);
$arguments145['addQueryString'] = false;
$arguments145['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments145['useParentRequest'] = false;
$arguments145['absolute'] = true;
$arguments145['class'] = NULL;
$arguments145['dir'] = NULL;
$arguments145['id'] = NULL;
$arguments145['lang'] = NULL;
$arguments145['style'] = NULL;
$arguments145['title'] = NULL;
$arguments145['accesskey'] = NULL;
$arguments145['tabindex'] = NULL;
$arguments145['onclick'] = NULL;
$arguments145['name'] = NULL;
$arguments145['rel'] = NULL;
$arguments145['rev'] = NULL;
$arguments145['target'] = NULL;
$renderChildrenClosure147 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper148 = $self->getViewHelper('$viewHelper148', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper148->setArguments($arguments145);
$viewHelper148->setRenderingContext($renderingContext);
$viewHelper148->setRenderChildrenClosure($renderChildrenClosure147);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output137 .= $viewHelper148->initializeArgumentsAndRender();

$output137 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments149 = array();
$arguments149['action'] = 'delete';
// Rendering Array
$array150 = array();
$array150['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments149['arguments'] = $array150;
$arguments149['additionalAttributes'] = NULL;
$arguments149['data'] = NULL;
$arguments149['controller'] = NULL;
$arguments149['package'] = NULL;
$arguments149['subpackage'] = NULL;
$arguments149['object'] = NULL;
$arguments149['section'] = '';
$arguments149['format'] = '';
$arguments149['additionalParams'] = array (
);
$arguments149['absolute'] = false;
$arguments149['addQueryString'] = false;
$arguments149['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments149['fieldNamePrefix'] = NULL;
$arguments149['actionUri'] = NULL;
$arguments149['objectName'] = NULL;
$arguments149['useParentRequest'] = false;
$arguments149['enctype'] = NULL;
$arguments149['method'] = NULL;
$arguments149['name'] = NULL;
$arguments149['onreset'] = NULL;
$arguments149['onsubmit'] = NULL;
$arguments149['class'] = NULL;
$arguments149['dir'] = NULL;
$arguments149['id'] = NULL;
$arguments149['lang'] = NULL;
$arguments149['style'] = NULL;
$arguments149['title'] = NULL;
$arguments149['accesskey'] = NULL;
$arguments149['tabindex'] = NULL;
$arguments149['onclick'] = NULL;
$renderChildrenClosure151 = function() use ($renderingContext, $self) {
$output152 = '';

$output152 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments153 = array();
$arguments153['value'] = 'Delete';
$arguments153['additionalAttributes'] = NULL;
$arguments153['data'] = NULL;
$arguments153['name'] = NULL;
$arguments153['property'] = NULL;
$arguments153['disabled'] = NULL;
$arguments153['class'] = NULL;
$arguments153['dir'] = NULL;
$arguments153['id'] = NULL;
$arguments153['lang'] = NULL;
$arguments153['style'] = NULL;
$arguments153['title'] = NULL;
$arguments153['accesskey'] = NULL;
$arguments153['tabindex'] = NULL;
$arguments153['onclick'] = NULL;
$renderChildrenClosure154 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper155 = $self->getViewHelper('$viewHelper155', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper155->setArguments($arguments153);
$viewHelper155->setRenderingContext($renderingContext);
$viewHelper155->setRenderChildrenClosure($renderChildrenClosure154);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output152 .= $viewHelper155->initializeArgumentsAndRender();

$output152 .= '
						';
return $output152;
};
$viewHelper156 = $self->getViewHelper('$viewHelper156', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper156->setArguments($arguments149);
$viewHelper156->setRenderingContext($renderingContext);
$viewHelper156->setRenderChildrenClosure($renderChildrenClosure151);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output137 .= $viewHelper156->initializeArgumentsAndRender();

$output137 .= '
					</li>
				';
return $output137;
};

$output134 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments135, $renderChildrenClosure136, $renderingContext);

$output134 .= '
			</ul>
		';
return $output134;
};
$viewHelper157 = $self->getViewHelper('$viewHelper157', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper157->setArguments($arguments132);
$viewHelper157->setRenderingContext($renderingContext);
$viewHelper157->setRenderChildrenClosure($renderChildrenClosure133);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output131 .= $viewHelper157->initializeArgumentsAndRender();

$output131 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments158 = array();
$renderChildrenClosure159 = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper160 = $self->getViewHelper('$viewHelper160', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper160->setArguments($arguments158);
$viewHelper160->setRenderingContext($renderingContext);
$viewHelper160->setRenderChildrenClosure($renderChildrenClosure159);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output131 .= $viewHelper160->initializeArgumentsAndRender();

$output131 .= '
	';
return $output131;
};
$arguments129['__thenClosure'] = function() use ($renderingContext, $self) {
$output161 = '';

$output161 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments162 = array();
$arguments162['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments162['as'] = 'form';
$arguments162['key'] = '';
$arguments162['reverse'] = false;
$arguments162['iteration'] = NULL;
$renderChildrenClosure163 = function() use ($renderingContext, $self) {
$output164 = '';

$output164 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments165 = array();
$arguments165['action'] = 'show';
// Rendering Array
$array166 = array();
$array166['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments165['arguments'] = $array166;
$arguments165['additionalAttributes'] = NULL;
$arguments165['data'] = NULL;
$arguments165['controller'] = NULL;
$arguments165['package'] = NULL;
$arguments165['subpackage'] = NULL;
$arguments165['section'] = '';
$arguments165['format'] = '';
$arguments165['additionalParams'] = array (
);
$arguments165['addQueryString'] = false;
$arguments165['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments165['useParentRequest'] = false;
$arguments165['absolute'] = true;
$arguments165['class'] = NULL;
$arguments165['dir'] = NULL;
$arguments165['id'] = NULL;
$arguments165['lang'] = NULL;
$arguments165['style'] = NULL;
$arguments165['title'] = NULL;
$arguments165['accesskey'] = NULL;
$arguments165['tabindex'] = NULL;
$arguments165['onclick'] = NULL;
$arguments165['name'] = NULL;
$arguments165['rel'] = NULL;
$arguments165['rev'] = NULL;
$arguments165['target'] = NULL;
$renderChildrenClosure167 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments168 = array();
$arguments168['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments168['keepQuotes'] = false;
$arguments168['encoding'] = 'UTF-8';
$arguments168['doubleEncode'] = true;
$renderChildrenClosure169 = function() use ($renderingContext, $self) {
return NULL;
};
$value170 = ($arguments168['value'] !== NULL ? $arguments168['value'] : $renderChildrenClosure169());
return !is_string($value170) && !(is_object($value170) && method_exists($value170, '__toString')) ? $value170 : htmlspecialchars($value170, ($arguments168['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments168['encoding'], $arguments168['doubleEncode']);
};
$viewHelper171 = $self->getViewHelper('$viewHelper171', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper171->setArguments($arguments165);
$viewHelper171->setRenderingContext($renderingContext);
$viewHelper171->setRenderChildrenClosure($renderChildrenClosure167);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output164 .= $viewHelper171->initializeArgumentsAndRender();

$output164 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments172 = array();
$arguments172['action'] = 'edit';
// Rendering Array
$array173 = array();
$array173['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments172['arguments'] = $array173;
$arguments172['additionalAttributes'] = NULL;
$arguments172['data'] = NULL;
$arguments172['controller'] = NULL;
$arguments172['package'] = NULL;
$arguments172['subpackage'] = NULL;
$arguments172['section'] = '';
$arguments172['format'] = '';
$arguments172['additionalParams'] = array (
);
$arguments172['addQueryString'] = false;
$arguments172['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments172['useParentRequest'] = false;
$arguments172['absolute'] = true;
$arguments172['class'] = NULL;
$arguments172['dir'] = NULL;
$arguments172['id'] = NULL;
$arguments172['lang'] = NULL;
$arguments172['style'] = NULL;
$arguments172['title'] = NULL;
$arguments172['accesskey'] = NULL;
$arguments172['tabindex'] = NULL;
$arguments172['onclick'] = NULL;
$arguments172['name'] = NULL;
$arguments172['rel'] = NULL;
$arguments172['rev'] = NULL;
$arguments172['target'] = NULL;
$renderChildrenClosure174 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper175 = $self->getViewHelper('$viewHelper175', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper175->setArguments($arguments172);
$viewHelper175->setRenderingContext($renderingContext);
$viewHelper175->setRenderChildrenClosure($renderChildrenClosure174);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output164 .= $viewHelper175->initializeArgumentsAndRender();

$output164 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments176 = array();
$arguments176['action'] = 'delete';
// Rendering Array
$array177 = array();
$array177['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments176['arguments'] = $array177;
$arguments176['additionalAttributes'] = NULL;
$arguments176['data'] = NULL;
$arguments176['controller'] = NULL;
$arguments176['package'] = NULL;
$arguments176['subpackage'] = NULL;
$arguments176['object'] = NULL;
$arguments176['section'] = '';
$arguments176['format'] = '';
$arguments176['additionalParams'] = array (
);
$arguments176['absolute'] = false;
$arguments176['addQueryString'] = false;
$arguments176['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments176['fieldNamePrefix'] = NULL;
$arguments176['actionUri'] = NULL;
$arguments176['objectName'] = NULL;
$arguments176['useParentRequest'] = false;
$arguments176['enctype'] = NULL;
$arguments176['method'] = NULL;
$arguments176['name'] = NULL;
$arguments176['onreset'] = NULL;
$arguments176['onsubmit'] = NULL;
$arguments176['class'] = NULL;
$arguments176['dir'] = NULL;
$arguments176['id'] = NULL;
$arguments176['lang'] = NULL;
$arguments176['style'] = NULL;
$arguments176['title'] = NULL;
$arguments176['accesskey'] = NULL;
$arguments176['tabindex'] = NULL;
$arguments176['onclick'] = NULL;
$renderChildrenClosure178 = function() use ($renderingContext, $self) {
$output179 = '';

$output179 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments180 = array();
$arguments180['value'] = 'Delete';
$arguments180['additionalAttributes'] = NULL;
$arguments180['data'] = NULL;
$arguments180['name'] = NULL;
$arguments180['property'] = NULL;
$arguments180['disabled'] = NULL;
$arguments180['class'] = NULL;
$arguments180['dir'] = NULL;
$arguments180['id'] = NULL;
$arguments180['lang'] = NULL;
$arguments180['style'] = NULL;
$arguments180['title'] = NULL;
$arguments180['accesskey'] = NULL;
$arguments180['tabindex'] = NULL;
$arguments180['onclick'] = NULL;
$renderChildrenClosure181 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper182 = $self->getViewHelper('$viewHelper182', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper182->setArguments($arguments180);
$viewHelper182->setRenderingContext($renderingContext);
$viewHelper182->setRenderChildrenClosure($renderChildrenClosure181);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output179 .= $viewHelper182->initializeArgumentsAndRender();

$output179 .= '
						';
return $output179;
};
$viewHelper183 = $self->getViewHelper('$viewHelper183', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper183->setArguments($arguments176);
$viewHelper183->setRenderingContext($renderingContext);
$viewHelper183->setRenderChildrenClosure($renderChildrenClosure178);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output164 .= $viewHelper183->initializeArgumentsAndRender();

$output164 .= '
					</li>
				';
return $output164;
};

$output161 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments162, $renderChildrenClosure163, $renderingContext);

$output161 .= '
			</ul>
		';
return $output161;
};
$arguments129['__elseClosure'] = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper184 = $self->getViewHelper('$viewHelper184', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper184->setArguments($arguments129);
$viewHelper184->setRenderingContext($renderingContext);
$viewHelper184->setRenderChildrenClosure($renderChildrenClosure130);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output128 .= $viewHelper184->initializeArgumentsAndRender();

$output128 .= ' -->
	<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments185 = array();
$arguments185['action'] = 'new';
$arguments185['additionalAttributes'] = NULL;
$arguments185['data'] = NULL;
$arguments185['arguments'] = array (
);
$arguments185['controller'] = NULL;
$arguments185['package'] = NULL;
$arguments185['subpackage'] = NULL;
$arguments185['section'] = '';
$arguments185['format'] = '';
$arguments185['additionalParams'] = array (
);
$arguments185['addQueryString'] = false;
$arguments185['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments185['useParentRequest'] = false;
$arguments185['absolute'] = true;
$arguments185['class'] = NULL;
$arguments185['dir'] = NULL;
$arguments185['id'] = NULL;
$arguments185['lang'] = NULL;
$arguments185['style'] = NULL;
$arguments185['title'] = NULL;
$arguments185['accesskey'] = NULL;
$arguments185['tabindex'] = NULL;
$arguments185['onclick'] = NULL;
$arguments185['name'] = NULL;
$arguments185['rel'] = NULL;
$arguments185['rev'] = NULL;
$arguments185['target'] = NULL;
$renderChildrenClosure186 = function() use ($renderingContext, $self) {
return 'Create a new form';
};
$viewHelper187 = $self->getViewHelper('$viewHelper187', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper187->setArguments($arguments185);
$viewHelper187->setRenderingContext($renderingContext);
$viewHelper187->setRenderChildrenClosure($renderChildrenClosure186);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output128 .= $viewHelper187->initializeArgumentsAndRender();

$output128 .= '</p>

	<nav class="navbar navbar-default">
	  <div class="container">
	      <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	          </button>
	          <a href="" class="navbar-brand">Team 2</a>
	      </div> <!-- End navbar-header -->

	      <div class="collapse navbar-collapse" id="navigation">
	          <ul class="nav navbar-nav navbar-right">
	              <li id="list-1" class="item active"><a href="">Home</a></li>

								<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments188 = array();
$arguments188['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments188['keepQuotes'] = false;
$arguments188['encoding'] = 'UTF-8';
$arguments188['doubleEncode'] = true;
$renderChildrenClosure189 = function() use ($renderingContext, $self) {
return NULL;
};
$value190 = ($arguments188['value'] !== NULL ? $arguments188['value'] : $renderChildrenClosure189());

$output128 .= !is_string($value190) && !(is_object($value190) && method_exists($value190, '__toString')) ? $value190 : htmlspecialchars($value190, ($arguments188['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments188['encoding'], $arguments188['doubleEncode']);

$output128 .= '" class="item"><a id="form-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments191 = array();
$arguments191['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments191['keepQuotes'] = false;
$arguments191['encoding'] = 'UTF-8';
$arguments191['doubleEncode'] = true;
$renderChildrenClosure192 = function() use ($renderingContext, $self) {
return NULL;
};
$value193 = ($arguments191['value'] !== NULL ? $arguments191['value'] : $renderChildrenClosure192());

$output128 .= !is_string($value193) && !(is_object($value193) && method_exists($value193, '__toString')) ? $value193 : htmlspecialchars($value193, ($arguments191['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments191['encoding'], $arguments191['doubleEncode']);

$output128 .= '" class="list" role="button" >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments194 = array();
$arguments194['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments194['keepQuotes'] = false;
$arguments194['encoding'] = 'UTF-8';
$arguments194['doubleEncode'] = true;
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return NULL;
};
$value196 = ($arguments194['value'] !== NULL ? $arguments194['value'] : $renderChildrenClosure195());

$output128 .= !is_string($value196) && !(is_object($value196) && method_exists($value196, '__toString')) ? $value196 : htmlspecialchars($value196, ($arguments194['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments194['encoding'], $arguments194['doubleEncode']);

$output128 .= '</a></li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments197 = array();
// Rendering Boolean node
$arguments197['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments197['then'] = NULL;
$arguments197['else'] = NULL;
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
$output199 = '';

$output199 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments200 = array();
$renderChildrenClosure201 = function() use ($renderingContext, $self) {
$output202 = '';

$output202 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments203 = array();
$arguments203['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments203['as'] = 'form';
$arguments203['iteration'] = 'key';
$arguments203['key'] = '';
$arguments203['reverse'] = false;
$renderChildrenClosure204 = function() use ($renderingContext, $self) {
$output205 = '';

$output205 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments206 = array();
$arguments206['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments206['keepQuotes'] = false;
$arguments206['encoding'] = 'UTF-8';
$arguments206['doubleEncode'] = true;
$renderChildrenClosure207 = function() use ($renderingContext, $self) {
return NULL;
};
$value208 = ($arguments206['value'] !== NULL ? $arguments206['value'] : $renderChildrenClosure207());

$output205 .= !is_string($value208) && !(is_object($value208) && method_exists($value208, '__toString')) ? $value208 : htmlspecialchars($value208, ($arguments206['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments206['encoding'], $arguments206['doubleEncode']);

$output205 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments209 = array();
$arguments209['action'] = 'show';
// Rendering Array
$array210 = array();
$array210['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments209['arguments'] = $array210;
$output211 = '';

$output211 .= 'form-';

$output211 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments209['id'] = $output211;
$arguments209['class'] = 'list';
$arguments209['additionalAttributes'] = NULL;
$arguments209['data'] = NULL;
$arguments209['controller'] = NULL;
$arguments209['package'] = NULL;
$arguments209['subpackage'] = NULL;
$arguments209['section'] = '';
$arguments209['format'] = '';
$arguments209['additionalParams'] = array (
);
$arguments209['addQueryString'] = false;
$arguments209['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments209['useParentRequest'] = false;
$arguments209['absolute'] = true;
$arguments209['dir'] = NULL;
$arguments209['lang'] = NULL;
$arguments209['style'] = NULL;
$arguments209['title'] = NULL;
$arguments209['accesskey'] = NULL;
$arguments209['tabindex'] = NULL;
$arguments209['onclick'] = NULL;
$arguments209['name'] = NULL;
$arguments209['rel'] = NULL;
$arguments209['rev'] = NULL;
$arguments209['target'] = NULL;
$renderChildrenClosure212 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments213 = array();
$arguments213['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments213['keepQuotes'] = false;
$arguments213['encoding'] = 'UTF-8';
$arguments213['doubleEncode'] = true;
$renderChildrenClosure214 = function() use ($renderingContext, $self) {
return NULL;
};
$value215 = ($arguments213['value'] !== NULL ? $arguments213['value'] : $renderChildrenClosure214());
return !is_string($value215) && !(is_object($value215) && method_exists($value215, '__toString')) ? $value215 : htmlspecialchars($value215, ($arguments213['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments213['encoding'], $arguments213['doubleEncode']);
};
$viewHelper216 = $self->getViewHelper('$viewHelper216', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper216->setArguments($arguments209);
$viewHelper216->setRenderingContext($renderingContext);
$viewHelper216->setRenderChildrenClosure($renderChildrenClosure212);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output205 .= $viewHelper216->initializeArgumentsAndRender();

$output205 .= '
												</li>
											';
return $output205;
};

$output202 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments203, $renderChildrenClosure204, $renderingContext);

$output202 .= '
									';
return $output202;
};
$viewHelper217 = $self->getViewHelper('$viewHelper217', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper217->setArguments($arguments200);
$viewHelper217->setRenderingContext($renderingContext);
$viewHelper217->setRenderChildrenClosure($renderChildrenClosure201);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output199 .= $viewHelper217->initializeArgumentsAndRender();

$output199 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments218 = array();
$renderChildrenClosure219 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper220 = $self->getViewHelper('$viewHelper220', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper220->setArguments($arguments218);
$viewHelper220->setRenderingContext($renderingContext);
$viewHelper220->setRenderChildrenClosure($renderChildrenClosure219);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output199 .= $viewHelper220->initializeArgumentsAndRender();

$output199 .= '
								';
return $output199;
};
$arguments197['__thenClosure'] = function() use ($renderingContext, $self) {
$output221 = '';

$output221 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments222 = array();
$arguments222['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments222['as'] = 'form';
$arguments222['iteration'] = 'key';
$arguments222['key'] = '';
$arguments222['reverse'] = false;
$renderChildrenClosure223 = function() use ($renderingContext, $self) {
$output224 = '';

$output224 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments225 = array();
$arguments225['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments225['keepQuotes'] = false;
$arguments225['encoding'] = 'UTF-8';
$arguments225['doubleEncode'] = true;
$renderChildrenClosure226 = function() use ($renderingContext, $self) {
return NULL;
};
$value227 = ($arguments225['value'] !== NULL ? $arguments225['value'] : $renderChildrenClosure226());

$output224 .= !is_string($value227) && !(is_object($value227) && method_exists($value227, '__toString')) ? $value227 : htmlspecialchars($value227, ($arguments225['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments225['encoding'], $arguments225['doubleEncode']);

$output224 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments228 = array();
$arguments228['action'] = 'show';
// Rendering Array
$array229 = array();
$array229['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments228['arguments'] = $array229;
$output230 = '';

$output230 .= 'form-';

$output230 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments228['id'] = $output230;
$arguments228['class'] = 'list';
$arguments228['additionalAttributes'] = NULL;
$arguments228['data'] = NULL;
$arguments228['controller'] = NULL;
$arguments228['package'] = NULL;
$arguments228['subpackage'] = NULL;
$arguments228['section'] = '';
$arguments228['format'] = '';
$arguments228['additionalParams'] = array (
);
$arguments228['addQueryString'] = false;
$arguments228['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments228['useParentRequest'] = false;
$arguments228['absolute'] = true;
$arguments228['dir'] = NULL;
$arguments228['lang'] = NULL;
$arguments228['style'] = NULL;
$arguments228['title'] = NULL;
$arguments228['accesskey'] = NULL;
$arguments228['tabindex'] = NULL;
$arguments228['onclick'] = NULL;
$arguments228['name'] = NULL;
$arguments228['rel'] = NULL;
$arguments228['rev'] = NULL;
$arguments228['target'] = NULL;
$renderChildrenClosure231 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments232 = array();
$arguments232['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments232['keepQuotes'] = false;
$arguments232['encoding'] = 'UTF-8';
$arguments232['doubleEncode'] = true;
$renderChildrenClosure233 = function() use ($renderingContext, $self) {
return NULL;
};
$value234 = ($arguments232['value'] !== NULL ? $arguments232['value'] : $renderChildrenClosure233());
return !is_string($value234) && !(is_object($value234) && method_exists($value234, '__toString')) ? $value234 : htmlspecialchars($value234, ($arguments232['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments232['encoding'], $arguments232['doubleEncode']);
};
$viewHelper235 = $self->getViewHelper('$viewHelper235', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper235->setArguments($arguments228);
$viewHelper235->setRenderingContext($renderingContext);
$viewHelper235->setRenderChildrenClosure($renderChildrenClosure231);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output224 .= $viewHelper235->initializeArgumentsAndRender();

$output224 .= '
												</li>
											';
return $output224;
};

$output221 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments222, $renderChildrenClosure223, $renderingContext);

$output221 .= '
									';
return $output221;
};
$arguments197['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper236 = $self->getViewHelper('$viewHelper236', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper236->setArguments($arguments197);
$viewHelper236->setRenderingContext($renderingContext);
$viewHelper236->setRenderChildrenClosure($renderChildrenClosure198);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output128 .= $viewHelper236->initializeArgumentsAndRender();

$output128 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments237 = array();
$arguments237['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments237['keepQuotes'] = false;
$arguments237['encoding'] = 'UTF-8';
$arguments237['doubleEncode'] = true;
$renderChildrenClosure238 = function() use ($renderingContext, $self) {
return NULL;
};
$value239 = ($arguments237['value'] !== NULL ? $arguments237['value'] : $renderChildrenClosure238());

$output128 .= !is_string($value239) && !(is_object($value239) && method_exists($value239, '__toString')) ? $value239 : htmlspecialchars($value239, ($arguments237['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments237['encoding'], $arguments237['doubleEncode']);

$output128 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments240 = array();
$arguments240['action'] = 'logout';
$arguments240['additionalAttributes'] = NULL;
$arguments240['data'] = NULL;
$arguments240['arguments'] = array (
);
$arguments240['controller'] = NULL;
$arguments240['package'] = NULL;
$arguments240['subpackage'] = NULL;
$arguments240['section'] = '';
$arguments240['format'] = '';
$arguments240['additionalParams'] = array (
);
$arguments240['addQueryString'] = false;
$arguments240['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments240['useParentRequest'] = false;
$arguments240['absolute'] = true;
$arguments240['class'] = NULL;
$arguments240['dir'] = NULL;
$arguments240['id'] = NULL;
$arguments240['lang'] = NULL;
$arguments240['style'] = NULL;
$arguments240['title'] = NULL;
$arguments240['accesskey'] = NULL;
$arguments240['tabindex'] = NULL;
$arguments240['onclick'] = NULL;
$arguments240['name'] = NULL;
$arguments240['rel'] = NULL;
$arguments240['rev'] = NULL;
$arguments240['target'] = NULL;
$renderChildrenClosure241 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper242 = $self->getViewHelper('$viewHelper242', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper242->setArguments($arguments240);
$viewHelper242->setRenderingContext($renderingContext);
$viewHelper242->setRenderChildrenClosure($renderChildrenClosure241);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output128 .= $viewHelper242->initializeArgumentsAndRender();

$output128 .= '</li>
	                  </ul>
	              </li>
	          </ul>
	      </div>

	  </div> <!-- End container-fluid -->
	</nav>

	<div class="container">
	  <div class="row">
	      <h3 id="listTitle" class="text-center" style="margin-bottom: 20px;margin-top: 0px;"></h3>
	  </div>
	</div>

	<div class="container">
	  <div id="questionList" class="row">
	      <div class="col-md-12 col-sm-12 col-xs-12">
	          <div class="jumbotron" style="padding: 5% 10%;">
	              <h1></h1>
	              <p id="content"></p>

	              <p class="text-right"><a id="next" class="btn btn-primary btn-lg" role="button">Next</a>
	              <a id="btn-frm1" class="btn btn-primary btn-lg" role="button" style="visibility:hidden">Go to Form1</a>
	  </p>
	          </div>
	      </div>

	      <!-- Question list here -->

	  </div>
	  <div id="btn-group" class="text-right">
	      <button class="btn btn-primary" type="button" name="Submit" data-toggle="modal" data-target="#myModal">Submit</button>
	      <button class="btn btn-danger" type="button" name="Cancel">Cancel</button>
	  </div>
	</div>

	<div class="container">
	  <div class="row">

	    <!-- Modal -->
	    <div id="myModal" class="modal fade" role="dialog">
	    <div class="modal-dialog">

	      <!-- Modal content-->
	      <div class="modal-content">
	        <!-- <div class="modal-header">
	          <h3>Your Answer here: </h3>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div> -->
	        <div class="modal-body" id="answerbody">
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	            <table id="answerContainer" class="table" style="display: none" border="0">
	                <tr>
	                    <th>Label:</th>
	                    <th>Answer:</th>
	                </tr>
	            </table>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>

	    </div>

	  </div>

	</div>

	</div>

';
return $output128;
};

$output115 .= '';

$output115 .= '
';

return $output115;
}


}
#0             83907     