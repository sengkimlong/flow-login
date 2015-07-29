<?php class FluidCache_SKL_Test_Form_action_index_96a60f60ff20e54e3b3265b85673b481ef02d5d1 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
	<!-- <p>';
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

$output0 .= '</p> -->

	<nav class="navbar navbar-default">
	  <div class="container">
	      <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	          </button>
	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments60 = array();
$arguments60['action'] = 'index';
$arguments60['class'] = 'navbar-brand';
$arguments60['additionalAttributes'] = NULL;
$arguments60['data'] = NULL;
$arguments60['arguments'] = array (
);
$arguments60['controller'] = NULL;
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
return 'Team2';
};
$viewHelper62 = $self->getViewHelper('$viewHelper62', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper62->setArguments($arguments60);
$viewHelper62->setRenderingContext($renderingContext);
$viewHelper62->setRenderChildrenClosure($renderChildrenClosure61);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper62->initializeArgumentsAndRender();

$output0 .= '
	      </div> <!-- End navbar-header -->

	      <div class="collapse navbar-collapse" id="navigation">
	          <ul class="nav navbar-nav navbar-right">
	              <li id="list-1" class="item">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments63 = array();
$arguments63['action'] = 'index';
$arguments63['additionalAttributes'] = NULL;
$arguments63['data'] = NULL;
$arguments63['arguments'] = array (
);
$arguments63['controller'] = NULL;
$arguments63['package'] = NULL;
$arguments63['subpackage'] = NULL;
$arguments63['section'] = '';
$arguments63['format'] = '';
$arguments63['additionalParams'] = array (
);
$arguments63['addQueryString'] = false;
$arguments63['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments63['useParentRequest'] = false;
$arguments63['absolute'] = true;
$arguments63['class'] = NULL;
$arguments63['dir'] = NULL;
$arguments63['id'] = NULL;
$arguments63['lang'] = NULL;
$arguments63['style'] = NULL;
$arguments63['title'] = NULL;
$arguments63['accesskey'] = NULL;
$arguments63['tabindex'] = NULL;
$arguments63['onclick'] = NULL;
$arguments63['name'] = NULL;
$arguments63['rel'] = NULL;
$arguments63['rev'] = NULL;
$arguments63['target'] = NULL;
$renderChildrenClosure64 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper65 = $self->getViewHelper('$viewHelper65', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper65->setArguments($arguments63);
$viewHelper65->setRenderingContext($renderingContext);
$viewHelper65->setRenderChildrenClosure($renderChildrenClosure64);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper65->initializeArgumentsAndRender();

$output0 .= '
								</li>

								<!-- <li id="list-';
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

$output0 .= '" class="item"><a id="form-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments69 = array();
$arguments69['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments69['keepQuotes'] = false;
$arguments69['encoding'] = 'UTF-8';
$arguments69['doubleEncode'] = true;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$value71 = ($arguments69['value'] !== NULL ? $arguments69['value'] : $renderChildrenClosure70());

$output0 .= !is_string($value71) && !(is_object($value71) && method_exists($value71, '__toString')) ? $value71 : htmlspecialchars($value71, ($arguments69['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments69['encoding'], $arguments69['doubleEncode']);

$output0 .= '" class="list" role="button" >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments72 = array();
$arguments72['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments72['keepQuotes'] = false;
$arguments72['encoding'] = 'UTF-8';
$arguments72['doubleEncode'] = true;
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
return NULL;
};
$value74 = ($arguments72['value'] !== NULL ? $arguments72['value'] : $renderChildrenClosure73());

$output0 .= !is_string($value74) && !(is_object($value74) && method_exists($value74, '__toString')) ? $value74 : htmlspecialchars($value74, ($arguments72['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments72['encoding'], $arguments72['doubleEncode']);

$output0 .= '</a></li>
 -->
								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments75 = array();
// Rendering Boolean node
$arguments75['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments75['then'] = NULL;
$arguments75['else'] = NULL;
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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments81 = array();
$arguments81['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments81['as'] = 'form';
$arguments81['iteration'] = 'key';
$arguments81['key'] = '';
$arguments81['reverse'] = false;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
$output83 = '';

$output83 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments84 = array();
$arguments84['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments84['keepQuotes'] = false;
$arguments84['encoding'] = 'UTF-8';
$arguments84['doubleEncode'] = true;
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
return NULL;
};
$value86 = ($arguments84['value'] !== NULL ? $arguments84['value'] : $renderChildrenClosure85());

$output83 .= !is_string($value86) && !(is_object($value86) && method_exists($value86, '__toString')) ? $value86 : htmlspecialchars($value86, ($arguments84['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments84['encoding'], $arguments84['doubleEncode']);

$output83 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments87 = array();
$arguments87['action'] = 'show';
// Rendering Array
$array88 = array();
$array88['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments87['arguments'] = $array88;
$output89 = '';

$output89 .= 'form-';

$output89 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments87['id'] = $output89;
$arguments87['class'] = 'list';
$arguments87['additionalAttributes'] = NULL;
$arguments87['data'] = NULL;
$arguments87['controller'] = NULL;
$arguments87['package'] = NULL;
$arguments87['subpackage'] = NULL;
$arguments87['section'] = '';
$arguments87['format'] = '';
$arguments87['additionalParams'] = array (
);
$arguments87['addQueryString'] = false;
$arguments87['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments87['useParentRequest'] = false;
$arguments87['absolute'] = true;
$arguments87['dir'] = NULL;
$arguments87['lang'] = NULL;
$arguments87['style'] = NULL;
$arguments87['title'] = NULL;
$arguments87['accesskey'] = NULL;
$arguments87['tabindex'] = NULL;
$arguments87['onclick'] = NULL;
$arguments87['name'] = NULL;
$arguments87['rel'] = NULL;
$arguments87['rev'] = NULL;
$arguments87['target'] = NULL;
$renderChildrenClosure90 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments91 = array();
$arguments91['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments91['keepQuotes'] = false;
$arguments91['encoding'] = 'UTF-8';
$arguments91['doubleEncode'] = true;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
return NULL;
};
$value93 = ($arguments91['value'] !== NULL ? $arguments91['value'] : $renderChildrenClosure92());
return !is_string($value93) && !(is_object($value93) && method_exists($value93, '__toString')) ? $value93 : htmlspecialchars($value93, ($arguments91['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments91['encoding'], $arguments91['doubleEncode']);
};
$viewHelper94 = $self->getViewHelper('$viewHelper94', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper94->setArguments($arguments87);
$viewHelper94->setRenderingContext($renderingContext);
$viewHelper94->setRenderChildrenClosure($renderChildrenClosure90);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output83 .= $viewHelper94->initializeArgumentsAndRender();

$output83 .= '
												</li>
											';
return $output83;
};

$output80 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments81, $renderChildrenClosure82, $renderingContext);

$output80 .= '
									';
return $output80;
};
$viewHelper95 = $self->getViewHelper('$viewHelper95', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper95->setArguments($arguments78);
$viewHelper95->setRenderingContext($renderingContext);
$viewHelper95->setRenderChildrenClosure($renderChildrenClosure79);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output77 .= $viewHelper95->initializeArgumentsAndRender();

$output77 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments96 = array();
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper98 = $self->getViewHelper('$viewHelper98', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper98->setArguments($arguments96);
$viewHelper98->setRenderingContext($renderingContext);
$viewHelper98->setRenderChildrenClosure($renderChildrenClosure97);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output77 .= $viewHelper98->initializeArgumentsAndRender();

$output77 .= '
								';
return $output77;
};
$arguments75['__thenClosure'] = function() use ($renderingContext, $self) {
$output99 = '';

$output99 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments100 = array();
$arguments100['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments100['as'] = 'form';
$arguments100['iteration'] = 'key';
$arguments100['key'] = '';
$arguments100['reverse'] = false;
$renderChildrenClosure101 = function() use ($renderingContext, $self) {
$output102 = '';

$output102 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments103 = array();
$arguments103['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments103['keepQuotes'] = false;
$arguments103['encoding'] = 'UTF-8';
$arguments103['doubleEncode'] = true;
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
return NULL;
};
$value105 = ($arguments103['value'] !== NULL ? $arguments103['value'] : $renderChildrenClosure104());

$output102 .= !is_string($value105) && !(is_object($value105) && method_exists($value105, '__toString')) ? $value105 : htmlspecialchars($value105, ($arguments103['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments103['encoding'], $arguments103['doubleEncode']);

$output102 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments106 = array();
$arguments106['action'] = 'show';
// Rendering Array
$array107 = array();
$array107['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments106['arguments'] = $array107;
$output108 = '';

$output108 .= 'form-';

$output108 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments106['id'] = $output108;
$arguments106['class'] = 'list';
$arguments106['additionalAttributes'] = NULL;
$arguments106['data'] = NULL;
$arguments106['controller'] = NULL;
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
$arguments106['dir'] = NULL;
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
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments110 = array();
$arguments110['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments110['keepQuotes'] = false;
$arguments110['encoding'] = 'UTF-8';
$arguments110['doubleEncode'] = true;
$renderChildrenClosure111 = function() use ($renderingContext, $self) {
return NULL;
};
$value112 = ($arguments110['value'] !== NULL ? $arguments110['value'] : $renderChildrenClosure111());
return !is_string($value112) && !(is_object($value112) && method_exists($value112, '__toString')) ? $value112 : htmlspecialchars($value112, ($arguments110['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments110['encoding'], $arguments110['doubleEncode']);
};
$viewHelper113 = $self->getViewHelper('$viewHelper113', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper113->setArguments($arguments106);
$viewHelper113->setRenderingContext($renderingContext);
$viewHelper113->setRenderChildrenClosure($renderChildrenClosure109);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output102 .= $viewHelper113->initializeArgumentsAndRender();

$output102 .= '
												</li>
											';
return $output102;
};

$output99 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments100, $renderChildrenClosure101, $renderingContext);

$output99 .= '
									';
return $output99;
};
$arguments75['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper114 = $self->getViewHelper('$viewHelper114', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper114->setArguments($arguments75);
$viewHelper114->setRenderingContext($renderingContext);
$viewHelper114->setRenderChildrenClosure($renderChildrenClosure76);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper114->initializeArgumentsAndRender();

$output0 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments115 = array();
$arguments115['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments115['keepQuotes'] = false;
$arguments115['encoding'] = 'UTF-8';
$arguments115['doubleEncode'] = true;
$renderChildrenClosure116 = function() use ($renderingContext, $self) {
return NULL;
};
$value117 = ($arguments115['value'] !== NULL ? $arguments115['value'] : $renderChildrenClosure116());

$output0 .= !is_string($value117) && !(is_object($value117) && method_exists($value117, '__toString')) ? $value117 : htmlspecialchars($value117, ($arguments115['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments115['encoding'], $arguments115['doubleEncode']);

$output0 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments118 = array();
$arguments118['action'] = 'logout';
$arguments118['additionalAttributes'] = NULL;
$arguments118['data'] = NULL;
$arguments118['arguments'] = array (
);
$arguments118['controller'] = NULL;
$arguments118['package'] = NULL;
$arguments118['subpackage'] = NULL;
$arguments118['section'] = '';
$arguments118['format'] = '';
$arguments118['additionalParams'] = array (
);
$arguments118['addQueryString'] = false;
$arguments118['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments118['useParentRequest'] = false;
$arguments118['absolute'] = true;
$arguments118['class'] = NULL;
$arguments118['dir'] = NULL;
$arguments118['id'] = NULL;
$arguments118['lang'] = NULL;
$arguments118['style'] = NULL;
$arguments118['title'] = NULL;
$arguments118['accesskey'] = NULL;
$arguments118['tabindex'] = NULL;
$arguments118['onclick'] = NULL;
$arguments118['name'] = NULL;
$arguments118['rel'] = NULL;
$arguments118['rev'] = NULL;
$arguments118['target'] = NULL;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper120 = $self->getViewHelper('$viewHelper120', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper120->setArguments($arguments118);
$viewHelper120->setRenderingContext($renderingContext);
$viewHelper120->setRenderChildrenClosure($renderChildrenClosure119);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper120->initializeArgumentsAndRender();

$output0 .= '</li>
											<li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments121 = array();
$arguments121['action'] = 'profile';
$arguments121['additionalAttributes'] = NULL;
$arguments121['data'] = NULL;
$arguments121['arguments'] = array (
);
$arguments121['controller'] = NULL;
$arguments121['package'] = NULL;
$arguments121['subpackage'] = NULL;
$arguments121['section'] = '';
$arguments121['format'] = '';
$arguments121['additionalParams'] = array (
);
$arguments121['addQueryString'] = false;
$arguments121['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments121['useParentRequest'] = false;
$arguments121['absolute'] = true;
$arguments121['class'] = NULL;
$arguments121['dir'] = NULL;
$arguments121['id'] = NULL;
$arguments121['lang'] = NULL;
$arguments121['style'] = NULL;
$arguments121['title'] = NULL;
$arguments121['accesskey'] = NULL;
$arguments121['tabindex'] = NULL;
$arguments121['onclick'] = NULL;
$arguments121['name'] = NULL;
$arguments121['rel'] = NULL;
$arguments121['rev'] = NULL;
$arguments121['target'] = NULL;
$renderChildrenClosure122 = function() use ($renderingContext, $self) {
return 'Profile';
};
$viewHelper123 = $self->getViewHelper('$viewHelper123', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper123->setArguments($arguments121);
$viewHelper123->setRenderingContext($renderingContext);
$viewHelper123->setRenderChildrenClosure($renderChildrenClosure122);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper123->initializeArgumentsAndRender();

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
	              <a id="btn-frm1" href="http://local.project.dev/forms/form1" class="btn btn-primary btn-lg" role="button" style="visibility:hidden">Go to Form1</a>
	  </p>
	          </div>
	      </div>

	      <!-- Question list here -->

	  </div>
	  <div style="display:none" class="text-right">
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
$output124 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments125 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments126 = array();
$arguments126['name'] = 'Default';
$renderChildrenClosure127 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper128 = $self->getViewHelper('$viewHelper128', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper128->setArguments($arguments126);
$viewHelper128->setRenderingContext($renderingContext);
$viewHelper128->setRenderChildrenClosure($renderChildrenClosure127);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments125['value'] = $viewHelper128->initializeArgumentsAndRender();
$arguments125['keepQuotes'] = false;
$arguments125['encoding'] = 'UTF-8';
$arguments125['doubleEncode'] = true;
$renderChildrenClosure129 = function() use ($renderingContext, $self) {
return NULL;
};
$value130 = ($arguments125['value'] !== NULL ? $arguments125['value'] : $renderChildrenClosure129());

$output124 .= !is_string($value130) && !(is_object($value130) && method_exists($value130, '__toString')) ? $value130 : htmlspecialchars($value130, ($arguments125['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments125['encoding'], $arguments125['doubleEncode']);

$output124 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments131 = array();
$arguments131['name'] = 'Title';
$renderChildrenClosure132 = function() use ($renderingContext, $self) {
return NULL;
};

$output124 .= '';

$output124 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments133 = array();
$arguments133['name'] = 'stylesheet';
$renderChildrenClosure134 = function() use ($renderingContext, $self) {
return NULL;
};

$output124 .= '';

$output124 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments135 = array();
$arguments135['name'] = 'Content';
$renderChildrenClosure136 = function() use ($renderingContext, $self) {
$output137 = '';

$output137 .= '
	<!-- ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments138 = array();
// Rendering Boolean node
$arguments138['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments138['then'] = NULL;
$arguments138['else'] = NULL;
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
$output140 = '';

$output140 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments141 = array();
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
$output143 = '';

$output143 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments144 = array();
$arguments144['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments144['as'] = 'form';
$arguments144['key'] = '';
$arguments144['reverse'] = false;
$arguments144['iteration'] = NULL;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
$output146 = '';

$output146 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments147 = array();
$arguments147['action'] = 'show';
// Rendering Array
$array148 = array();
$array148['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments147['arguments'] = $array148;
$arguments147['additionalAttributes'] = NULL;
$arguments147['data'] = NULL;
$arguments147['controller'] = NULL;
$arguments147['package'] = NULL;
$arguments147['subpackage'] = NULL;
$arguments147['section'] = '';
$arguments147['format'] = '';
$arguments147['additionalParams'] = array (
);
$arguments147['addQueryString'] = false;
$arguments147['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments147['useParentRequest'] = false;
$arguments147['absolute'] = true;
$arguments147['class'] = NULL;
$arguments147['dir'] = NULL;
$arguments147['id'] = NULL;
$arguments147['lang'] = NULL;
$arguments147['style'] = NULL;
$arguments147['title'] = NULL;
$arguments147['accesskey'] = NULL;
$arguments147['tabindex'] = NULL;
$arguments147['onclick'] = NULL;
$arguments147['name'] = NULL;
$arguments147['rel'] = NULL;
$arguments147['rev'] = NULL;
$arguments147['target'] = NULL;
$renderChildrenClosure149 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments150 = array();
$arguments150['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments150['keepQuotes'] = false;
$arguments150['encoding'] = 'UTF-8';
$arguments150['doubleEncode'] = true;
$renderChildrenClosure151 = function() use ($renderingContext, $self) {
return NULL;
};
$value152 = ($arguments150['value'] !== NULL ? $arguments150['value'] : $renderChildrenClosure151());
return !is_string($value152) && !(is_object($value152) && method_exists($value152, '__toString')) ? $value152 : htmlspecialchars($value152, ($arguments150['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments150['encoding'], $arguments150['doubleEncode']);
};
$viewHelper153 = $self->getViewHelper('$viewHelper153', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper153->setArguments($arguments147);
$viewHelper153->setRenderingContext($renderingContext);
$viewHelper153->setRenderChildrenClosure($renderChildrenClosure149);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output146 .= $viewHelper153->initializeArgumentsAndRender();

$output146 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments154 = array();
$arguments154['action'] = 'edit';
// Rendering Array
$array155 = array();
$array155['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments154['arguments'] = $array155;
$arguments154['additionalAttributes'] = NULL;
$arguments154['data'] = NULL;
$arguments154['controller'] = NULL;
$arguments154['package'] = NULL;
$arguments154['subpackage'] = NULL;
$arguments154['section'] = '';
$arguments154['format'] = '';
$arguments154['additionalParams'] = array (
);
$arguments154['addQueryString'] = false;
$arguments154['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments154['useParentRequest'] = false;
$arguments154['absolute'] = true;
$arguments154['class'] = NULL;
$arguments154['dir'] = NULL;
$arguments154['id'] = NULL;
$arguments154['lang'] = NULL;
$arguments154['style'] = NULL;
$arguments154['title'] = NULL;
$arguments154['accesskey'] = NULL;
$arguments154['tabindex'] = NULL;
$arguments154['onclick'] = NULL;
$arguments154['name'] = NULL;
$arguments154['rel'] = NULL;
$arguments154['rev'] = NULL;
$arguments154['target'] = NULL;
$renderChildrenClosure156 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper157 = $self->getViewHelper('$viewHelper157', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper157->setArguments($arguments154);
$viewHelper157->setRenderingContext($renderingContext);
$viewHelper157->setRenderChildrenClosure($renderChildrenClosure156);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output146 .= $viewHelper157->initializeArgumentsAndRender();

$output146 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments158 = array();
$arguments158['action'] = 'delete';
// Rendering Array
$array159 = array();
$array159['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments158['arguments'] = $array159;
$arguments158['additionalAttributes'] = NULL;
$arguments158['data'] = NULL;
$arguments158['controller'] = NULL;
$arguments158['package'] = NULL;
$arguments158['subpackage'] = NULL;
$arguments158['object'] = NULL;
$arguments158['section'] = '';
$arguments158['format'] = '';
$arguments158['additionalParams'] = array (
);
$arguments158['absolute'] = false;
$arguments158['addQueryString'] = false;
$arguments158['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments158['fieldNamePrefix'] = NULL;
$arguments158['actionUri'] = NULL;
$arguments158['objectName'] = NULL;
$arguments158['useParentRequest'] = false;
$arguments158['enctype'] = NULL;
$arguments158['method'] = NULL;
$arguments158['name'] = NULL;
$arguments158['onreset'] = NULL;
$arguments158['onsubmit'] = NULL;
$arguments158['class'] = NULL;
$arguments158['dir'] = NULL;
$arguments158['id'] = NULL;
$arguments158['lang'] = NULL;
$arguments158['style'] = NULL;
$arguments158['title'] = NULL;
$arguments158['accesskey'] = NULL;
$arguments158['tabindex'] = NULL;
$arguments158['onclick'] = NULL;
$renderChildrenClosure160 = function() use ($renderingContext, $self) {
$output161 = '';

$output161 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments162 = array();
$arguments162['value'] = 'Delete';
$arguments162['additionalAttributes'] = NULL;
$arguments162['data'] = NULL;
$arguments162['name'] = NULL;
$arguments162['property'] = NULL;
$arguments162['disabled'] = NULL;
$arguments162['class'] = NULL;
$arguments162['dir'] = NULL;
$arguments162['id'] = NULL;
$arguments162['lang'] = NULL;
$arguments162['style'] = NULL;
$arguments162['title'] = NULL;
$arguments162['accesskey'] = NULL;
$arguments162['tabindex'] = NULL;
$arguments162['onclick'] = NULL;
$renderChildrenClosure163 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper164 = $self->getViewHelper('$viewHelper164', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper164->setArguments($arguments162);
$viewHelper164->setRenderingContext($renderingContext);
$viewHelper164->setRenderChildrenClosure($renderChildrenClosure163);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output161 .= $viewHelper164->initializeArgumentsAndRender();

$output161 .= '
						';
return $output161;
};
$viewHelper165 = $self->getViewHelper('$viewHelper165', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper165->setArguments($arguments158);
$viewHelper165->setRenderingContext($renderingContext);
$viewHelper165->setRenderChildrenClosure($renderChildrenClosure160);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output146 .= $viewHelper165->initializeArgumentsAndRender();

$output146 .= '
					</li>
				';
return $output146;
};

$output143 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments144, $renderChildrenClosure145, $renderingContext);

$output143 .= '
			</ul>
		';
return $output143;
};
$viewHelper166 = $self->getViewHelper('$viewHelper166', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper166->setArguments($arguments141);
$viewHelper166->setRenderingContext($renderingContext);
$viewHelper166->setRenderChildrenClosure($renderChildrenClosure142);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output140 .= $viewHelper166->initializeArgumentsAndRender();

$output140 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments167 = array();
$renderChildrenClosure168 = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper169 = $self->getViewHelper('$viewHelper169', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper169->setArguments($arguments167);
$viewHelper169->setRenderingContext($renderingContext);
$viewHelper169->setRenderChildrenClosure($renderChildrenClosure168);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output140 .= $viewHelper169->initializeArgumentsAndRender();

$output140 .= '
	';
return $output140;
};
$arguments138['__thenClosure'] = function() use ($renderingContext, $self) {
$output170 = '';

$output170 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments171 = array();
$arguments171['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments171['as'] = 'form';
$arguments171['key'] = '';
$arguments171['reverse'] = false;
$arguments171['iteration'] = NULL;
$renderChildrenClosure172 = function() use ($renderingContext, $self) {
$output173 = '';

$output173 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments174 = array();
$arguments174['action'] = 'show';
// Rendering Array
$array175 = array();
$array175['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments174['arguments'] = $array175;
$arguments174['additionalAttributes'] = NULL;
$arguments174['data'] = NULL;
$arguments174['controller'] = NULL;
$arguments174['package'] = NULL;
$arguments174['subpackage'] = NULL;
$arguments174['section'] = '';
$arguments174['format'] = '';
$arguments174['additionalParams'] = array (
);
$arguments174['addQueryString'] = false;
$arguments174['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments174['useParentRequest'] = false;
$arguments174['absolute'] = true;
$arguments174['class'] = NULL;
$arguments174['dir'] = NULL;
$arguments174['id'] = NULL;
$arguments174['lang'] = NULL;
$arguments174['style'] = NULL;
$arguments174['title'] = NULL;
$arguments174['accesskey'] = NULL;
$arguments174['tabindex'] = NULL;
$arguments174['onclick'] = NULL;
$arguments174['name'] = NULL;
$arguments174['rel'] = NULL;
$arguments174['rev'] = NULL;
$arguments174['target'] = NULL;
$renderChildrenClosure176 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments177 = array();
$arguments177['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments177['keepQuotes'] = false;
$arguments177['encoding'] = 'UTF-8';
$arguments177['doubleEncode'] = true;
$renderChildrenClosure178 = function() use ($renderingContext, $self) {
return NULL;
};
$value179 = ($arguments177['value'] !== NULL ? $arguments177['value'] : $renderChildrenClosure178());
return !is_string($value179) && !(is_object($value179) && method_exists($value179, '__toString')) ? $value179 : htmlspecialchars($value179, ($arguments177['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments177['encoding'], $arguments177['doubleEncode']);
};
$viewHelper180 = $self->getViewHelper('$viewHelper180', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper180->setArguments($arguments174);
$viewHelper180->setRenderingContext($renderingContext);
$viewHelper180->setRenderChildrenClosure($renderChildrenClosure176);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output173 .= $viewHelper180->initializeArgumentsAndRender();

$output173 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments181 = array();
$arguments181['action'] = 'edit';
// Rendering Array
$array182 = array();
$array182['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments181['arguments'] = $array182;
$arguments181['additionalAttributes'] = NULL;
$arguments181['data'] = NULL;
$arguments181['controller'] = NULL;
$arguments181['package'] = NULL;
$arguments181['subpackage'] = NULL;
$arguments181['section'] = '';
$arguments181['format'] = '';
$arguments181['additionalParams'] = array (
);
$arguments181['addQueryString'] = false;
$arguments181['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments181['useParentRequest'] = false;
$arguments181['absolute'] = true;
$arguments181['class'] = NULL;
$arguments181['dir'] = NULL;
$arguments181['id'] = NULL;
$arguments181['lang'] = NULL;
$arguments181['style'] = NULL;
$arguments181['title'] = NULL;
$arguments181['accesskey'] = NULL;
$arguments181['tabindex'] = NULL;
$arguments181['onclick'] = NULL;
$arguments181['name'] = NULL;
$arguments181['rel'] = NULL;
$arguments181['rev'] = NULL;
$arguments181['target'] = NULL;
$renderChildrenClosure183 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper184 = $self->getViewHelper('$viewHelper184', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper184->setArguments($arguments181);
$viewHelper184->setRenderingContext($renderingContext);
$viewHelper184->setRenderChildrenClosure($renderChildrenClosure183);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output173 .= $viewHelper184->initializeArgumentsAndRender();

$output173 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments185 = array();
$arguments185['action'] = 'delete';
// Rendering Array
$array186 = array();
$array186['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments185['arguments'] = $array186;
$arguments185['additionalAttributes'] = NULL;
$arguments185['data'] = NULL;
$arguments185['controller'] = NULL;
$arguments185['package'] = NULL;
$arguments185['subpackage'] = NULL;
$arguments185['object'] = NULL;
$arguments185['section'] = '';
$arguments185['format'] = '';
$arguments185['additionalParams'] = array (
);
$arguments185['absolute'] = false;
$arguments185['addQueryString'] = false;
$arguments185['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments185['fieldNamePrefix'] = NULL;
$arguments185['actionUri'] = NULL;
$arguments185['objectName'] = NULL;
$arguments185['useParentRequest'] = false;
$arguments185['enctype'] = NULL;
$arguments185['method'] = NULL;
$arguments185['name'] = NULL;
$arguments185['onreset'] = NULL;
$arguments185['onsubmit'] = NULL;
$arguments185['class'] = NULL;
$arguments185['dir'] = NULL;
$arguments185['id'] = NULL;
$arguments185['lang'] = NULL;
$arguments185['style'] = NULL;
$arguments185['title'] = NULL;
$arguments185['accesskey'] = NULL;
$arguments185['tabindex'] = NULL;
$arguments185['onclick'] = NULL;
$renderChildrenClosure187 = function() use ($renderingContext, $self) {
$output188 = '';

$output188 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments189 = array();
$arguments189['value'] = 'Delete';
$arguments189['additionalAttributes'] = NULL;
$arguments189['data'] = NULL;
$arguments189['name'] = NULL;
$arguments189['property'] = NULL;
$arguments189['disabled'] = NULL;
$arguments189['class'] = NULL;
$arguments189['dir'] = NULL;
$arguments189['id'] = NULL;
$arguments189['lang'] = NULL;
$arguments189['style'] = NULL;
$arguments189['title'] = NULL;
$arguments189['accesskey'] = NULL;
$arguments189['tabindex'] = NULL;
$arguments189['onclick'] = NULL;
$renderChildrenClosure190 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper191 = $self->getViewHelper('$viewHelper191', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper191->setArguments($arguments189);
$viewHelper191->setRenderingContext($renderingContext);
$viewHelper191->setRenderChildrenClosure($renderChildrenClosure190);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output188 .= $viewHelper191->initializeArgumentsAndRender();

$output188 .= '
						';
return $output188;
};
$viewHelper192 = $self->getViewHelper('$viewHelper192', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper192->setArguments($arguments185);
$viewHelper192->setRenderingContext($renderingContext);
$viewHelper192->setRenderChildrenClosure($renderChildrenClosure187);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output173 .= $viewHelper192->initializeArgumentsAndRender();

$output173 .= '
					</li>
				';
return $output173;
};

$output170 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments171, $renderChildrenClosure172, $renderingContext);

$output170 .= '
			</ul>
		';
return $output170;
};
$arguments138['__elseClosure'] = function() use ($renderingContext, $self) {
return '
			<p>No forms created yet.</p>
		';
};
$viewHelper193 = $self->getViewHelper('$viewHelper193', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper193->setArguments($arguments138);
$viewHelper193->setRenderingContext($renderingContext);
$viewHelper193->setRenderChildrenClosure($renderChildrenClosure139);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output137 .= $viewHelper193->initializeArgumentsAndRender();

$output137 .= ' -->
	<!-- <p>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments194 = array();
$arguments194['action'] = 'new';
$arguments194['additionalAttributes'] = NULL;
$arguments194['data'] = NULL;
$arguments194['arguments'] = array (
);
$arguments194['controller'] = NULL;
$arguments194['package'] = NULL;
$arguments194['subpackage'] = NULL;
$arguments194['section'] = '';
$arguments194['format'] = '';
$arguments194['additionalParams'] = array (
);
$arguments194['addQueryString'] = false;
$arguments194['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments194['useParentRequest'] = false;
$arguments194['absolute'] = true;
$arguments194['class'] = NULL;
$arguments194['dir'] = NULL;
$arguments194['id'] = NULL;
$arguments194['lang'] = NULL;
$arguments194['style'] = NULL;
$arguments194['title'] = NULL;
$arguments194['accesskey'] = NULL;
$arguments194['tabindex'] = NULL;
$arguments194['onclick'] = NULL;
$arguments194['name'] = NULL;
$arguments194['rel'] = NULL;
$arguments194['rev'] = NULL;
$arguments194['target'] = NULL;
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
return 'Create a new form';
};
$viewHelper196 = $self->getViewHelper('$viewHelper196', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper196->setArguments($arguments194);
$viewHelper196->setRenderingContext($renderingContext);
$viewHelper196->setRenderChildrenClosure($renderChildrenClosure195);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output137 .= $viewHelper196->initializeArgumentsAndRender();

$output137 .= '</p> -->

	<nav class="navbar navbar-default">
	  <div class="container">
	      <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	          </button>
	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments197 = array();
$arguments197['action'] = 'index';
$arguments197['class'] = 'navbar-brand';
$arguments197['additionalAttributes'] = NULL;
$arguments197['data'] = NULL;
$arguments197['arguments'] = array (
);
$arguments197['controller'] = NULL;
$arguments197['package'] = NULL;
$arguments197['subpackage'] = NULL;
$arguments197['section'] = '';
$arguments197['format'] = '';
$arguments197['additionalParams'] = array (
);
$arguments197['addQueryString'] = false;
$arguments197['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments197['useParentRequest'] = false;
$arguments197['absolute'] = true;
$arguments197['dir'] = NULL;
$arguments197['id'] = NULL;
$arguments197['lang'] = NULL;
$arguments197['style'] = NULL;
$arguments197['title'] = NULL;
$arguments197['accesskey'] = NULL;
$arguments197['tabindex'] = NULL;
$arguments197['onclick'] = NULL;
$arguments197['name'] = NULL;
$arguments197['rel'] = NULL;
$arguments197['rev'] = NULL;
$arguments197['target'] = NULL;
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
return 'Team2';
};
$viewHelper199 = $self->getViewHelper('$viewHelper199', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper199->setArguments($arguments197);
$viewHelper199->setRenderingContext($renderingContext);
$viewHelper199->setRenderChildrenClosure($renderChildrenClosure198);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output137 .= $viewHelper199->initializeArgumentsAndRender();

$output137 .= '
	      </div> <!-- End navbar-header -->

	      <div class="collapse navbar-collapse" id="navigation">
	          <ul class="nav navbar-nav navbar-right">
	              <li id="list-1" class="item">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments200 = array();
$arguments200['action'] = 'index';
$arguments200['additionalAttributes'] = NULL;
$arguments200['data'] = NULL;
$arguments200['arguments'] = array (
);
$arguments200['controller'] = NULL;
$arguments200['package'] = NULL;
$arguments200['subpackage'] = NULL;
$arguments200['section'] = '';
$arguments200['format'] = '';
$arguments200['additionalParams'] = array (
);
$arguments200['addQueryString'] = false;
$arguments200['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments200['useParentRequest'] = false;
$arguments200['absolute'] = true;
$arguments200['class'] = NULL;
$arguments200['dir'] = NULL;
$arguments200['id'] = NULL;
$arguments200['lang'] = NULL;
$arguments200['style'] = NULL;
$arguments200['title'] = NULL;
$arguments200['accesskey'] = NULL;
$arguments200['tabindex'] = NULL;
$arguments200['onclick'] = NULL;
$arguments200['name'] = NULL;
$arguments200['rel'] = NULL;
$arguments200['rev'] = NULL;
$arguments200['target'] = NULL;
$renderChildrenClosure201 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper202 = $self->getViewHelper('$viewHelper202', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper202->setArguments($arguments200);
$viewHelper202->setRenderingContext($renderingContext);
$viewHelper202->setRenderChildrenClosure($renderChildrenClosure201);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output137 .= $viewHelper202->initializeArgumentsAndRender();

$output137 .= '
								</li>

								<!-- <li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments203 = array();
$arguments203['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments203['keepQuotes'] = false;
$arguments203['encoding'] = 'UTF-8';
$arguments203['doubleEncode'] = true;
$renderChildrenClosure204 = function() use ($renderingContext, $self) {
return NULL;
};
$value205 = ($arguments203['value'] !== NULL ? $arguments203['value'] : $renderChildrenClosure204());

$output137 .= !is_string($value205) && !(is_object($value205) && method_exists($value205, '__toString')) ? $value205 : htmlspecialchars($value205, ($arguments203['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments203['encoding'], $arguments203['doubleEncode']);

$output137 .= '" class="item"><a id="form-';
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

$output137 .= !is_string($value208) && !(is_object($value208) && method_exists($value208, '__toString')) ? $value208 : htmlspecialchars($value208, ($arguments206['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments206['encoding'], $arguments206['doubleEncode']);

$output137 .= '" class="list" role="button" >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments209 = array();
$arguments209['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments209['keepQuotes'] = false;
$arguments209['encoding'] = 'UTF-8';
$arguments209['doubleEncode'] = true;
$renderChildrenClosure210 = function() use ($renderingContext, $self) {
return NULL;
};
$value211 = ($arguments209['value'] !== NULL ? $arguments209['value'] : $renderChildrenClosure210());

$output137 .= !is_string($value211) && !(is_object($value211) && method_exists($value211, '__toString')) ? $value211 : htmlspecialchars($value211, ($arguments209['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments209['encoding'], $arguments209['doubleEncode']);

$output137 .= '</a></li>
 -->
								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments212 = array();
// Rendering Boolean node
$arguments212['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments212['then'] = NULL;
$arguments212['else'] = NULL;
$renderChildrenClosure213 = function() use ($renderingContext, $self) {
$output214 = '';

$output214 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments215 = array();
$renderChildrenClosure216 = function() use ($renderingContext, $self) {
$output217 = '';

$output217 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments218 = array();
$arguments218['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments218['as'] = 'form';
$arguments218['iteration'] = 'key';
$arguments218['key'] = '';
$arguments218['reverse'] = false;
$renderChildrenClosure219 = function() use ($renderingContext, $self) {
$output220 = '';

$output220 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments221 = array();
$arguments221['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments221['keepQuotes'] = false;
$arguments221['encoding'] = 'UTF-8';
$arguments221['doubleEncode'] = true;
$renderChildrenClosure222 = function() use ($renderingContext, $self) {
return NULL;
};
$value223 = ($arguments221['value'] !== NULL ? $arguments221['value'] : $renderChildrenClosure222());

$output220 .= !is_string($value223) && !(is_object($value223) && method_exists($value223, '__toString')) ? $value223 : htmlspecialchars($value223, ($arguments221['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments221['encoding'], $arguments221['doubleEncode']);

$output220 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments224 = array();
$arguments224['action'] = 'show';
// Rendering Array
$array225 = array();
$array225['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments224['arguments'] = $array225;
$output226 = '';

$output226 .= 'form-';

$output226 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments224['id'] = $output226;
$arguments224['class'] = 'list';
$arguments224['additionalAttributes'] = NULL;
$arguments224['data'] = NULL;
$arguments224['controller'] = NULL;
$arguments224['package'] = NULL;
$arguments224['subpackage'] = NULL;
$arguments224['section'] = '';
$arguments224['format'] = '';
$arguments224['additionalParams'] = array (
);
$arguments224['addQueryString'] = false;
$arguments224['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments224['useParentRequest'] = false;
$arguments224['absolute'] = true;
$arguments224['dir'] = NULL;
$arguments224['lang'] = NULL;
$arguments224['style'] = NULL;
$arguments224['title'] = NULL;
$arguments224['accesskey'] = NULL;
$arguments224['tabindex'] = NULL;
$arguments224['onclick'] = NULL;
$arguments224['name'] = NULL;
$arguments224['rel'] = NULL;
$arguments224['rev'] = NULL;
$arguments224['target'] = NULL;
$renderChildrenClosure227 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments228 = array();
$arguments228['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments228['keepQuotes'] = false;
$arguments228['encoding'] = 'UTF-8';
$arguments228['doubleEncode'] = true;
$renderChildrenClosure229 = function() use ($renderingContext, $self) {
return NULL;
};
$value230 = ($arguments228['value'] !== NULL ? $arguments228['value'] : $renderChildrenClosure229());
return !is_string($value230) && !(is_object($value230) && method_exists($value230, '__toString')) ? $value230 : htmlspecialchars($value230, ($arguments228['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments228['encoding'], $arguments228['doubleEncode']);
};
$viewHelper231 = $self->getViewHelper('$viewHelper231', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper231->setArguments($arguments224);
$viewHelper231->setRenderingContext($renderingContext);
$viewHelper231->setRenderChildrenClosure($renderChildrenClosure227);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output220 .= $viewHelper231->initializeArgumentsAndRender();

$output220 .= '
												</li>
											';
return $output220;
};

$output217 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments218, $renderChildrenClosure219, $renderingContext);

$output217 .= '
									';
return $output217;
};
$viewHelper232 = $self->getViewHelper('$viewHelper232', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper232->setArguments($arguments215);
$viewHelper232->setRenderingContext($renderingContext);
$viewHelper232->setRenderChildrenClosure($renderChildrenClosure216);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output214 .= $viewHelper232->initializeArgumentsAndRender();

$output214 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments233 = array();
$renderChildrenClosure234 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper235 = $self->getViewHelper('$viewHelper235', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper235->setArguments($arguments233);
$viewHelper235->setRenderingContext($renderingContext);
$viewHelper235->setRenderChildrenClosure($renderChildrenClosure234);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output214 .= $viewHelper235->initializeArgumentsAndRender();

$output214 .= '
								';
return $output214;
};
$arguments212['__thenClosure'] = function() use ($renderingContext, $self) {
$output236 = '';

$output236 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments237 = array();
$arguments237['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments237['as'] = 'form';
$arguments237['iteration'] = 'key';
$arguments237['key'] = '';
$arguments237['reverse'] = false;
$renderChildrenClosure238 = function() use ($renderingContext, $self) {
$output239 = '';

$output239 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments240 = array();
$arguments240['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments240['keepQuotes'] = false;
$arguments240['encoding'] = 'UTF-8';
$arguments240['doubleEncode'] = true;
$renderChildrenClosure241 = function() use ($renderingContext, $self) {
return NULL;
};
$value242 = ($arguments240['value'] !== NULL ? $arguments240['value'] : $renderChildrenClosure241());

$output239 .= !is_string($value242) && !(is_object($value242) && method_exists($value242, '__toString')) ? $value242 : htmlspecialchars($value242, ($arguments240['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments240['encoding'], $arguments240['doubleEncode']);

$output239 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments243 = array();
$arguments243['action'] = 'show';
// Rendering Array
$array244 = array();
$array244['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments243['arguments'] = $array244;
$output245 = '';

$output245 .= 'form-';

$output245 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.circle', $renderingContext);
$arguments243['id'] = $output245;
$arguments243['class'] = 'list';
$arguments243['additionalAttributes'] = NULL;
$arguments243['data'] = NULL;
$arguments243['controller'] = NULL;
$arguments243['package'] = NULL;
$arguments243['subpackage'] = NULL;
$arguments243['section'] = '';
$arguments243['format'] = '';
$arguments243['additionalParams'] = array (
);
$arguments243['addQueryString'] = false;
$arguments243['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments243['useParentRequest'] = false;
$arguments243['absolute'] = true;
$arguments243['dir'] = NULL;
$arguments243['lang'] = NULL;
$arguments243['style'] = NULL;
$arguments243['title'] = NULL;
$arguments243['accesskey'] = NULL;
$arguments243['tabindex'] = NULL;
$arguments243['onclick'] = NULL;
$arguments243['name'] = NULL;
$arguments243['rel'] = NULL;
$arguments243['rev'] = NULL;
$arguments243['target'] = NULL;
$renderChildrenClosure246 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments247 = array();
$arguments247['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments247['keepQuotes'] = false;
$arguments247['encoding'] = 'UTF-8';
$arguments247['doubleEncode'] = true;
$renderChildrenClosure248 = function() use ($renderingContext, $self) {
return NULL;
};
$value249 = ($arguments247['value'] !== NULL ? $arguments247['value'] : $renderChildrenClosure248());
return !is_string($value249) && !(is_object($value249) && method_exists($value249, '__toString')) ? $value249 : htmlspecialchars($value249, ($arguments247['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments247['encoding'], $arguments247['doubleEncode']);
};
$viewHelper250 = $self->getViewHelper('$viewHelper250', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper250->setArguments($arguments243);
$viewHelper250->setRenderingContext($renderingContext);
$viewHelper250->setRenderChildrenClosure($renderChildrenClosure246);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output239 .= $viewHelper250->initializeArgumentsAndRender();

$output239 .= '
												</li>
											';
return $output239;
};

$output236 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments237, $renderChildrenClosure238, $renderingContext);

$output236 .= '
									';
return $output236;
};
$arguments212['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper251 = $self->getViewHelper('$viewHelper251', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper251->setArguments($arguments212);
$viewHelper251->setRenderingContext($renderingContext);
$viewHelper251->setRenderChildrenClosure($renderChildrenClosure213);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output137 .= $viewHelper251->initializeArgumentsAndRender();

$output137 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments252 = array();
$arguments252['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments252['keepQuotes'] = false;
$arguments252['encoding'] = 'UTF-8';
$arguments252['doubleEncode'] = true;
$renderChildrenClosure253 = function() use ($renderingContext, $self) {
return NULL;
};
$value254 = ($arguments252['value'] !== NULL ? $arguments252['value'] : $renderChildrenClosure253());

$output137 .= !is_string($value254) && !(is_object($value254) && method_exists($value254, '__toString')) ? $value254 : htmlspecialchars($value254, ($arguments252['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments252['encoding'], $arguments252['doubleEncode']);

$output137 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments255 = array();
$arguments255['action'] = 'logout';
$arguments255['additionalAttributes'] = NULL;
$arguments255['data'] = NULL;
$arguments255['arguments'] = array (
);
$arguments255['controller'] = NULL;
$arguments255['package'] = NULL;
$arguments255['subpackage'] = NULL;
$arguments255['section'] = '';
$arguments255['format'] = '';
$arguments255['additionalParams'] = array (
);
$arguments255['addQueryString'] = false;
$arguments255['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments255['useParentRequest'] = false;
$arguments255['absolute'] = true;
$arguments255['class'] = NULL;
$arguments255['dir'] = NULL;
$arguments255['id'] = NULL;
$arguments255['lang'] = NULL;
$arguments255['style'] = NULL;
$arguments255['title'] = NULL;
$arguments255['accesskey'] = NULL;
$arguments255['tabindex'] = NULL;
$arguments255['onclick'] = NULL;
$arguments255['name'] = NULL;
$arguments255['rel'] = NULL;
$arguments255['rev'] = NULL;
$arguments255['target'] = NULL;
$renderChildrenClosure256 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper257 = $self->getViewHelper('$viewHelper257', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper257->setArguments($arguments255);
$viewHelper257->setRenderingContext($renderingContext);
$viewHelper257->setRenderChildrenClosure($renderChildrenClosure256);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output137 .= $viewHelper257->initializeArgumentsAndRender();

$output137 .= '</li>
											<li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments258 = array();
$arguments258['action'] = 'profile';
$arguments258['additionalAttributes'] = NULL;
$arguments258['data'] = NULL;
$arguments258['arguments'] = array (
);
$arguments258['controller'] = NULL;
$arguments258['package'] = NULL;
$arguments258['subpackage'] = NULL;
$arguments258['section'] = '';
$arguments258['format'] = '';
$arguments258['additionalParams'] = array (
);
$arguments258['addQueryString'] = false;
$arguments258['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments258['useParentRequest'] = false;
$arguments258['absolute'] = true;
$arguments258['class'] = NULL;
$arguments258['dir'] = NULL;
$arguments258['id'] = NULL;
$arguments258['lang'] = NULL;
$arguments258['style'] = NULL;
$arguments258['title'] = NULL;
$arguments258['accesskey'] = NULL;
$arguments258['tabindex'] = NULL;
$arguments258['onclick'] = NULL;
$arguments258['name'] = NULL;
$arguments258['rel'] = NULL;
$arguments258['rev'] = NULL;
$arguments258['target'] = NULL;
$renderChildrenClosure259 = function() use ($renderingContext, $self) {
return 'Profile';
};
$viewHelper260 = $self->getViewHelper('$viewHelper260', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper260->setArguments($arguments258);
$viewHelper260->setRenderingContext($renderingContext);
$viewHelper260->setRenderChildrenClosure($renderChildrenClosure259);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output137 .= $viewHelper260->initializeArgumentsAndRender();

$output137 .= '</li>
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
	              <a id="btn-frm1" href="http://local.project.dev/forms/form1" class="btn btn-primary btn-lg" role="button" style="visibility:hidden">Go to Form1</a>
	  </p>
	          </div>
	      </div>

	      <!-- Question list here -->

	  </div>
	  <div style="display:none" class="text-right">
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
return $output137;
};

$output124 .= '';

$output124 .= '
';

return $output124;
}


}
#0             93447     