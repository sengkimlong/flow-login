<?php class FluidCache_SKL_Test_Form_action_show_2ad29cfe3fe583f4ec2b488e6294807b6a4770f3 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
  ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments1 = array();
$arguments1['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments1['as'] = 'question';
$arguments1['key'] = '';
$arguments1['reverse'] = false;
$arguments1['iteration'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
      ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments4 = array();
$arguments4['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments4['keepQuotes'] = false;
$arguments4['encoding'] = 'UTF-8';
$arguments4['doubleEncode'] = true;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$value6 = ($arguments4['value'] !== NULL ? $arguments4['value'] : $renderChildrenClosure5());

$output3 .= !is_string($value6) && !(is_object($value6) && method_exists($value6, '__toString')) ? $value6 : htmlspecialchars($value6, ($arguments4['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments4['encoding'], $arguments4['doubleEncode']);

$output3 .= '
  ';
return $output3;
};

$output0 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
	<table>
		<tr>
			<th>Name</th>
			<td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments7 = array();
$arguments7['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments7['keepQuotes'] = false;
$arguments7['encoding'] = 'UTF-8';
$arguments7['doubleEncode'] = true;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$value9 = ($arguments7['value'] !== NULL ? $arguments7['value'] : $renderChildrenClosure8());

$output0 .= !is_string($value9) && !(is_object($value9) && method_exists($value9, '__toString')) ? $value9 : htmlspecialchars($value9, ($arguments7['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments7['encoding'], $arguments7['doubleEncode']);

$output0 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments10 = array();
$arguments10['action'] = 'create';
$arguments10['controller'] = 'question';
$arguments10['objectName'] = 'newQuestion';
$arguments10['additionalAttributes'] = NULL;
$arguments10['data'] = NULL;
$arguments10['arguments'] = array (
);
$arguments10['package'] = NULL;
$arguments10['subpackage'] = NULL;
$arguments10['object'] = NULL;
$arguments10['section'] = '';
$arguments10['format'] = '';
$arguments10['additionalParams'] = array (
);
$arguments10['absolute'] = false;
$arguments10['addQueryString'] = false;
$arguments10['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments10['fieldNamePrefix'] = NULL;
$arguments10['actionUri'] = NULL;
$arguments10['useParentRequest'] = false;
$arguments10['enctype'] = NULL;
$arguments10['method'] = NULL;
$arguments10['name'] = NULL;
$arguments10['onreset'] = NULL;
$arguments10['onsubmit'] = NULL;
$arguments10['class'] = NULL;
$arguments10['dir'] = NULL;
$arguments10['id'] = NULL;
$arguments10['lang'] = NULL;
$arguments10['style'] = NULL;
$arguments10['title'] = NULL;
$arguments10['accesskey'] = NULL;
$arguments10['tabindex'] = NULL;
$arguments10['onclick'] = NULL;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
$output12 = '';

$output12 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments13 = array();
$arguments13['property'] = 'sentence';
$arguments13['additionalAttributes'] = NULL;
$arguments13['data'] = NULL;
$arguments13['required'] = false;
$arguments13['type'] = 'text';
$arguments13['name'] = NULL;
$arguments13['value'] = NULL;
$arguments13['disabled'] = NULL;
$arguments13['maxlength'] = NULL;
$arguments13['readonly'] = NULL;
$arguments13['size'] = NULL;
$arguments13['placeholder'] = NULL;
$arguments13['autofocus'] = NULL;
$arguments13['errorClass'] = 'f3-form-error';
$arguments13['class'] = NULL;
$arguments13['dir'] = NULL;
$arguments13['id'] = NULL;
$arguments13['lang'] = NULL;
$arguments13['style'] = NULL;
$arguments13['title'] = NULL;
$arguments13['accesskey'] = NULL;
$arguments13['tabindex'] = NULL;
$arguments13['onclick'] = NULL;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output12 .= $viewHelper15->initializeArgumentsAndRender();

$output12 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments16 = array();
$arguments16['property'] = 'form';
$arguments16['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments16['additionalAttributes'] = NULL;
$arguments16['data'] = NULL;
$arguments16['name'] = NULL;
$arguments16['class'] = NULL;
$arguments16['dir'] = NULL;
$arguments16['id'] = NULL;
$arguments16['lang'] = NULL;
$arguments16['style'] = NULL;
$arguments16['title'] = NULL;
$arguments16['accesskey'] = NULL;
$arguments16['tabindex'] = NULL;
$arguments16['onclick'] = NULL;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper18 = $self->getViewHelper('$viewHelper18', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper18->setArguments($arguments16);
$viewHelper18->setRenderingContext($renderingContext);
$viewHelper18->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output12 .= $viewHelper18->initializeArgumentsAndRender();

$output12 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments19 = array();
$arguments19['value'] = 'Submit';
$arguments19['additionalAttributes'] = NULL;
$arguments19['data'] = NULL;
$arguments19['name'] = NULL;
$arguments19['property'] = NULL;
$arguments19['disabled'] = NULL;
$arguments19['class'] = NULL;
$arguments19['dir'] = NULL;
$arguments19['id'] = NULL;
$arguments19['lang'] = NULL;
$arguments19['style'] = NULL;
$arguments19['title'] = NULL;
$arguments19['accesskey'] = NULL;
$arguments19['tabindex'] = NULL;
$arguments19['onclick'] = NULL;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper21 = $self->getViewHelper('$viewHelper21', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper21->setArguments($arguments19);
$viewHelper21->setRenderingContext($renderingContext);
$viewHelper21->setRenderChildrenClosure($renderChildrenClosure20);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output12 .= $viewHelper21->initializeArgumentsAndRender();

$output12 .= '
            ';
return $output12;
};
$viewHelper22 = $self->getViewHelper('$viewHelper22', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper22->setArguments($arguments10);
$viewHelper22->setRenderingContext($renderingContext);
$viewHelper22->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper22->initializeArgumentsAndRender();

$output0 .= '
            </td>
		</tr>
	</table>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments23 = array();
$arguments23['action'] = 'index';
$arguments23['additionalAttributes'] = NULL;
$arguments23['data'] = NULL;
$arguments23['arguments'] = array (
);
$arguments23['controller'] = NULL;
$arguments23['package'] = NULL;
$arguments23['subpackage'] = NULL;
$arguments23['section'] = '';
$arguments23['format'] = '';
$arguments23['additionalParams'] = array (
);
$arguments23['addQueryString'] = false;
$arguments23['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments23['useParentRequest'] = false;
$arguments23['absolute'] = true;
$arguments23['class'] = NULL;
$arguments23['dir'] = NULL;
$arguments23['id'] = NULL;
$arguments23['lang'] = NULL;
$arguments23['style'] = NULL;
$arguments23['title'] = NULL;
$arguments23['accesskey'] = NULL;
$arguments23['tabindex'] = NULL;
$arguments23['onclick'] = NULL;
$arguments23['name'] = NULL;
$arguments23['rel'] = NULL;
$arguments23['rev'] = NULL;
$arguments23['target'] = NULL;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper25 = $self->getViewHelper('$viewHelper25', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper25->setArguments($arguments23);
$viewHelper25->setRenderingContext($renderingContext);
$viewHelper25->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper25->initializeArgumentsAndRender();

$output0 .= '




  <nav class="navbar navbar-default">
	  <div class="container">
	      <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	          </button>
	          <a href="http://flow-login.dev/forms" class="navbar-brand">Team 2</a>
	      </div> <!-- End navbar-header -->

	      <div class="collapse navbar-collapse" id="navigation">
	          <ul class="nav navbar-nav navbar-right">
	              <li id="list-1" class="item active"><a href="http://flow-login.dev/forms">Home</a></li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments26 = array();
// Rendering Boolean node
$arguments26['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments26['then'] = NULL;
$arguments26['else'] = NULL;
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
$output28 = '';

$output28 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments29 = array();
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$output31 = '';

$output31 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments32 = array();
$arguments32['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments32['as'] = 'format';
$arguments32['iteration'] = 'key';
$arguments32['key'] = '';
$arguments32['reverse'] = false;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
$output34 = '';

$output34 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments35 = array();
$arguments35['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments35['keepQuotes'] = false;
$arguments35['encoding'] = 'UTF-8';
$arguments35['doubleEncode'] = true;
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
return NULL;
};
$value37 = ($arguments35['value'] !== NULL ? $arguments35['value'] : $renderChildrenClosure36());

$output34 .= !is_string($value37) && !(is_object($value37) && method_exists($value37, '__toString')) ? $value37 : htmlspecialchars($value37, ($arguments35['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments35['encoding'], $arguments35['doubleEncode']);

$output34 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments38 = array();
$arguments38['action'] = 'show';
// Rendering Array
$array39 = array();
$array39['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments38['arguments'] = $array39;
$output40 = '';

$output40 .= 'form-';

$output40 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments38['id'] = $output40;
$arguments38['class'] = 'list';
$arguments38['additionalAttributes'] = NULL;
$arguments38['data'] = NULL;
$arguments38['controller'] = NULL;
$arguments38['package'] = NULL;
$arguments38['subpackage'] = NULL;
$arguments38['section'] = '';
$arguments38['format'] = '';
$arguments38['additionalParams'] = array (
);
$arguments38['addQueryString'] = false;
$arguments38['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments38['useParentRequest'] = false;
$arguments38['absolute'] = true;
$arguments38['dir'] = NULL;
$arguments38['lang'] = NULL;
$arguments38['style'] = NULL;
$arguments38['title'] = NULL;
$arguments38['accesskey'] = NULL;
$arguments38['tabindex'] = NULL;
$arguments38['onclick'] = NULL;
$arguments38['name'] = NULL;
$arguments38['rel'] = NULL;
$arguments38['rev'] = NULL;
$arguments38['target'] = NULL;
$renderChildrenClosure41 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments42 = array();
$arguments42['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments42['keepQuotes'] = false;
$arguments42['encoding'] = 'UTF-8';
$arguments42['doubleEncode'] = true;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
return NULL;
};
$value44 = ($arguments42['value'] !== NULL ? $arguments42['value'] : $renderChildrenClosure43());
return !is_string($value44) && !(is_object($value44) && method_exists($value44, '__toString')) ? $value44 : htmlspecialchars($value44, ($arguments42['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments42['encoding'], $arguments42['doubleEncode']);
};
$viewHelper45 = $self->getViewHelper('$viewHelper45', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper45->setArguments($arguments38);
$viewHelper45->setRenderingContext($renderingContext);
$viewHelper45->setRenderChildrenClosure($renderChildrenClosure41);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output34 .= $viewHelper45->initializeArgumentsAndRender();

$output34 .= '
												</li>
											';
return $output34;
};

$output31 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments32, $renderChildrenClosure33, $renderingContext);

$output31 .= '
									';
return $output31;
};
$viewHelper46 = $self->getViewHelper('$viewHelper46', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper46->setArguments($arguments29);
$viewHelper46->setRenderingContext($renderingContext);
$viewHelper46->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output28 .= $viewHelper46->initializeArgumentsAndRender();

$output28 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments47 = array();
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper49 = $self->getViewHelper('$viewHelper49', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper49->setArguments($arguments47);
$viewHelper49->setRenderingContext($renderingContext);
$viewHelper49->setRenderChildrenClosure($renderChildrenClosure48);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output28 .= $viewHelper49->initializeArgumentsAndRender();

$output28 .= '
								';
return $output28;
};
$arguments26['__thenClosure'] = function() use ($renderingContext, $self) {
$output50 = '';

$output50 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments51 = array();
$arguments51['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments51['as'] = 'format';
$arguments51['iteration'] = 'key';
$arguments51['key'] = '';
$arguments51['reverse'] = false;
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
$output53 = '';

$output53 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments54 = array();
$arguments54['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments54['keepQuotes'] = false;
$arguments54['encoding'] = 'UTF-8';
$arguments54['doubleEncode'] = true;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
return NULL;
};
$value56 = ($arguments54['value'] !== NULL ? $arguments54['value'] : $renderChildrenClosure55());

$output53 .= !is_string($value56) && !(is_object($value56) && method_exists($value56, '__toString')) ? $value56 : htmlspecialchars($value56, ($arguments54['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments54['encoding'], $arguments54['doubleEncode']);

$output53 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments57 = array();
$arguments57['action'] = 'show';
// Rendering Array
$array58 = array();
$array58['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments57['arguments'] = $array58;
$output59 = '';

$output59 .= 'form-';

$output59 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments57['id'] = $output59;
$arguments57['class'] = 'list';
$arguments57['additionalAttributes'] = NULL;
$arguments57['data'] = NULL;
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
$arguments57['dir'] = NULL;
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
$renderChildrenClosure60 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments61 = array();
$arguments61['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments61['keepQuotes'] = false;
$arguments61['encoding'] = 'UTF-8';
$arguments61['doubleEncode'] = true;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
return NULL;
};
$value63 = ($arguments61['value'] !== NULL ? $arguments61['value'] : $renderChildrenClosure62());
return !is_string($value63) && !(is_object($value63) && method_exists($value63, '__toString')) ? $value63 : htmlspecialchars($value63, ($arguments61['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments61['encoding'], $arguments61['doubleEncode']);
};
$viewHelper64 = $self->getViewHelper('$viewHelper64', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper64->setArguments($arguments57);
$viewHelper64->setRenderingContext($renderingContext);
$viewHelper64->setRenderChildrenClosure($renderChildrenClosure60);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output53 .= $viewHelper64->initializeArgumentsAndRender();

$output53 .= '
												</li>
											';
return $output53;
};

$output50 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments51, $renderChildrenClosure52, $renderingContext);

$output50 .= '
									';
return $output50;
};
$arguments26['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper65 = $self->getViewHelper('$viewHelper65', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper65->setArguments($arguments26);
$viewHelper65->setRenderingContext($renderingContext);
$viewHelper65->setRenderChildrenClosure($renderChildrenClosure27);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper65->initializeArgumentsAndRender();

$output0 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments66 = array();
$arguments66['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments66['keepQuotes'] = false;
$arguments66['encoding'] = 'UTF-8';
$arguments66['doubleEncode'] = true;
$renderChildrenClosure67 = function() use ($renderingContext, $self) {
return NULL;
};
$value68 = ($arguments66['value'] !== NULL ? $arguments66['value'] : $renderChildrenClosure67());

$output0 .= !is_string($value68) && !(is_object($value68) && method_exists($value68, '__toString')) ? $value68 : htmlspecialchars($value68, ($arguments66['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments66['encoding'], $arguments66['doubleEncode']);

$output0 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments69 = array();
$arguments69['action'] = 'logout';
$arguments69['additionalAttributes'] = NULL;
$arguments69['data'] = NULL;
$arguments69['arguments'] = array (
);
$arguments69['controller'] = NULL;
$arguments69['package'] = NULL;
$arguments69['subpackage'] = NULL;
$arguments69['section'] = '';
$arguments69['format'] = '';
$arguments69['additionalParams'] = array (
);
$arguments69['addQueryString'] = false;
$arguments69['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments69['useParentRequest'] = false;
$arguments69['absolute'] = true;
$arguments69['class'] = NULL;
$arguments69['dir'] = NULL;
$arguments69['id'] = NULL;
$arguments69['lang'] = NULL;
$arguments69['style'] = NULL;
$arguments69['title'] = NULL;
$arguments69['accesskey'] = NULL;
$arguments69['tabindex'] = NULL;
$arguments69['onclick'] = NULL;
$arguments69['name'] = NULL;
$arguments69['rel'] = NULL;
$arguments69['rev'] = NULL;
$arguments69['target'] = NULL;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper71->setArguments($arguments69);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper71->initializeArgumentsAndRender();

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
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments72 = array();
$arguments72['additionalAttributes'] = NULL;
$arguments72['data'] = NULL;
$arguments72['action'] = NULL;
$arguments72['arguments'] = array (
);
$arguments72['controller'] = NULL;
$arguments72['package'] = NULL;
$arguments72['subpackage'] = NULL;
$arguments72['object'] = NULL;
$arguments72['section'] = '';
$arguments72['format'] = '';
$arguments72['additionalParams'] = array (
);
$arguments72['absolute'] = false;
$arguments72['addQueryString'] = false;
$arguments72['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments72['fieldNamePrefix'] = NULL;
$arguments72['actionUri'] = NULL;
$arguments72['objectName'] = NULL;
$arguments72['useParentRequest'] = false;
$arguments72['enctype'] = NULL;
$arguments72['method'] = NULL;
$arguments72['name'] = NULL;
$arguments72['onreset'] = NULL;
$arguments72['onsubmit'] = NULL;
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
$output74 = '';

$output74 .= '	  
		  <div id="questionList" class="row">
		      <div class="col-md-12 col-sm-12 col-xs-12">

	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments75 = array();
$arguments75['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments75['as'] = 'question';
$arguments75['iteration'] = 'key';
$arguments75['key'] = '';
$arguments75['reverse'] = false;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
$output77 = '';

$output77 .= '
	            <div class="col-md-6">
	                <div class="list-group">
	                    <div class="list-group-item">
	                      <h4 class="list-group-item-heading">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments78 = array();
$arguments78['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments78['keepQuotes'] = false;
$arguments78['encoding'] = 'UTF-8';
$arguments78['doubleEncode'] = true;
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
return NULL;
};
$value80 = ($arguments78['value'] !== NULL ? $arguments78['value'] : $renderChildrenClosure79());

$output77 .= !is_string($value80) && !(is_object($value80) && method_exists($value80, '__toString')) ? $value80 : htmlspecialchars($value80, ($arguments78['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments78['encoding'], $arguments78['doubleEncode']);

$output77 .= '</h4>

	                      <input type="text" id="answer-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments81 = array();
$arguments81['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments81['keepQuotes'] = false;
$arguments81['encoding'] = 'UTF-8';
$arguments81['doubleEncode'] = true;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
return NULL;
};
$value83 = ($arguments81['value'] !== NULL ? $arguments81['value'] : $renderChildrenClosure82());

$output77 .= !is_string($value83) && !(is_object($value83) && method_exists($value83, '__toString')) ? $value83 : htmlspecialchars($value83, ($arguments81['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments81['encoding'], $arguments81['doubleEncode']);

$output77 .= '  \'" class="form-control" name="answer" placeholder="Input answer" required>

	                      <p id="alert-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments84 = array();
$arguments84['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments84['keepQuotes'] = false;
$arguments84['encoding'] = 'UTF-8';
$arguments84['doubleEncode'] = true;
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
return NULL;
};
$value86 = ($arguments84['value'] !== NULL ? $arguments84['value'] : $renderChildrenClosure85());

$output77 .= !is_string($value86) && !(is_object($value86) && method_exists($value86, '__toString')) ? $value86 : htmlspecialchars($value86, ($arguments84['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments84['encoding'], $arguments84['doubleEncode']);

$output77 .= '" style="color: red;visibility: hidden;">*Please input your answer...</p>
	                    </div>
	                </div>
	            </div>
	          ';
return $output77;
};

$output74 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments75, $renderChildrenClosure76, $renderingContext);

$output74 .= '
	    ';
return $output74;
};
$viewHelper87 = $self->getViewHelper('$viewHelper87', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper87->setArguments($arguments72);
$viewHelper87->setRenderingContext($renderingContext);
$viewHelper87->setRenderChildrenClosure($renderChildrenClosure73);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper87->initializeArgumentsAndRender();

$output0 .= '
	        </div>
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
$output88 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments89 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments90 = array();
$arguments90['name'] = 'Default';
$renderChildrenClosure91 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper92 = $self->getViewHelper('$viewHelper92', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper92->setArguments($arguments90);
$viewHelper92->setRenderingContext($renderingContext);
$viewHelper92->setRenderChildrenClosure($renderChildrenClosure91);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments89['value'] = $viewHelper92->initializeArgumentsAndRender();
$arguments89['keepQuotes'] = false;
$arguments89['encoding'] = 'UTF-8';
$arguments89['doubleEncode'] = true;
$renderChildrenClosure93 = function() use ($renderingContext, $self) {
return NULL;
};
$value94 = ($arguments89['value'] !== NULL ? $arguments89['value'] : $renderChildrenClosure93());

$output88 .= !is_string($value94) && !(is_object($value94) && method_exists($value94, '__toString')) ? $value94 : htmlspecialchars($value94, ($arguments89['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments89['encoding'], $arguments89['doubleEncode']);

$output88 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments95 = array();
$arguments95['name'] = 'Title';
$renderChildrenClosure96 = function() use ($renderingContext, $self) {
return NULL;
};

$output88 .= '';

$output88 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments97 = array();
$arguments97['name'] = 'stylesheet';
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
return NULL;
};

$output88 .= '';

$output88 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments99 = array();
$arguments99['name'] = 'Content';
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
$output101 = '';

$output101 .= '
  ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments102 = array();
$arguments102['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments102['as'] = 'question';
$arguments102['key'] = '';
$arguments102['reverse'] = false;
$arguments102['iteration'] = NULL;
$renderChildrenClosure103 = function() use ($renderingContext, $self) {
$output104 = '';

$output104 .= '
      ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments105 = array();
$arguments105['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments105['keepQuotes'] = false;
$arguments105['encoding'] = 'UTF-8';
$arguments105['doubleEncode'] = true;
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return NULL;
};
$value107 = ($arguments105['value'] !== NULL ? $arguments105['value'] : $renderChildrenClosure106());

$output104 .= !is_string($value107) && !(is_object($value107) && method_exists($value107, '__toString')) ? $value107 : htmlspecialchars($value107, ($arguments105['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments105['encoding'], $arguments105['doubleEncode']);

$output104 .= '
  ';
return $output104;
};

$output101 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments102, $renderChildrenClosure103, $renderingContext);

$output101 .= '
	<table>
		<tr>
			<th>Name</th>
			<td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments108 = array();
$arguments108['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments108['keepQuotes'] = false;
$arguments108['encoding'] = 'UTF-8';
$arguments108['doubleEncode'] = true;
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
return NULL;
};
$value110 = ($arguments108['value'] !== NULL ? $arguments108['value'] : $renderChildrenClosure109());

$output101 .= !is_string($value110) && !(is_object($value110) && method_exists($value110, '__toString')) ? $value110 : htmlspecialchars($value110, ($arguments108['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments108['encoding'], $arguments108['doubleEncode']);

$output101 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments111 = array();
$arguments111['action'] = 'create';
$arguments111['controller'] = 'question';
$arguments111['objectName'] = 'newQuestion';
$arguments111['additionalAttributes'] = NULL;
$arguments111['data'] = NULL;
$arguments111['arguments'] = array (
);
$arguments111['package'] = NULL;
$arguments111['subpackage'] = NULL;
$arguments111['object'] = NULL;
$arguments111['section'] = '';
$arguments111['format'] = '';
$arguments111['additionalParams'] = array (
);
$arguments111['absolute'] = false;
$arguments111['addQueryString'] = false;
$arguments111['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments111['fieldNamePrefix'] = NULL;
$arguments111['actionUri'] = NULL;
$arguments111['useParentRequest'] = false;
$arguments111['enctype'] = NULL;
$arguments111['method'] = NULL;
$arguments111['name'] = NULL;
$arguments111['onreset'] = NULL;
$arguments111['onsubmit'] = NULL;
$arguments111['class'] = NULL;
$arguments111['dir'] = NULL;
$arguments111['id'] = NULL;
$arguments111['lang'] = NULL;
$arguments111['style'] = NULL;
$arguments111['title'] = NULL;
$arguments111['accesskey'] = NULL;
$arguments111['tabindex'] = NULL;
$arguments111['onclick'] = NULL;
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
$output113 = '';

$output113 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments114 = array();
$arguments114['property'] = 'sentence';
$arguments114['additionalAttributes'] = NULL;
$arguments114['data'] = NULL;
$arguments114['required'] = false;
$arguments114['type'] = 'text';
$arguments114['name'] = NULL;
$arguments114['value'] = NULL;
$arguments114['disabled'] = NULL;
$arguments114['maxlength'] = NULL;
$arguments114['readonly'] = NULL;
$arguments114['size'] = NULL;
$arguments114['placeholder'] = NULL;
$arguments114['autofocus'] = NULL;
$arguments114['errorClass'] = 'f3-form-error';
$arguments114['class'] = NULL;
$arguments114['dir'] = NULL;
$arguments114['id'] = NULL;
$arguments114['lang'] = NULL;
$arguments114['style'] = NULL;
$arguments114['title'] = NULL;
$arguments114['accesskey'] = NULL;
$arguments114['tabindex'] = NULL;
$arguments114['onclick'] = NULL;
$renderChildrenClosure115 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper116 = $self->getViewHelper('$viewHelper116', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper116->setArguments($arguments114);
$viewHelper116->setRenderingContext($renderingContext);
$viewHelper116->setRenderChildrenClosure($renderChildrenClosure115);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output113 .= $viewHelper116->initializeArgumentsAndRender();

$output113 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments117 = array();
$arguments117['property'] = 'form';
$arguments117['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments117['additionalAttributes'] = NULL;
$arguments117['data'] = NULL;
$arguments117['name'] = NULL;
$arguments117['class'] = NULL;
$arguments117['dir'] = NULL;
$arguments117['id'] = NULL;
$arguments117['lang'] = NULL;
$arguments117['style'] = NULL;
$arguments117['title'] = NULL;
$arguments117['accesskey'] = NULL;
$arguments117['tabindex'] = NULL;
$arguments117['onclick'] = NULL;
$renderChildrenClosure118 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper119 = $self->getViewHelper('$viewHelper119', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper119->setArguments($arguments117);
$viewHelper119->setRenderingContext($renderingContext);
$viewHelper119->setRenderChildrenClosure($renderChildrenClosure118);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output113 .= $viewHelper119->initializeArgumentsAndRender();

$output113 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments120 = array();
$arguments120['value'] = 'Submit';
$arguments120['additionalAttributes'] = NULL;
$arguments120['data'] = NULL;
$arguments120['name'] = NULL;
$arguments120['property'] = NULL;
$arguments120['disabled'] = NULL;
$arguments120['class'] = NULL;
$arguments120['dir'] = NULL;
$arguments120['id'] = NULL;
$arguments120['lang'] = NULL;
$arguments120['style'] = NULL;
$arguments120['title'] = NULL;
$arguments120['accesskey'] = NULL;
$arguments120['tabindex'] = NULL;
$arguments120['onclick'] = NULL;
$renderChildrenClosure121 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper122 = $self->getViewHelper('$viewHelper122', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper122->setArguments($arguments120);
$viewHelper122->setRenderingContext($renderingContext);
$viewHelper122->setRenderChildrenClosure($renderChildrenClosure121);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output113 .= $viewHelper122->initializeArgumentsAndRender();

$output113 .= '
            ';
return $output113;
};
$viewHelper123 = $self->getViewHelper('$viewHelper123', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper123->setArguments($arguments111);
$viewHelper123->setRenderingContext($renderingContext);
$viewHelper123->setRenderChildrenClosure($renderChildrenClosure112);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output101 .= $viewHelper123->initializeArgumentsAndRender();

$output101 .= '
            </td>
		</tr>
	</table>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments124 = array();
$arguments124['action'] = 'index';
$arguments124['additionalAttributes'] = NULL;
$arguments124['data'] = NULL;
$arguments124['arguments'] = array (
);
$arguments124['controller'] = NULL;
$arguments124['package'] = NULL;
$arguments124['subpackage'] = NULL;
$arguments124['section'] = '';
$arguments124['format'] = '';
$arguments124['additionalParams'] = array (
);
$arguments124['addQueryString'] = false;
$arguments124['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments124['useParentRequest'] = false;
$arguments124['absolute'] = true;
$arguments124['class'] = NULL;
$arguments124['dir'] = NULL;
$arguments124['id'] = NULL;
$arguments124['lang'] = NULL;
$arguments124['style'] = NULL;
$arguments124['title'] = NULL;
$arguments124['accesskey'] = NULL;
$arguments124['tabindex'] = NULL;
$arguments124['onclick'] = NULL;
$arguments124['name'] = NULL;
$arguments124['rel'] = NULL;
$arguments124['rev'] = NULL;
$arguments124['target'] = NULL;
$renderChildrenClosure125 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper126 = $self->getViewHelper('$viewHelper126', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper126->setArguments($arguments124);
$viewHelper126->setRenderingContext($renderingContext);
$viewHelper126->setRenderChildrenClosure($renderChildrenClosure125);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output101 .= $viewHelper126->initializeArgumentsAndRender();

$output101 .= '




  <nav class="navbar navbar-default">
	  <div class="container">
	      <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	          </button>
	          <a href="http://flow-login.dev/forms" class="navbar-brand">Team 2</a>
	      </div> <!-- End navbar-header -->

	      <div class="collapse navbar-collapse" id="navigation">
	          <ul class="nav navbar-nav navbar-right">
	              <li id="list-1" class="item active"><a href="http://flow-login.dev/forms">Home</a></li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments127 = array();
// Rendering Boolean node
$arguments127['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments127['then'] = NULL;
$arguments127['else'] = NULL;
$renderChildrenClosure128 = function() use ($renderingContext, $self) {
$output129 = '';

$output129 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments130 = array();
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
$output132 = '';

$output132 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments133 = array();
$arguments133['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments133['as'] = 'format';
$arguments133['iteration'] = 'key';
$arguments133['key'] = '';
$arguments133['reverse'] = false;
$renderChildrenClosure134 = function() use ($renderingContext, $self) {
$output135 = '';

$output135 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments136 = array();
$arguments136['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments136['keepQuotes'] = false;
$arguments136['encoding'] = 'UTF-8';
$arguments136['doubleEncode'] = true;
$renderChildrenClosure137 = function() use ($renderingContext, $self) {
return NULL;
};
$value138 = ($arguments136['value'] !== NULL ? $arguments136['value'] : $renderChildrenClosure137());

$output135 .= !is_string($value138) && !(is_object($value138) && method_exists($value138, '__toString')) ? $value138 : htmlspecialchars($value138, ($arguments136['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments136['encoding'], $arguments136['doubleEncode']);

$output135 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments139 = array();
$arguments139['action'] = 'show';
// Rendering Array
$array140 = array();
$array140['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments139['arguments'] = $array140;
$output141 = '';

$output141 .= 'form-';

$output141 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments139['id'] = $output141;
$arguments139['class'] = 'list';
$arguments139['additionalAttributes'] = NULL;
$arguments139['data'] = NULL;
$arguments139['controller'] = NULL;
$arguments139['package'] = NULL;
$arguments139['subpackage'] = NULL;
$arguments139['section'] = '';
$arguments139['format'] = '';
$arguments139['additionalParams'] = array (
);
$arguments139['addQueryString'] = false;
$arguments139['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments139['useParentRequest'] = false;
$arguments139['absolute'] = true;
$arguments139['dir'] = NULL;
$arguments139['lang'] = NULL;
$arguments139['style'] = NULL;
$arguments139['title'] = NULL;
$arguments139['accesskey'] = NULL;
$arguments139['tabindex'] = NULL;
$arguments139['onclick'] = NULL;
$arguments139['name'] = NULL;
$arguments139['rel'] = NULL;
$arguments139['rev'] = NULL;
$arguments139['target'] = NULL;
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments143 = array();
$arguments143['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments143['keepQuotes'] = false;
$arguments143['encoding'] = 'UTF-8';
$arguments143['doubleEncode'] = true;
$renderChildrenClosure144 = function() use ($renderingContext, $self) {
return NULL;
};
$value145 = ($arguments143['value'] !== NULL ? $arguments143['value'] : $renderChildrenClosure144());
return !is_string($value145) && !(is_object($value145) && method_exists($value145, '__toString')) ? $value145 : htmlspecialchars($value145, ($arguments143['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments143['encoding'], $arguments143['doubleEncode']);
};
$viewHelper146 = $self->getViewHelper('$viewHelper146', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper146->setArguments($arguments139);
$viewHelper146->setRenderingContext($renderingContext);
$viewHelper146->setRenderChildrenClosure($renderChildrenClosure142);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output135 .= $viewHelper146->initializeArgumentsAndRender();

$output135 .= '
												</li>
											';
return $output135;
};

$output132 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments133, $renderChildrenClosure134, $renderingContext);

$output132 .= '
									';
return $output132;
};
$viewHelper147 = $self->getViewHelper('$viewHelper147', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper147->setArguments($arguments130);
$viewHelper147->setRenderingContext($renderingContext);
$viewHelper147->setRenderChildrenClosure($renderChildrenClosure131);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output129 .= $viewHelper147->initializeArgumentsAndRender();

$output129 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments148 = array();
$renderChildrenClosure149 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper150 = $self->getViewHelper('$viewHelper150', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper150->setArguments($arguments148);
$viewHelper150->setRenderingContext($renderingContext);
$viewHelper150->setRenderChildrenClosure($renderChildrenClosure149);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output129 .= $viewHelper150->initializeArgumentsAndRender();

$output129 .= '
								';
return $output129;
};
$arguments127['__thenClosure'] = function() use ($renderingContext, $self) {
$output151 = '';

$output151 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments152 = array();
$arguments152['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments152['as'] = 'format';
$arguments152['iteration'] = 'key';
$arguments152['key'] = '';
$arguments152['reverse'] = false;
$renderChildrenClosure153 = function() use ($renderingContext, $self) {
$output154 = '';

$output154 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments155 = array();
$arguments155['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments155['keepQuotes'] = false;
$arguments155['encoding'] = 'UTF-8';
$arguments155['doubleEncode'] = true;
$renderChildrenClosure156 = function() use ($renderingContext, $self) {
return NULL;
};
$value157 = ($arguments155['value'] !== NULL ? $arguments155['value'] : $renderChildrenClosure156());

$output154 .= !is_string($value157) && !(is_object($value157) && method_exists($value157, '__toString')) ? $value157 : htmlspecialchars($value157, ($arguments155['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments155['encoding'], $arguments155['doubleEncode']);

$output154 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments158 = array();
$arguments158['action'] = 'show';
// Rendering Array
$array159 = array();
$array159['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments158['arguments'] = $array159;
$output160 = '';

$output160 .= 'form-';

$output160 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments158['id'] = $output160;
$arguments158['class'] = 'list';
$arguments158['additionalAttributes'] = NULL;
$arguments158['data'] = NULL;
$arguments158['controller'] = NULL;
$arguments158['package'] = NULL;
$arguments158['subpackage'] = NULL;
$arguments158['section'] = '';
$arguments158['format'] = '';
$arguments158['additionalParams'] = array (
);
$arguments158['addQueryString'] = false;
$arguments158['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments158['useParentRequest'] = false;
$arguments158['absolute'] = true;
$arguments158['dir'] = NULL;
$arguments158['lang'] = NULL;
$arguments158['style'] = NULL;
$arguments158['title'] = NULL;
$arguments158['accesskey'] = NULL;
$arguments158['tabindex'] = NULL;
$arguments158['onclick'] = NULL;
$arguments158['name'] = NULL;
$arguments158['rel'] = NULL;
$arguments158['rev'] = NULL;
$arguments158['target'] = NULL;
$renderChildrenClosure161 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments162 = array();
$arguments162['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments162['keepQuotes'] = false;
$arguments162['encoding'] = 'UTF-8';
$arguments162['doubleEncode'] = true;
$renderChildrenClosure163 = function() use ($renderingContext, $self) {
return NULL;
};
$value164 = ($arguments162['value'] !== NULL ? $arguments162['value'] : $renderChildrenClosure163());
return !is_string($value164) && !(is_object($value164) && method_exists($value164, '__toString')) ? $value164 : htmlspecialchars($value164, ($arguments162['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments162['encoding'], $arguments162['doubleEncode']);
};
$viewHelper165 = $self->getViewHelper('$viewHelper165', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper165->setArguments($arguments158);
$viewHelper165->setRenderingContext($renderingContext);
$viewHelper165->setRenderChildrenClosure($renderChildrenClosure161);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output154 .= $viewHelper165->initializeArgumentsAndRender();

$output154 .= '
												</li>
											';
return $output154;
};

$output151 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments152, $renderChildrenClosure153, $renderingContext);

$output151 .= '
									';
return $output151;
};
$arguments127['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper166 = $self->getViewHelper('$viewHelper166', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper166->setArguments($arguments127);
$viewHelper166->setRenderingContext($renderingContext);
$viewHelper166->setRenderChildrenClosure($renderChildrenClosure128);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output101 .= $viewHelper166->initializeArgumentsAndRender();

$output101 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments167 = array();
$arguments167['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments167['keepQuotes'] = false;
$arguments167['encoding'] = 'UTF-8';
$arguments167['doubleEncode'] = true;
$renderChildrenClosure168 = function() use ($renderingContext, $self) {
return NULL;
};
$value169 = ($arguments167['value'] !== NULL ? $arguments167['value'] : $renderChildrenClosure168());

$output101 .= !is_string($value169) && !(is_object($value169) && method_exists($value169, '__toString')) ? $value169 : htmlspecialchars($value169, ($arguments167['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments167['encoding'], $arguments167['doubleEncode']);

$output101 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments170 = array();
$arguments170['action'] = 'logout';
$arguments170['additionalAttributes'] = NULL;
$arguments170['data'] = NULL;
$arguments170['arguments'] = array (
);
$arguments170['controller'] = NULL;
$arguments170['package'] = NULL;
$arguments170['subpackage'] = NULL;
$arguments170['section'] = '';
$arguments170['format'] = '';
$arguments170['additionalParams'] = array (
);
$arguments170['addQueryString'] = false;
$arguments170['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments170['useParentRequest'] = false;
$arguments170['absolute'] = true;
$arguments170['class'] = NULL;
$arguments170['dir'] = NULL;
$arguments170['id'] = NULL;
$arguments170['lang'] = NULL;
$arguments170['style'] = NULL;
$arguments170['title'] = NULL;
$arguments170['accesskey'] = NULL;
$arguments170['tabindex'] = NULL;
$arguments170['onclick'] = NULL;
$arguments170['name'] = NULL;
$arguments170['rel'] = NULL;
$arguments170['rev'] = NULL;
$arguments170['target'] = NULL;
$renderChildrenClosure171 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper172 = $self->getViewHelper('$viewHelper172', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper172->setArguments($arguments170);
$viewHelper172->setRenderingContext($renderingContext);
$viewHelper172->setRenderChildrenClosure($renderChildrenClosure171);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output101 .= $viewHelper172->initializeArgumentsAndRender();

$output101 .= '</li>
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
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments173 = array();
$arguments173['additionalAttributes'] = NULL;
$arguments173['data'] = NULL;
$arguments173['action'] = NULL;
$arguments173['arguments'] = array (
);
$arguments173['controller'] = NULL;
$arguments173['package'] = NULL;
$arguments173['subpackage'] = NULL;
$arguments173['object'] = NULL;
$arguments173['section'] = '';
$arguments173['format'] = '';
$arguments173['additionalParams'] = array (
);
$arguments173['absolute'] = false;
$arguments173['addQueryString'] = false;
$arguments173['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments173['fieldNamePrefix'] = NULL;
$arguments173['actionUri'] = NULL;
$arguments173['objectName'] = NULL;
$arguments173['useParentRequest'] = false;
$arguments173['enctype'] = NULL;
$arguments173['method'] = NULL;
$arguments173['name'] = NULL;
$arguments173['onreset'] = NULL;
$arguments173['onsubmit'] = NULL;
$arguments173['class'] = NULL;
$arguments173['dir'] = NULL;
$arguments173['id'] = NULL;
$arguments173['lang'] = NULL;
$arguments173['style'] = NULL;
$arguments173['title'] = NULL;
$arguments173['accesskey'] = NULL;
$arguments173['tabindex'] = NULL;
$arguments173['onclick'] = NULL;
$renderChildrenClosure174 = function() use ($renderingContext, $self) {
$output175 = '';

$output175 .= '	  
		  <div id="questionList" class="row">
		      <div class="col-md-12 col-sm-12 col-xs-12">

	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments176 = array();
$arguments176['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments176['as'] = 'question';
$arguments176['iteration'] = 'key';
$arguments176['key'] = '';
$arguments176['reverse'] = false;
$renderChildrenClosure177 = function() use ($renderingContext, $self) {
$output178 = '';

$output178 .= '
	            <div class="col-md-6">
	                <div class="list-group">
	                    <div class="list-group-item">
	                      <h4 class="list-group-item-heading">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments179 = array();
$arguments179['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments179['keepQuotes'] = false;
$arguments179['encoding'] = 'UTF-8';
$arguments179['doubleEncode'] = true;
$renderChildrenClosure180 = function() use ($renderingContext, $self) {
return NULL;
};
$value181 = ($arguments179['value'] !== NULL ? $arguments179['value'] : $renderChildrenClosure180());

$output178 .= !is_string($value181) && !(is_object($value181) && method_exists($value181, '__toString')) ? $value181 : htmlspecialchars($value181, ($arguments179['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments179['encoding'], $arguments179['doubleEncode']);

$output178 .= '</h4>

	                      <input type="text" id="answer-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments182 = array();
$arguments182['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments182['keepQuotes'] = false;
$arguments182['encoding'] = 'UTF-8';
$arguments182['doubleEncode'] = true;
$renderChildrenClosure183 = function() use ($renderingContext, $self) {
return NULL;
};
$value184 = ($arguments182['value'] !== NULL ? $arguments182['value'] : $renderChildrenClosure183());

$output178 .= !is_string($value184) && !(is_object($value184) && method_exists($value184, '__toString')) ? $value184 : htmlspecialchars($value184, ($arguments182['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments182['encoding'], $arguments182['doubleEncode']);

$output178 .= '  \'" class="form-control" name="answer" placeholder="Input answer" required>

	                      <p id="alert-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments185 = array();
$arguments185['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments185['keepQuotes'] = false;
$arguments185['encoding'] = 'UTF-8';
$arguments185['doubleEncode'] = true;
$renderChildrenClosure186 = function() use ($renderingContext, $self) {
return NULL;
};
$value187 = ($arguments185['value'] !== NULL ? $arguments185['value'] : $renderChildrenClosure186());

$output178 .= !is_string($value187) && !(is_object($value187) && method_exists($value187, '__toString')) ? $value187 : htmlspecialchars($value187, ($arguments185['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments185['encoding'], $arguments185['doubleEncode']);

$output178 .= '" style="color: red;visibility: hidden;">*Please input your answer...</p>
	                    </div>
	                </div>
	            </div>
	          ';
return $output178;
};

$output175 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments176, $renderChildrenClosure177, $renderingContext);

$output175 .= '
	    ';
return $output175;
};
$viewHelper188 = $self->getViewHelper('$viewHelper188', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper188->setArguments($arguments173);
$viewHelper188->setRenderingContext($renderingContext);
$viewHelper188->setRenderChildrenClosure($renderChildrenClosure174);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output101 .= $viewHelper188->initializeArgumentsAndRender();

$output101 .= '
	        </div>
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
return $output101;
};

$output88 .= '';

$output88 .= '
';

return $output88;
}


}
#0             67185     