<?php class FluidCache_SKL_Test_Form_action_index_2184c47476fbdc859120ce1a2b597ffb5ca5bf71 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
	              <li id="list-1" class="item active">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments60 = array();
$arguments60['action'] = 'index';
$arguments60['controller'] = 'Form';
$arguments60['additionalAttributes'] = NULL;
$arguments60['data'] = NULL;
$arguments60['arguments'] = array (
);
$arguments60['package'] = NULL;
$arguments60['subpackage'] = NULL;
$arguments60['section'] = '';
$arguments60['format'] = '';
$arguments60['additionalParams'] = array (
);
$arguments60['addQueryString'] = false;
$arguments60['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments60['useParentRequest'] = false;
$arguments60['absolute'] = true;
$arguments60['class'] = NULL;
$arguments60['dir'] = NULL;
$arguments60['id'] = NULL;
$arguments60['lang'] = NULL;
$arguments60['style'] = NULL;
$arguments60['title'] = NULL;
$arguments60['accesskey'] = NULL;
$arguments60['tabindex'] = NULL;
$arguments60['onclick'] = NULL;
$arguments60['name'] = NULL;
$arguments60['rel'] = NULL;
$arguments60['rev'] = NULL;
$arguments60['target'] = NULL;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper62 = $self->getViewHelper('$viewHelper62', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper62->setArguments($arguments60);
$viewHelper62->setRenderingContext($renderingContext);
$viewHelper62->setRenderChildrenClosure($renderChildrenClosure61);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper62->initializeArgumentsAndRender();

$output0 .= '</li>

								<li id="list-';
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

$output0 .= '" class="item"><a id="form-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments66 = array();
$arguments66['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments66['keepQuotes'] = false;
$arguments66['encoding'] = 'UTF-8';
$arguments66['doubleEncode'] = true;
$renderChildrenClosure67 = function() use ($renderingContext, $self) {
return NULL;
};
$value68 = ($arguments66['value'] !== NULL ? $arguments66['value'] : $renderChildrenClosure67());

$output0 .= !is_string($value68) && !(is_object($value68) && method_exists($value68, '__toString')) ? $value68 : htmlspecialchars($value68, ($arguments66['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments66['encoding'], $arguments66['doubleEncode']);

$output0 .= '" class="list" role="button" >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments69 = array();
$arguments69['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments69['keepQuotes'] = false;
$arguments69['encoding'] = 'UTF-8';
$arguments69['doubleEncode'] = true;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$value71 = ($arguments69['value'] !== NULL ? $arguments69['value'] : $renderChildrenClosure70());

$output0 .= !is_string($value71) && !(is_object($value71) && method_exists($value71, '__toString')) ? $value71 : htmlspecialchars($value71, ($arguments69['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments69['encoding'], $arguments69['doubleEncode']);

$output0 .= '</a></li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments72 = array();
// Rendering Boolean node
$arguments72['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments72['then'] = NULL;
$arguments72['else'] = NULL;
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
$output74 = '';

$output74 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments75 = array();
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
$output77 = '';

$output77 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments78 = array();
$arguments78['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments78['as'] = 'form';
$arguments78['iteration'] = 'key';
$arguments78['key'] = '';
$arguments78['reverse'] = false;
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
$output80 = '';

$output80 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments81 = array();
$arguments81['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments81['keepQuotes'] = false;
$arguments81['encoding'] = 'UTF-8';
$arguments81['doubleEncode'] = true;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
return NULL;
};
$value83 = ($arguments81['value'] !== NULL ? $arguments81['value'] : $renderChildrenClosure82());

$output80 .= !is_string($value83) && !(is_object($value83) && method_exists($value83, '__toString')) ? $value83 : htmlspecialchars($value83, ($arguments81['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments81['encoding'], $arguments81['doubleEncode']);

$output80 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments84 = array();
$arguments84['action'] = 'show';
// Rendering Array
$array85 = array();
$array85['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments84['arguments'] = $array85;
$output86 = '';

$output86 .= 'form-';

$output86 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments84['id'] = $output86;
$arguments84['class'] = 'list';
$arguments84['additionalAttributes'] = NULL;
$arguments84['data'] = NULL;
$arguments84['controller'] = NULL;
$arguments84['package'] = NULL;
$arguments84['subpackage'] = NULL;
$arguments84['section'] = '';
$arguments84['format'] = '';
$arguments84['additionalParams'] = array (
);
$arguments84['addQueryString'] = false;
$arguments84['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments84['useParentRequest'] = false;
$arguments84['absolute'] = true;
$arguments84['dir'] = NULL;
$arguments84['lang'] = NULL;
$arguments84['style'] = NULL;
$arguments84['title'] = NULL;
$arguments84['accesskey'] = NULL;
$arguments84['tabindex'] = NULL;
$arguments84['onclick'] = NULL;
$arguments84['name'] = NULL;
$arguments84['rel'] = NULL;
$arguments84['rev'] = NULL;
$arguments84['target'] = NULL;
$renderChildrenClosure87 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments88 = array();
$arguments88['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments88['keepQuotes'] = false;
$arguments88['encoding'] = 'UTF-8';
$arguments88['doubleEncode'] = true;
$renderChildrenClosure89 = function() use ($renderingContext, $self) {
return NULL;
};
$value90 = ($arguments88['value'] !== NULL ? $arguments88['value'] : $renderChildrenClosure89());
return !is_string($value90) && !(is_object($value90) && method_exists($value90, '__toString')) ? $value90 : htmlspecialchars($value90, ($arguments88['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments88['encoding'], $arguments88['doubleEncode']);
};
$viewHelper91 = $self->getViewHelper('$viewHelper91', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper91->setArguments($arguments84);
$viewHelper91->setRenderingContext($renderingContext);
$viewHelper91->setRenderChildrenClosure($renderChildrenClosure87);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output80 .= $viewHelper91->initializeArgumentsAndRender();

$output80 .= '
												</li>
											';
return $output80;
};

$output77 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments78, $renderChildrenClosure79, $renderingContext);

$output77 .= '
									';
return $output77;
};
$viewHelper92 = $self->getViewHelper('$viewHelper92', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper92->setArguments($arguments75);
$viewHelper92->setRenderingContext($renderingContext);
$viewHelper92->setRenderChildrenClosure($renderChildrenClosure76);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output74 .= $viewHelper92->initializeArgumentsAndRender();

$output74 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments93 = array();
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper95 = $self->getViewHelper('$viewHelper95', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper95->setArguments($arguments93);
$viewHelper95->setRenderingContext($renderingContext);
$viewHelper95->setRenderChildrenClosure($renderChildrenClosure94);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output74 .= $viewHelper95->initializeArgumentsAndRender();

$output74 .= '
								';
return $output74;
};
$arguments72['__thenClosure'] = function() use ($renderingContext, $self) {
$output96 = '';

$output96 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments97 = array();
$arguments97['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments97['as'] = 'form';
$arguments97['iteration'] = 'key';
$arguments97['key'] = '';
$arguments97['reverse'] = false;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
$output99 = '';

$output99 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments100 = array();
$arguments100['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments100['keepQuotes'] = false;
$arguments100['encoding'] = 'UTF-8';
$arguments100['doubleEncode'] = true;
$renderChildrenClosure101 = function() use ($renderingContext, $self) {
return NULL;
};
$value102 = ($arguments100['value'] !== NULL ? $arguments100['value'] : $renderChildrenClosure101());

$output99 .= !is_string($value102) && !(is_object($value102) && method_exists($value102, '__toString')) ? $value102 : htmlspecialchars($value102, ($arguments100['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments100['encoding'], $arguments100['doubleEncode']);

$output99 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments103 = array();
$arguments103['action'] = 'show';
// Rendering Array
$array104 = array();
$array104['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments103['arguments'] = $array104;
$output105 = '';

$output105 .= 'form-';

$output105 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments103['id'] = $output105;
$arguments103['class'] = 'list';
$arguments103['additionalAttributes'] = NULL;
$arguments103['data'] = NULL;
$arguments103['controller'] = NULL;
$arguments103['package'] = NULL;
$arguments103['subpackage'] = NULL;
$arguments103['section'] = '';
$arguments103['format'] = '';
$arguments103['additionalParams'] = array (
);
$arguments103['addQueryString'] = false;
$arguments103['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments103['useParentRequest'] = false;
$arguments103['absolute'] = true;
$arguments103['dir'] = NULL;
$arguments103['lang'] = NULL;
$arguments103['style'] = NULL;
$arguments103['title'] = NULL;
$arguments103['accesskey'] = NULL;
$arguments103['tabindex'] = NULL;
$arguments103['onclick'] = NULL;
$arguments103['name'] = NULL;
$arguments103['rel'] = NULL;
$arguments103['rev'] = NULL;
$arguments103['target'] = NULL;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments107 = array();
$arguments107['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments107['keepQuotes'] = false;
$arguments107['encoding'] = 'UTF-8';
$arguments107['doubleEncode'] = true;
$renderChildrenClosure108 = function() use ($renderingContext, $self) {
return NULL;
};
$value109 = ($arguments107['value'] !== NULL ? $arguments107['value'] : $renderChildrenClosure108());
return !is_string($value109) && !(is_object($value109) && method_exists($value109, '__toString')) ? $value109 : htmlspecialchars($value109, ($arguments107['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments107['encoding'], $arguments107['doubleEncode']);
};
$viewHelper110 = $self->getViewHelper('$viewHelper110', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper110->setArguments($arguments103);
$viewHelper110->setRenderingContext($renderingContext);
$viewHelper110->setRenderChildrenClosure($renderChildrenClosure106);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output99 .= $viewHelper110->initializeArgumentsAndRender();

$output99 .= '
												</li>
											';
return $output99;
};

$output96 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments97, $renderChildrenClosure98, $renderingContext);

$output96 .= '
									';
return $output96;
};
$arguments72['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper111 = $self->getViewHelper('$viewHelper111', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper111->setArguments($arguments72);
$viewHelper111->setRenderingContext($renderingContext);
$viewHelper111->setRenderChildrenClosure($renderChildrenClosure73);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper111->initializeArgumentsAndRender();

$output0 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments112 = array();
$arguments112['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments112['keepQuotes'] = false;
$arguments112['encoding'] = 'UTF-8';
$arguments112['doubleEncode'] = true;
$renderChildrenClosure113 = function() use ($renderingContext, $self) {
return NULL;
};
$value114 = ($arguments112['value'] !== NULL ? $arguments112['value'] : $renderChildrenClosure113());

$output0 .= !is_string($value114) && !(is_object($value114) && method_exists($value114, '__toString')) ? $value114 : htmlspecialchars($value114, ($arguments112['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments112['encoding'], $arguments112['doubleEncode']);

$output0 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments115 = array();
$arguments115['action'] = 'logout';
$arguments115['additionalAttributes'] = NULL;
$arguments115['data'] = NULL;
$arguments115['arguments'] = array (
);
$arguments115['controller'] = NULL;
$arguments115['package'] = NULL;
$arguments115['subpackage'] = NULL;
$arguments115['section'] = '';
$arguments115['format'] = '';
$arguments115['additionalParams'] = array (
);
$arguments115['addQueryString'] = false;
$arguments115['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments115['useParentRequest'] = false;
$arguments115['absolute'] = true;
$arguments115['class'] = NULL;
$arguments115['dir'] = NULL;
$arguments115['id'] = NULL;
$arguments115['lang'] = NULL;
$arguments115['style'] = NULL;
$arguments115['title'] = NULL;
$arguments115['accesskey'] = NULL;
$arguments115['tabindex'] = NULL;
$arguments115['onclick'] = NULL;
$arguments115['name'] = NULL;
$arguments115['rel'] = NULL;
$arguments115['rev'] = NULL;
$arguments115['target'] = NULL;
$renderChildrenClosure116 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper117 = $self->getViewHelper('$viewHelper117', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper117->setArguments($arguments115);
$viewHelper117->setRenderingContext($renderingContext);
$viewHelper117->setRenderChildrenClosure($renderChildrenClosure116);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper117->initializeArgumentsAndRender();

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
$output118 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments119 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments120 = array();
$arguments120['name'] = 'Default';
$renderChildrenClosure121 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper122 = $self->getViewHelper('$viewHelper122', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper122->setArguments($arguments120);
$viewHelper122->setRenderingContext($renderingContext);
$viewHelper122->setRenderChildrenClosure($renderChildrenClosure121);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments119['value'] = $viewHelper122->initializeArgumentsAndRender();
$arguments119['keepQuotes'] = false;
$arguments119['encoding'] = 'UTF-8';
$arguments119['doubleEncode'] = true;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
return NULL;
};
$value124 = ($arguments119['value'] !== NULL ? $arguments119['value'] : $renderChildrenClosure123());

$output118 .= !is_string($value124) && !(is_object($value124) && method_exists($value124, '__toString')) ? $value124 : htmlspecialchars($value124, ($arguments119['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments119['encoding'], $arguments119['doubleEncode']);

$output118 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments125 = array();
$arguments125['name'] = 'Title';
$renderChildrenClosure126 = function() use ($renderingContext, $self) {
return NULL;
};

$output118 .= '';

$output118 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments127 = array();
$arguments127['name'] = 'stylesheet';
$renderChildrenClosure128 = function() use ($renderingContext, $self) {
return NULL;
};

$output118 .= '';

$output118 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments129 = array();
$arguments129['name'] = 'Content';
$renderChildrenClosure130 = function() use ($renderingContext, $self) {
$output131 = '';

$output131 .= '
	<!-- ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments132 = array();
// Rendering Boolean node
$arguments132['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments132['then'] = NULL;
$arguments132['else'] = NULL;
$renderChildrenClosure133 = function() use ($renderingContext, $self) {
$output134 = '';

$output134 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments135 = array();
$renderChildrenClosure136 = function() use ($renderingContext, $self) {
$output137 = '';

$output137 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments138 = array();
$arguments138['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments138['as'] = 'form';
$arguments138['key'] = '';
$arguments138['reverse'] = false;
$arguments138['iteration'] = NULL;
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
$output140 = '';

$output140 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments141 = array();
$arguments141['action'] = 'show';
// Rendering Array
$array142 = array();
$array142['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments141['arguments'] = $array142;
$arguments141['additionalAttributes'] = NULL;
$arguments141['data'] = NULL;
$arguments141['controller'] = NULL;
$arguments141['package'] = NULL;
$arguments141['subpackage'] = NULL;
$arguments141['section'] = '';
$arguments141['format'] = '';
$arguments141['additionalParams'] = array (
);
$arguments141['addQueryString'] = false;
$arguments141['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments141['useParentRequest'] = false;
$arguments141['absolute'] = true;
$arguments141['class'] = NULL;
$arguments141['dir'] = NULL;
$arguments141['id'] = NULL;
$arguments141['lang'] = NULL;
$arguments141['style'] = NULL;
$arguments141['title'] = NULL;
$arguments141['accesskey'] = NULL;
$arguments141['tabindex'] = NULL;
$arguments141['onclick'] = NULL;
$arguments141['name'] = NULL;
$arguments141['rel'] = NULL;
$arguments141['rev'] = NULL;
$arguments141['target'] = NULL;
$renderChildrenClosure143 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments144 = array();
$arguments144['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments144['keepQuotes'] = false;
$arguments144['encoding'] = 'UTF-8';
$arguments144['doubleEncode'] = true;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
return NULL;
};
$value146 = ($arguments144['value'] !== NULL ? $arguments144['value'] : $renderChildrenClosure145());
return !is_string($value146) && !(is_object($value146) && method_exists($value146, '__toString')) ? $value146 : htmlspecialchars($value146, ($arguments144['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments144['encoding'], $arguments144['doubleEncode']);
};
$viewHelper147 = $self->getViewHelper('$viewHelper147', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper147->setArguments($arguments141);
$viewHelper147->setRenderingContext($renderingContext);
$viewHelper147->setRenderChildrenClosure($renderChildrenClosure143);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output140 .= $viewHelper147->initializeArgumentsAndRender();

$output140 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments148 = array();
$arguments148['action'] = 'edit';
// Rendering Array
$array149 = array();
$array149['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments148['arguments'] = $array149;
$arguments148['additionalAttributes'] = NULL;
$arguments148['data'] = NULL;
$arguments148['controller'] = NULL;
$arguments148['package'] = NULL;
$arguments148['subpackage'] = NULL;
$arguments148['section'] = '';
$arguments148['format'] = '';
$arguments148['additionalParams'] = array (
);
$arguments148['addQueryString'] = false;
$arguments148['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments148['useParentRequest'] = false;
$arguments148['absolute'] = true;
$arguments148['class'] = NULL;
$arguments148['dir'] = NULL;
$arguments148['id'] = NULL;
$arguments148['lang'] = NULL;
$arguments148['style'] = NULL;
$arguments148['title'] = NULL;
$arguments148['accesskey'] = NULL;
$arguments148['tabindex'] = NULL;
$arguments148['onclick'] = NULL;
$arguments148['name'] = NULL;
$arguments148['rel'] = NULL;
$arguments148['rev'] = NULL;
$arguments148['target'] = NULL;
$renderChildrenClosure150 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper151 = $self->getViewHelper('$viewHelper151', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper151->setArguments($arguments148);
$viewHelper151->setRenderingContext($renderingContext);
$viewHelper151->setRenderChildrenClosure($renderChildrenClosure150);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output140 .= $viewHelper151->initializeArgumentsAndRender();

$output140 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments152 = array();
$arguments152['action'] = 'delete';
// Rendering Array
$array153 = array();
$array153['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments152['arguments'] = $array153;
$arguments152['additionalAttributes'] = NULL;
$arguments152['data'] = NULL;
$arguments152['controller'] = NULL;
$arguments152['package'] = NULL;
$arguments152['subpackage'] = NULL;
$arguments152['object'] = NULL;
$arguments152['section'] = '';
$arguments152['format'] = '';
$arguments152['additionalParams'] = array (
);
$arguments152['absolute'] = false;
$arguments152['addQueryString'] = false;
$arguments152['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments152['fieldNamePrefix'] = NULL;
$arguments152['actionUri'] = NULL;
$arguments152['objectName'] = NULL;
$arguments152['useParentRequest'] = false;
$arguments152['enctype'] = NULL;
$arguments152['method'] = NULL;
$arguments152['name'] = NULL;
$arguments152['onreset'] = NULL;
$arguments152['onsubmit'] = NULL;
$arguments152['class'] = NULL;
$arguments152['dir'] = NULL;
$arguments152['id'] = NULL;
$arguments152['lang'] = NULL;
$arguments152['style'] = NULL;
$arguments152['title'] = NULL;
$arguments152['accesskey'] = NULL;
$arguments152['tabindex'] = NULL;
$arguments152['onclick'] = NULL;
$renderChildrenClosure154 = function() use ($renderingContext, $self) {
$output155 = '';

$output155 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments156 = array();
$arguments156['value'] = 'Delete';
$arguments156['additionalAttributes'] = NULL;
$arguments156['data'] = NULL;
$arguments156['name'] = NULL;
$arguments156['property'] = NULL;
$arguments156['disabled'] = NULL;
$arguments156['class'] = NULL;
$arguments156['dir'] = NULL;
$arguments156['id'] = NULL;
$arguments156['lang'] = NULL;
$arguments156['style'] = NULL;
$arguments156['title'] = NULL;
$arguments156['accesskey'] = NULL;
$arguments156['tabindex'] = NULL;
$arguments156['onclick'] = NULL;
$renderChildrenClosure157 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper158 = $self->getViewHelper('$viewHelper158', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper158->setArguments($arguments156);
$viewHelper158->setRenderingContext($renderingContext);
$viewHelper158->setRenderChildrenClosure($renderChildrenClosure157);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output155 .= $viewHelper158->initializeArgumentsAndRender();

$output155 .= '
						';
return $output155;
};
$viewHelper159 = $self->getViewHelper('$viewHelper159', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper159->setArguments($arguments152);
$viewHelper159->setRenderingContext($renderingContext);
$viewHelper159->setRenderChildrenClosure($renderChildrenClosure154);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output140 .= $viewHelper159->initializeArgumentsAndRender();

$output140 .= '
					</li>
				';
return $output140;
};

$output137 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments138, $renderChildrenClosure139, $renderingContext);

$output137 .= '
			</ul>
		';
return $output137;
};
$viewHelper160 = $self->getViewHelper('$viewHelper160', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper160->setArguments($arguments135);
$viewHelper160->setRenderingContext($renderingContext);
$viewHelper160->setRenderChildrenClosure($renderChildrenClosure136);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output134 .= $viewHelper160->initializeArgumentsAndRender();

$output134 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments161 = array();
$renderChildrenClosure162 = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper163 = $self->getViewHelper('$viewHelper163', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper163->setArguments($arguments161);
$viewHelper163->setRenderingContext($renderingContext);
$viewHelper163->setRenderChildrenClosure($renderChildrenClosure162);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output134 .= $viewHelper163->initializeArgumentsAndRender();

$output134 .= '
	';
return $output134;
};
$arguments132['__thenClosure'] = function() use ($renderingContext, $self) {
$output164 = '';

$output164 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments165 = array();
$arguments165['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments165['as'] = 'form';
$arguments165['key'] = '';
$arguments165['reverse'] = false;
$arguments165['iteration'] = NULL;
$renderChildrenClosure166 = function() use ($renderingContext, $self) {
$output167 = '';

$output167 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments168 = array();
$arguments168['action'] = 'show';
// Rendering Array
$array169 = array();
$array169['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments168['arguments'] = $array169;
$arguments168['additionalAttributes'] = NULL;
$arguments168['data'] = NULL;
$arguments168['controller'] = NULL;
$arguments168['package'] = NULL;
$arguments168['subpackage'] = NULL;
$arguments168['section'] = '';
$arguments168['format'] = '';
$arguments168['additionalParams'] = array (
);
$arguments168['addQueryString'] = false;
$arguments168['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments168['useParentRequest'] = false;
$arguments168['absolute'] = true;
$arguments168['class'] = NULL;
$arguments168['dir'] = NULL;
$arguments168['id'] = NULL;
$arguments168['lang'] = NULL;
$arguments168['style'] = NULL;
$arguments168['title'] = NULL;
$arguments168['accesskey'] = NULL;
$arguments168['tabindex'] = NULL;
$arguments168['onclick'] = NULL;
$arguments168['name'] = NULL;
$arguments168['rel'] = NULL;
$arguments168['rev'] = NULL;
$arguments168['target'] = NULL;
$renderChildrenClosure170 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments171 = array();
$arguments171['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments171['keepQuotes'] = false;
$arguments171['encoding'] = 'UTF-8';
$arguments171['doubleEncode'] = true;
$renderChildrenClosure172 = function() use ($renderingContext, $self) {
return NULL;
};
$value173 = ($arguments171['value'] !== NULL ? $arguments171['value'] : $renderChildrenClosure172());
return !is_string($value173) && !(is_object($value173) && method_exists($value173, '__toString')) ? $value173 : htmlspecialchars($value173, ($arguments171['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments171['encoding'], $arguments171['doubleEncode']);
};
$viewHelper174 = $self->getViewHelper('$viewHelper174', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper174->setArguments($arguments168);
$viewHelper174->setRenderingContext($renderingContext);
$viewHelper174->setRenderChildrenClosure($renderChildrenClosure170);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output167 .= $viewHelper174->initializeArgumentsAndRender();

$output167 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments175 = array();
$arguments175['action'] = 'edit';
// Rendering Array
$array176 = array();
$array176['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments175['arguments'] = $array176;
$arguments175['additionalAttributes'] = NULL;
$arguments175['data'] = NULL;
$arguments175['controller'] = NULL;
$arguments175['package'] = NULL;
$arguments175['subpackage'] = NULL;
$arguments175['section'] = '';
$arguments175['format'] = '';
$arguments175['additionalParams'] = array (
);
$arguments175['addQueryString'] = false;
$arguments175['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments175['useParentRequest'] = false;
$arguments175['absolute'] = true;
$arguments175['class'] = NULL;
$arguments175['dir'] = NULL;
$arguments175['id'] = NULL;
$arguments175['lang'] = NULL;
$arguments175['style'] = NULL;
$arguments175['title'] = NULL;
$arguments175['accesskey'] = NULL;
$arguments175['tabindex'] = NULL;
$arguments175['onclick'] = NULL;
$arguments175['name'] = NULL;
$arguments175['rel'] = NULL;
$arguments175['rev'] = NULL;
$arguments175['target'] = NULL;
$renderChildrenClosure177 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper178 = $self->getViewHelper('$viewHelper178', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper178->setArguments($arguments175);
$viewHelper178->setRenderingContext($renderingContext);
$viewHelper178->setRenderChildrenClosure($renderChildrenClosure177);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output167 .= $viewHelper178->initializeArgumentsAndRender();

$output167 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments179 = array();
$arguments179['action'] = 'delete';
// Rendering Array
$array180 = array();
$array180['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments179['arguments'] = $array180;
$arguments179['additionalAttributes'] = NULL;
$arguments179['data'] = NULL;
$arguments179['controller'] = NULL;
$arguments179['package'] = NULL;
$arguments179['subpackage'] = NULL;
$arguments179['object'] = NULL;
$arguments179['section'] = '';
$arguments179['format'] = '';
$arguments179['additionalParams'] = array (
);
$arguments179['absolute'] = false;
$arguments179['addQueryString'] = false;
$arguments179['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments179['fieldNamePrefix'] = NULL;
$arguments179['actionUri'] = NULL;
$arguments179['objectName'] = NULL;
$arguments179['useParentRequest'] = false;
$arguments179['enctype'] = NULL;
$arguments179['method'] = NULL;
$arguments179['name'] = NULL;
$arguments179['onreset'] = NULL;
$arguments179['onsubmit'] = NULL;
$arguments179['class'] = NULL;
$arguments179['dir'] = NULL;
$arguments179['id'] = NULL;
$arguments179['lang'] = NULL;
$arguments179['style'] = NULL;
$arguments179['title'] = NULL;
$arguments179['accesskey'] = NULL;
$arguments179['tabindex'] = NULL;
$arguments179['onclick'] = NULL;
$renderChildrenClosure181 = function() use ($renderingContext, $self) {
$output182 = '';

$output182 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments183 = array();
$arguments183['value'] = 'Delete';
$arguments183['additionalAttributes'] = NULL;
$arguments183['data'] = NULL;
$arguments183['name'] = NULL;
$arguments183['property'] = NULL;
$arguments183['disabled'] = NULL;
$arguments183['class'] = NULL;
$arguments183['dir'] = NULL;
$arguments183['id'] = NULL;
$arguments183['lang'] = NULL;
$arguments183['style'] = NULL;
$arguments183['title'] = NULL;
$arguments183['accesskey'] = NULL;
$arguments183['tabindex'] = NULL;
$arguments183['onclick'] = NULL;
$renderChildrenClosure184 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper185 = $self->getViewHelper('$viewHelper185', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper185->setArguments($arguments183);
$viewHelper185->setRenderingContext($renderingContext);
$viewHelper185->setRenderChildrenClosure($renderChildrenClosure184);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output182 .= $viewHelper185->initializeArgumentsAndRender();

$output182 .= '
						';
return $output182;
};
$viewHelper186 = $self->getViewHelper('$viewHelper186', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper186->setArguments($arguments179);
$viewHelper186->setRenderingContext($renderingContext);
$viewHelper186->setRenderChildrenClosure($renderChildrenClosure181);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output167 .= $viewHelper186->initializeArgumentsAndRender();

$output167 .= '
					</li>
				';
return $output167;
};

$output164 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments165, $renderChildrenClosure166, $renderingContext);

$output164 .= '
			</ul>
		';
return $output164;
};
$arguments132['__elseClosure'] = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper187 = $self->getViewHelper('$viewHelper187', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper187->setArguments($arguments132);
$viewHelper187->setRenderingContext($renderingContext);
$viewHelper187->setRenderChildrenClosure($renderChildrenClosure133);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output131 .= $viewHelper187->initializeArgumentsAndRender();

$output131 .= ' -->
	<p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments188 = array();
$arguments188['action'] = 'new';
$arguments188['additionalAttributes'] = NULL;
$arguments188['data'] = NULL;
$arguments188['arguments'] = array (
);
$arguments188['controller'] = NULL;
$arguments188['package'] = NULL;
$arguments188['subpackage'] = NULL;
$arguments188['section'] = '';
$arguments188['format'] = '';
$arguments188['additionalParams'] = array (
);
$arguments188['addQueryString'] = false;
$arguments188['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments188['useParentRequest'] = false;
$arguments188['absolute'] = true;
$arguments188['class'] = NULL;
$arguments188['dir'] = NULL;
$arguments188['id'] = NULL;
$arguments188['lang'] = NULL;
$arguments188['style'] = NULL;
$arguments188['title'] = NULL;
$arguments188['accesskey'] = NULL;
$arguments188['tabindex'] = NULL;
$arguments188['onclick'] = NULL;
$arguments188['name'] = NULL;
$arguments188['rel'] = NULL;
$arguments188['rev'] = NULL;
$arguments188['target'] = NULL;
$renderChildrenClosure189 = function() use ($renderingContext, $self) {
return 'Create a new form';
};
$viewHelper190 = $self->getViewHelper('$viewHelper190', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper190->setArguments($arguments188);
$viewHelper190->setRenderingContext($renderingContext);
$viewHelper190->setRenderChildrenClosure($renderChildrenClosure189);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output131 .= $viewHelper190->initializeArgumentsAndRender();

$output131 .= '</p>

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
	              <li id="list-1" class="item active">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments191 = array();
$arguments191['action'] = 'index';
$arguments191['controller'] = 'Form';
$arguments191['additionalAttributes'] = NULL;
$arguments191['data'] = NULL;
$arguments191['arguments'] = array (
);
$arguments191['package'] = NULL;
$arguments191['subpackage'] = NULL;
$arguments191['section'] = '';
$arguments191['format'] = '';
$arguments191['additionalParams'] = array (
);
$arguments191['addQueryString'] = false;
$arguments191['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments191['useParentRequest'] = false;
$arguments191['absolute'] = true;
$arguments191['class'] = NULL;
$arguments191['dir'] = NULL;
$arguments191['id'] = NULL;
$arguments191['lang'] = NULL;
$arguments191['style'] = NULL;
$arguments191['title'] = NULL;
$arguments191['accesskey'] = NULL;
$arguments191['tabindex'] = NULL;
$arguments191['onclick'] = NULL;
$arguments191['name'] = NULL;
$arguments191['rel'] = NULL;
$arguments191['rev'] = NULL;
$arguments191['target'] = NULL;
$renderChildrenClosure192 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper193 = $self->getViewHelper('$viewHelper193', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper193->setArguments($arguments191);
$viewHelper193->setRenderingContext($renderingContext);
$viewHelper193->setRenderChildrenClosure($renderChildrenClosure192);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output131 .= $viewHelper193->initializeArgumentsAndRender();

$output131 .= '</li>

								<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments194 = array();
$arguments194['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments194['keepQuotes'] = false;
$arguments194['encoding'] = 'UTF-8';
$arguments194['doubleEncode'] = true;
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return NULL;
};
$value196 = ($arguments194['value'] !== NULL ? $arguments194['value'] : $renderChildrenClosure195());

$output131 .= !is_string($value196) && !(is_object($value196) && method_exists($value196, '__toString')) ? $value196 : htmlspecialchars($value196, ($arguments194['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments194['encoding'], $arguments194['doubleEncode']);

$output131 .= '" class="item"><a id="form-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments197 = array();
$arguments197['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments197['keepQuotes'] = false;
$arguments197['encoding'] = 'UTF-8';
$arguments197['doubleEncode'] = true;
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
return NULL;
};
$value199 = ($arguments197['value'] !== NULL ? $arguments197['value'] : $renderChildrenClosure198());

$output131 .= !is_string($value199) && !(is_object($value199) && method_exists($value199, '__toString')) ? $value199 : htmlspecialchars($value199, ($arguments197['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments197['encoding'], $arguments197['doubleEncode']);

$output131 .= '" class="list" role="button" >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments200 = array();
$arguments200['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments200['keepQuotes'] = false;
$arguments200['encoding'] = 'UTF-8';
$arguments200['doubleEncode'] = true;
$renderChildrenClosure201 = function() use ($renderingContext, $self) {
return NULL;
};
$value202 = ($arguments200['value'] !== NULL ? $arguments200['value'] : $renderChildrenClosure201());

$output131 .= !is_string($value202) && !(is_object($value202) && method_exists($value202, '__toString')) ? $value202 : htmlspecialchars($value202, ($arguments200['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments200['encoding'], $arguments200['doubleEncode']);

$output131 .= '</a></li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments203 = array();
// Rendering Boolean node
$arguments203['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments203['then'] = NULL;
$arguments203['else'] = NULL;
$renderChildrenClosure204 = function() use ($renderingContext, $self) {
$output205 = '';

$output205 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments206 = array();
$renderChildrenClosure207 = function() use ($renderingContext, $self) {
$output208 = '';

$output208 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments209 = array();
$arguments209['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments209['as'] = 'form';
$arguments209['iteration'] = 'key';
$arguments209['key'] = '';
$arguments209['reverse'] = false;
$renderChildrenClosure210 = function() use ($renderingContext, $self) {
$output211 = '';

$output211 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments212 = array();
$arguments212['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments212['keepQuotes'] = false;
$arguments212['encoding'] = 'UTF-8';
$arguments212['doubleEncode'] = true;
$renderChildrenClosure213 = function() use ($renderingContext, $self) {
return NULL;
};
$value214 = ($arguments212['value'] !== NULL ? $arguments212['value'] : $renderChildrenClosure213());

$output211 .= !is_string($value214) && !(is_object($value214) && method_exists($value214, '__toString')) ? $value214 : htmlspecialchars($value214, ($arguments212['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments212['encoding'], $arguments212['doubleEncode']);

$output211 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments215 = array();
$arguments215['action'] = 'show';
// Rendering Array
$array216 = array();
$array216['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments215['arguments'] = $array216;
$output217 = '';

$output217 .= 'form-';

$output217 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments215['id'] = $output217;
$arguments215['class'] = 'list';
$arguments215['additionalAttributes'] = NULL;
$arguments215['data'] = NULL;
$arguments215['controller'] = NULL;
$arguments215['package'] = NULL;
$arguments215['subpackage'] = NULL;
$arguments215['section'] = '';
$arguments215['format'] = '';
$arguments215['additionalParams'] = array (
);
$arguments215['addQueryString'] = false;
$arguments215['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments215['useParentRequest'] = false;
$arguments215['absolute'] = true;
$arguments215['dir'] = NULL;
$arguments215['lang'] = NULL;
$arguments215['style'] = NULL;
$arguments215['title'] = NULL;
$arguments215['accesskey'] = NULL;
$arguments215['tabindex'] = NULL;
$arguments215['onclick'] = NULL;
$arguments215['name'] = NULL;
$arguments215['rel'] = NULL;
$arguments215['rev'] = NULL;
$arguments215['target'] = NULL;
$renderChildrenClosure218 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments219 = array();
$arguments219['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments219['keepQuotes'] = false;
$arguments219['encoding'] = 'UTF-8';
$arguments219['doubleEncode'] = true;
$renderChildrenClosure220 = function() use ($renderingContext, $self) {
return NULL;
};
$value221 = ($arguments219['value'] !== NULL ? $arguments219['value'] : $renderChildrenClosure220());
return !is_string($value221) && !(is_object($value221) && method_exists($value221, '__toString')) ? $value221 : htmlspecialchars($value221, ($arguments219['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments219['encoding'], $arguments219['doubleEncode']);
};
$viewHelper222 = $self->getViewHelper('$viewHelper222', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper222->setArguments($arguments215);
$viewHelper222->setRenderingContext($renderingContext);
$viewHelper222->setRenderChildrenClosure($renderChildrenClosure218);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output211 .= $viewHelper222->initializeArgumentsAndRender();

$output211 .= '
												</li>
											';
return $output211;
};

$output208 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments209, $renderChildrenClosure210, $renderingContext);

$output208 .= '
									';
return $output208;
};
$viewHelper223 = $self->getViewHelper('$viewHelper223', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper223->setArguments($arguments206);
$viewHelper223->setRenderingContext($renderingContext);
$viewHelper223->setRenderChildrenClosure($renderChildrenClosure207);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output205 .= $viewHelper223->initializeArgumentsAndRender();

$output205 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments224 = array();
$renderChildrenClosure225 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper226 = $self->getViewHelper('$viewHelper226', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper226->setArguments($arguments224);
$viewHelper226->setRenderingContext($renderingContext);
$viewHelper226->setRenderChildrenClosure($renderChildrenClosure225);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output205 .= $viewHelper226->initializeArgumentsAndRender();

$output205 .= '
								';
return $output205;
};
$arguments203['__thenClosure'] = function() use ($renderingContext, $self) {
$output227 = '';

$output227 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments228 = array();
$arguments228['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments228['as'] = 'form';
$arguments228['iteration'] = 'key';
$arguments228['key'] = '';
$arguments228['reverse'] = false;
$renderChildrenClosure229 = function() use ($renderingContext, $self) {
$output230 = '';

$output230 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments231 = array();
$arguments231['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments231['keepQuotes'] = false;
$arguments231['encoding'] = 'UTF-8';
$arguments231['doubleEncode'] = true;
$renderChildrenClosure232 = function() use ($renderingContext, $self) {
return NULL;
};
$value233 = ($arguments231['value'] !== NULL ? $arguments231['value'] : $renderChildrenClosure232());

$output230 .= !is_string($value233) && !(is_object($value233) && method_exists($value233, '__toString')) ? $value233 : htmlspecialchars($value233, ($arguments231['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments231['encoding'], $arguments231['doubleEncode']);

$output230 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments234 = array();
$arguments234['action'] = 'show';
// Rendering Array
$array235 = array();
$array235['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments234['arguments'] = $array235;
$output236 = '';

$output236 .= 'form-';

$output236 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments234['id'] = $output236;
$arguments234['class'] = 'list';
$arguments234['additionalAttributes'] = NULL;
$arguments234['data'] = NULL;
$arguments234['controller'] = NULL;
$arguments234['package'] = NULL;
$arguments234['subpackage'] = NULL;
$arguments234['section'] = '';
$arguments234['format'] = '';
$arguments234['additionalParams'] = array (
);
$arguments234['addQueryString'] = false;
$arguments234['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments234['useParentRequest'] = false;
$arguments234['absolute'] = true;
$arguments234['dir'] = NULL;
$arguments234['lang'] = NULL;
$arguments234['style'] = NULL;
$arguments234['title'] = NULL;
$arguments234['accesskey'] = NULL;
$arguments234['tabindex'] = NULL;
$arguments234['onclick'] = NULL;
$arguments234['name'] = NULL;
$arguments234['rel'] = NULL;
$arguments234['rev'] = NULL;
$arguments234['target'] = NULL;
$renderChildrenClosure237 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments238 = array();
$arguments238['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments238['keepQuotes'] = false;
$arguments238['encoding'] = 'UTF-8';
$arguments238['doubleEncode'] = true;
$renderChildrenClosure239 = function() use ($renderingContext, $self) {
return NULL;
};
$value240 = ($arguments238['value'] !== NULL ? $arguments238['value'] : $renderChildrenClosure239());
return !is_string($value240) && !(is_object($value240) && method_exists($value240, '__toString')) ? $value240 : htmlspecialchars($value240, ($arguments238['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments238['encoding'], $arguments238['doubleEncode']);
};
$viewHelper241 = $self->getViewHelper('$viewHelper241', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper241->setArguments($arguments234);
$viewHelper241->setRenderingContext($renderingContext);
$viewHelper241->setRenderChildrenClosure($renderChildrenClosure237);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output230 .= $viewHelper241->initializeArgumentsAndRender();

$output230 .= '
												</li>
											';
return $output230;
};

$output227 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments228, $renderChildrenClosure229, $renderingContext);

$output227 .= '
									';
return $output227;
};
$arguments203['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper242 = $self->getViewHelper('$viewHelper242', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper242->setArguments($arguments203);
$viewHelper242->setRenderingContext($renderingContext);
$viewHelper242->setRenderChildrenClosure($renderChildrenClosure204);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output131 .= $viewHelper242->initializeArgumentsAndRender();

$output131 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments243 = array();
$arguments243['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments243['keepQuotes'] = false;
$arguments243['encoding'] = 'UTF-8';
$arguments243['doubleEncode'] = true;
$renderChildrenClosure244 = function() use ($renderingContext, $self) {
return NULL;
};
$value245 = ($arguments243['value'] !== NULL ? $arguments243['value'] : $renderChildrenClosure244());

$output131 .= !is_string($value245) && !(is_object($value245) && method_exists($value245, '__toString')) ? $value245 : htmlspecialchars($value245, ($arguments243['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments243['encoding'], $arguments243['doubleEncode']);

$output131 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments246 = array();
$arguments246['action'] = 'logout';
$arguments246['additionalAttributes'] = NULL;
$arguments246['data'] = NULL;
$arguments246['arguments'] = array (
);
$arguments246['controller'] = NULL;
$arguments246['package'] = NULL;
$arguments246['subpackage'] = NULL;
$arguments246['section'] = '';
$arguments246['format'] = '';
$arguments246['additionalParams'] = array (
);
$arguments246['addQueryString'] = false;
$arguments246['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments246['useParentRequest'] = false;
$arguments246['absolute'] = true;
$arguments246['class'] = NULL;
$arguments246['dir'] = NULL;
$arguments246['id'] = NULL;
$arguments246['lang'] = NULL;
$arguments246['style'] = NULL;
$arguments246['title'] = NULL;
$arguments246['accesskey'] = NULL;
$arguments246['tabindex'] = NULL;
$arguments246['onclick'] = NULL;
$arguments246['name'] = NULL;
$arguments246['rel'] = NULL;
$arguments246['rev'] = NULL;
$arguments246['target'] = NULL;
$renderChildrenClosure247 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper248 = $self->getViewHelper('$viewHelper248', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper248->setArguments($arguments246);
$viewHelper248->setRenderingContext($renderingContext);
$viewHelper248->setRenderChildrenClosure($renderChildrenClosure247);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output131 .= $viewHelper248->initializeArgumentsAndRender();

$output131 .= '</li>
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
return $output131;
};

$output118 .= '';

$output118 .= '
';

return $output118;
}


}
#0             87010     