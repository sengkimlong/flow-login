<?php class FluidCache_SKL_Test_Form_action_profile_7997867bdfcaf622dd795dcbf2ebddd282bce8cd extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

$output0 .= ' -->




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
                <li id="list-1" class="item active">
                  ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments26 = array();
$arguments26['action'] = 'index';
$arguments26['additionalAttributes'] = NULL;
$arguments26['data'] = NULL;
$arguments26['arguments'] = array (
);
$arguments26['controller'] = NULL;
$arguments26['package'] = NULL;
$arguments26['subpackage'] = NULL;
$arguments26['section'] = '';
$arguments26['format'] = '';
$arguments26['additionalParams'] = array (
);
$arguments26['addQueryString'] = false;
$arguments26['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments26['useParentRequest'] = false;
$arguments26['absolute'] = true;
$arguments26['class'] = NULL;
$arguments26['dir'] = NULL;
$arguments26['id'] = NULL;
$arguments26['lang'] = NULL;
$arguments26['style'] = NULL;
$arguments26['title'] = NULL;
$arguments26['accesskey'] = NULL;
$arguments26['tabindex'] = NULL;
$arguments26['onclick'] = NULL;
$arguments26['name'] = NULL;
$arguments26['rel'] = NULL;
$arguments26['rev'] = NULL;
$arguments26['target'] = NULL;
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper28 = $self->getViewHelper('$viewHelper28', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper28->setArguments($arguments26);
$viewHelper28->setRenderingContext($renderingContext);
$viewHelper28->setRenderChildrenClosure($renderChildrenClosure27);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper28->initializeArgumentsAndRender();

$output0 .= '
                </li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments29 = array();
// Rendering Boolean node
$arguments29['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments29['then'] = NULL;
$arguments29['else'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$output31 = '';

$output31 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments32 = array();
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
$output34 = '';

$output34 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments35 = array();
$arguments35['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments35['as'] = 'format';
$arguments35['iteration'] = 'key';
$arguments35['key'] = '';
$arguments35['reverse'] = false;
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments38 = array();
$arguments38['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments38['keepQuotes'] = false;
$arguments38['encoding'] = 'UTF-8';
$arguments38['doubleEncode'] = true;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};
$value40 = ($arguments38['value'] !== NULL ? $arguments38['value'] : $renderChildrenClosure39());

$output37 .= !is_string($value40) && !(is_object($value40) && method_exists($value40, '__toString')) ? $value40 : htmlspecialchars($value40, ($arguments38['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments38['encoding'], $arguments38['doubleEncode']);

$output37 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments41 = array();
$arguments41['action'] = 'show';
// Rendering Array
$array42 = array();
$array42['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments41['arguments'] = $array42;
$output43 = '';

$output43 .= 'form-';

$output43 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments41['id'] = $output43;
$arguments41['class'] = 'list';
$arguments41['additionalAttributes'] = NULL;
$arguments41['data'] = NULL;
$arguments41['controller'] = NULL;
$arguments41['package'] = NULL;
$arguments41['subpackage'] = NULL;
$arguments41['section'] = '';
$arguments41['format'] = '';
$arguments41['additionalParams'] = array (
);
$arguments41['addQueryString'] = false;
$arguments41['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments41['useParentRequest'] = false;
$arguments41['absolute'] = true;
$arguments41['dir'] = NULL;
$arguments41['lang'] = NULL;
$arguments41['style'] = NULL;
$arguments41['title'] = NULL;
$arguments41['accesskey'] = NULL;
$arguments41['tabindex'] = NULL;
$arguments41['onclick'] = NULL;
$arguments41['name'] = NULL;
$arguments41['rel'] = NULL;
$arguments41['rev'] = NULL;
$arguments41['target'] = NULL;
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments45 = array();
$arguments45['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments45['keepQuotes'] = false;
$arguments45['encoding'] = 'UTF-8';
$arguments45['doubleEncode'] = true;
$renderChildrenClosure46 = function() use ($renderingContext, $self) {
return NULL;
};
$value47 = ($arguments45['value'] !== NULL ? $arguments45['value'] : $renderChildrenClosure46());
return !is_string($value47) && !(is_object($value47) && method_exists($value47, '__toString')) ? $value47 : htmlspecialchars($value47, ($arguments45['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments45['encoding'], $arguments45['doubleEncode']);
};
$viewHelper48 = $self->getViewHelper('$viewHelper48', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper48->setArguments($arguments41);
$viewHelper48->setRenderingContext($renderingContext);
$viewHelper48->setRenderChildrenClosure($renderChildrenClosure44);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output37 .= $viewHelper48->initializeArgumentsAndRender();

$output37 .= '
												</li>
											';
return $output37;
};

$output34 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments35, $renderChildrenClosure36, $renderingContext);

$output34 .= '
									';
return $output34;
};
$viewHelper49 = $self->getViewHelper('$viewHelper49', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper49->setArguments($arguments32);
$viewHelper49->setRenderingContext($renderingContext);
$viewHelper49->setRenderChildrenClosure($renderChildrenClosure33);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output31 .= $viewHelper49->initializeArgumentsAndRender();

$output31 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments50 = array();
$renderChildrenClosure51 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper52 = $self->getViewHelper('$viewHelper52', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper52->setArguments($arguments50);
$viewHelper52->setRenderingContext($renderingContext);
$viewHelper52->setRenderChildrenClosure($renderChildrenClosure51);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output31 .= $viewHelper52->initializeArgumentsAndRender();

$output31 .= '
								';
return $output31;
};
$arguments29['__thenClosure'] = function() use ($renderingContext, $self) {
$output53 = '';

$output53 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments54 = array();
$arguments54['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments54['as'] = 'format';
$arguments54['iteration'] = 'key';
$arguments54['key'] = '';
$arguments54['reverse'] = false;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
$output56 = '';

$output56 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments57 = array();
$arguments57['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments57['keepQuotes'] = false;
$arguments57['encoding'] = 'UTF-8';
$arguments57['doubleEncode'] = true;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
return NULL;
};
$value59 = ($arguments57['value'] !== NULL ? $arguments57['value'] : $renderChildrenClosure58());

$output56 .= !is_string($value59) && !(is_object($value59) && method_exists($value59, '__toString')) ? $value59 : htmlspecialchars($value59, ($arguments57['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments57['encoding'], $arguments57['doubleEncode']);

$output56 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments60 = array();
$arguments60['action'] = 'show';
// Rendering Array
$array61 = array();
$array61['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments60['arguments'] = $array61;
$output62 = '';

$output62 .= 'form-';

$output62 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments60['id'] = $output62;
$arguments60['class'] = 'list';
$arguments60['additionalAttributes'] = NULL;
$arguments60['data'] = NULL;
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
$renderChildrenClosure63 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments64 = array();
$arguments64['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments64['keepQuotes'] = false;
$arguments64['encoding'] = 'UTF-8';
$arguments64['doubleEncode'] = true;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return NULL;
};
$value66 = ($arguments64['value'] !== NULL ? $arguments64['value'] : $renderChildrenClosure65());
return !is_string($value66) && !(is_object($value66) && method_exists($value66, '__toString')) ? $value66 : htmlspecialchars($value66, ($arguments64['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments64['encoding'], $arguments64['doubleEncode']);
};
$viewHelper67 = $self->getViewHelper('$viewHelper67', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper67->setArguments($arguments60);
$viewHelper67->setRenderingContext($renderingContext);
$viewHelper67->setRenderChildrenClosure($renderChildrenClosure63);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output56 .= $viewHelper67->initializeArgumentsAndRender();

$output56 .= '
												</li>
											';
return $output56;
};

$output53 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments54, $renderChildrenClosure55, $renderingContext);

$output53 .= '
									';
return $output53;
};
$arguments29['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper68 = $self->getViewHelper('$viewHelper68', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper68->setArguments($arguments29);
$viewHelper68->setRenderingContext($renderingContext);
$viewHelper68->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper68->initializeArgumentsAndRender();

$output0 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments69 = array();
$arguments69['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments69['keepQuotes'] = false;
$arguments69['encoding'] = 'UTF-8';
$arguments69['doubleEncode'] = true;
$renderChildrenClosure70 = function() use ($renderingContext, $self) {
return NULL;
};
$value71 = ($arguments69['value'] !== NULL ? $arguments69['value'] : $renderChildrenClosure70());

$output0 .= !is_string($value71) && !(is_object($value71) && method_exists($value71, '__toString')) ? $value71 : htmlspecialchars($value71, ($arguments69['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments69['encoding'], $arguments69['doubleEncode']);

$output0 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments72 = array();
$arguments72['action'] = 'logout';
$arguments72['additionalAttributes'] = NULL;
$arguments72['data'] = NULL;
$arguments72['arguments'] = array (
);
$arguments72['controller'] = NULL;
$arguments72['package'] = NULL;
$arguments72['subpackage'] = NULL;
$arguments72['section'] = '';
$arguments72['format'] = '';
$arguments72['additionalParams'] = array (
);
$arguments72['addQueryString'] = false;
$arguments72['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments72['useParentRequest'] = false;
$arguments72['absolute'] = true;
$arguments72['class'] = NULL;
$arguments72['dir'] = NULL;
$arguments72['id'] = NULL;
$arguments72['lang'] = NULL;
$arguments72['style'] = NULL;
$arguments72['title'] = NULL;
$arguments72['accesskey'] = NULL;
$arguments72['tabindex'] = NULL;
$arguments72['onclick'] = NULL;
$arguments72['name'] = NULL;
$arguments72['rel'] = NULL;
$arguments72['rev'] = NULL;
$arguments72['target'] = NULL;
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper74 = $self->getViewHelper('$viewHelper74', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper74->setArguments($arguments72);
$viewHelper74->setRenderingContext($renderingContext);
$viewHelper74->setRenderChildrenClosure($renderChildrenClosure73);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper74->initializeArgumentsAndRender();

$output0 .= '</li>
                      <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments75 = array();
$arguments75['action'] = 'profile';
$arguments75['additionalAttributes'] = NULL;
$arguments75['data'] = NULL;
$arguments75['arguments'] = array (
);
$arguments75['controller'] = NULL;
$arguments75['package'] = NULL;
$arguments75['subpackage'] = NULL;
$arguments75['section'] = '';
$arguments75['format'] = '';
$arguments75['additionalParams'] = array (
);
$arguments75['addQueryString'] = false;
$arguments75['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments75['useParentRequest'] = false;
$arguments75['absolute'] = true;
$arguments75['class'] = NULL;
$arguments75['dir'] = NULL;
$arguments75['id'] = NULL;
$arguments75['lang'] = NULL;
$arguments75['style'] = NULL;
$arguments75['title'] = NULL;
$arguments75['accesskey'] = NULL;
$arguments75['tabindex'] = NULL;
$arguments75['onclick'] = NULL;
$arguments75['name'] = NULL;
$arguments75['rel'] = NULL;
$arguments75['rev'] = NULL;
$arguments75['target'] = NULL;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
return 'Profile';
};
$viewHelper77 = $self->getViewHelper('$viewHelper77', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper77->setArguments($arguments75);
$viewHelper77->setRenderingContext($renderingContext);
$viewHelper77->setRenderChildrenClosure($renderChildrenClosure76);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper77->initializeArgumentsAndRender();

$output0 .= '</li>
	                  </ul>
	              </li>
	          </ul>
	      </div>

	  </div> <!-- End container-fluid -->
	</nav>

  <div class="container">
    <div class="row">
      <div id="welcome" class="col-md-12 col-sm-12 col-xs-12 contain">
        <h3 style="margin-top:15px; text-align:center;">Welcome to <strong>"';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments78 = array();
$arguments78['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments78['keepQuotes'] = false;
$arguments78['encoding'] = 'UTF-8';
$arguments78['doubleEncode'] = true;
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
return NULL;
};
$value80 = ($arguments78['value'] !== NULL ? $arguments78['value'] : $renderChildrenClosure79());

$output0 .= !is_string($value80) && !(is_object($value80) && method_exists($value80, '__toString')) ? $value80 : htmlspecialchars($value80, ($arguments78['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments78['encoding'], $arguments78['doubleEncode']);

$output0 .= '"</strong></h3>
      </div>
      <div class="col-md-3 col-sm-2 col-xs-12">
        <ul class="list-group">
          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments81 = array();
// Rendering Boolean node
$arguments81['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments81['then'] = NULL;
$arguments81['else'] = NULL;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
$output83 = '';

$output83 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments84 = array();
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
$output86 = '';

$output86 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments87 = array();
$arguments87['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments87['as'] = 'format';
$arguments87['iteration'] = 'key';
$arguments87['key'] = '';
$arguments87['reverse'] = false;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
$output89 = '';

$output89 .= '
                  <li class="list-group-item">
                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments90 = array();
$arguments90['action'] = 'profile';
// Rendering Array
$array91 = array();
$array91['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments90['arguments'] = $array91;
$output92 = '';

$output92 .= 'form-';

$output92 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments90['id'] = $output92;
$arguments90['class'] = 'list';
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
$arguments90['dir'] = NULL;
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
$renderChildrenClosure93 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments94 = array();
$arguments94['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments94['keepQuotes'] = false;
$arguments94['encoding'] = 'UTF-8';
$arguments94['doubleEncode'] = true;
$renderChildrenClosure95 = function() use ($renderingContext, $self) {
return NULL;
};
$value96 = ($arguments94['value'] !== NULL ? $arguments94['value'] : $renderChildrenClosure95());
return !is_string($value96) && !(is_object($value96) && method_exists($value96, '__toString')) ? $value96 : htmlspecialchars($value96, ($arguments94['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments94['encoding'], $arguments94['doubleEncode']);
};
$viewHelper97 = $self->getViewHelper('$viewHelper97', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper97->setArguments($arguments90);
$viewHelper97->setRenderingContext($renderingContext);
$viewHelper97->setRenderChildrenClosure($renderChildrenClosure93);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output89 .= $viewHelper97->initializeArgumentsAndRender();

$output89 .= '
                  </li>
                ';
return $output89;
};

$output86 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments87, $renderChildrenClosure88, $renderingContext);

$output86 .= '
            ';
return $output86;
};
$viewHelper98 = $self->getViewHelper('$viewHelper98', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper98->setArguments($arguments84);
$viewHelper98->setRenderingContext($renderingContext);
$viewHelper98->setRenderChildrenClosure($renderChildrenClosure85);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output83 .= $viewHelper98->initializeArgumentsAndRender();

$output83 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments99 = array();
$renderChildrenClosure100 = function() use ($renderingContext, $self) {
return '
              <p>No forms created yet.</p>
            ';
};
$viewHelper101 = $self->getViewHelper('$viewHelper101', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper101->setArguments($arguments99);
$viewHelper101->setRenderingContext($renderingContext);
$viewHelper101->setRenderChildrenClosure($renderChildrenClosure100);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output83 .= $viewHelper101->initializeArgumentsAndRender();

$output83 .= '
          ';
return $output83;
};
$arguments81['__thenClosure'] = function() use ($renderingContext, $self) {
$output102 = '';

$output102 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments103 = array();
$arguments103['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments103['as'] = 'format';
$arguments103['iteration'] = 'key';
$arguments103['key'] = '';
$arguments103['reverse'] = false;
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
$output105 = '';

$output105 .= '
                  <li class="list-group-item">
                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments106 = array();
$arguments106['action'] = 'profile';
// Rendering Array
$array107 = array();
$array107['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments106['arguments'] = $array107;
$output108 = '';

$output108 .= 'form-';

$output108 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
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
$arguments110['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
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

$output105 .= $viewHelper113->initializeArgumentsAndRender();

$output105 .= '
                  </li>
                ';
return $output105;
};

$output102 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments103, $renderChildrenClosure104, $renderingContext);

$output102 .= '
            ';
return $output102;
};
$arguments81['__elseClosure'] = function() use ($renderingContext, $self) {
return '
              <p>No forms created yet.</p>
            ';
};
$viewHelper114 = $self->getViewHelper('$viewHelper114', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper114->setArguments($arguments81);
$viewHelper114->setRenderingContext($renderingContext);
$viewHelper114->setRenderChildrenClosure($renderChildrenClosure82);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper114->initializeArgumentsAndRender();

$output0 .= '

        </ul>
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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments129 = array();
$arguments129['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments129['as'] = 'question';
$arguments129['key'] = '';
$arguments129['reverse'] = false;
$arguments129['iteration'] = NULL;
$renderChildrenClosure130 = function() use ($renderingContext, $self) {
$output131 = '';

$output131 .= '
      ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments132 = array();
$arguments132['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments132['keepQuotes'] = false;
$arguments132['encoding'] = 'UTF-8';
$arguments132['doubleEncode'] = true;
$renderChildrenClosure133 = function() use ($renderingContext, $self) {
return NULL;
};
$value134 = ($arguments132['value'] !== NULL ? $arguments132['value'] : $renderChildrenClosure133());

$output131 .= !is_string($value134) && !(is_object($value134) && method_exists($value134, '__toString')) ? $value134 : htmlspecialchars($value134, ($arguments132['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments132['encoding'], $arguments132['doubleEncode']);

$output131 .= '
  ';
return $output131;
};

$output128 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments129, $renderChildrenClosure130, $renderingContext);

$output128 .= '
	<table>
		<tr>
			<th>Name</th>
			<td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments135 = array();
$arguments135['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments135['keepQuotes'] = false;
$arguments135['encoding'] = 'UTF-8';
$arguments135['doubleEncode'] = true;
$renderChildrenClosure136 = function() use ($renderingContext, $self) {
return NULL;
};
$value137 = ($arguments135['value'] !== NULL ? $arguments135['value'] : $renderChildrenClosure136());

$output128 .= !is_string($value137) && !(is_object($value137) && method_exists($value137, '__toString')) ? $value137 : htmlspecialchars($value137, ($arguments135['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments135['encoding'], $arguments135['doubleEncode']);

$output128 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments138 = array();
$arguments138['action'] = 'create';
$arguments138['controller'] = 'question';
$arguments138['objectName'] = 'newQuestion';
$arguments138['additionalAttributes'] = NULL;
$arguments138['data'] = NULL;
$arguments138['arguments'] = array (
);
$arguments138['package'] = NULL;
$arguments138['subpackage'] = NULL;
$arguments138['object'] = NULL;
$arguments138['section'] = '';
$arguments138['format'] = '';
$arguments138['additionalParams'] = array (
);
$arguments138['absolute'] = false;
$arguments138['addQueryString'] = false;
$arguments138['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments138['fieldNamePrefix'] = NULL;
$arguments138['actionUri'] = NULL;
$arguments138['useParentRequest'] = false;
$arguments138['enctype'] = NULL;
$arguments138['method'] = NULL;
$arguments138['name'] = NULL;
$arguments138['onreset'] = NULL;
$arguments138['onsubmit'] = NULL;
$arguments138['class'] = NULL;
$arguments138['dir'] = NULL;
$arguments138['id'] = NULL;
$arguments138['lang'] = NULL;
$arguments138['style'] = NULL;
$arguments138['title'] = NULL;
$arguments138['accesskey'] = NULL;
$arguments138['tabindex'] = NULL;
$arguments138['onclick'] = NULL;
$renderChildrenClosure139 = function() use ($renderingContext, $self) {
$output140 = '';

$output140 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments141 = array();
$arguments141['property'] = 'sentence';
$arguments141['additionalAttributes'] = NULL;
$arguments141['data'] = NULL;
$arguments141['required'] = false;
$arguments141['type'] = 'text';
$arguments141['name'] = NULL;
$arguments141['value'] = NULL;
$arguments141['disabled'] = NULL;
$arguments141['maxlength'] = NULL;
$arguments141['readonly'] = NULL;
$arguments141['size'] = NULL;
$arguments141['placeholder'] = NULL;
$arguments141['autofocus'] = NULL;
$arguments141['errorClass'] = 'f3-form-error';
$arguments141['class'] = NULL;
$arguments141['dir'] = NULL;
$arguments141['id'] = NULL;
$arguments141['lang'] = NULL;
$arguments141['style'] = NULL;
$arguments141['title'] = NULL;
$arguments141['accesskey'] = NULL;
$arguments141['tabindex'] = NULL;
$arguments141['onclick'] = NULL;
$renderChildrenClosure142 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper143 = $self->getViewHelper('$viewHelper143', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper143->setArguments($arguments141);
$viewHelper143->setRenderingContext($renderingContext);
$viewHelper143->setRenderChildrenClosure($renderChildrenClosure142);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output140 .= $viewHelper143->initializeArgumentsAndRender();

$output140 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments144 = array();
$arguments144['property'] = 'form';
$arguments144['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments144['additionalAttributes'] = NULL;
$arguments144['data'] = NULL;
$arguments144['name'] = NULL;
$arguments144['class'] = NULL;
$arguments144['dir'] = NULL;
$arguments144['id'] = NULL;
$arguments144['lang'] = NULL;
$arguments144['style'] = NULL;
$arguments144['title'] = NULL;
$arguments144['accesskey'] = NULL;
$arguments144['tabindex'] = NULL;
$arguments144['onclick'] = NULL;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper146 = $self->getViewHelper('$viewHelper146', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper146->setArguments($arguments144);
$viewHelper146->setRenderingContext($renderingContext);
$viewHelper146->setRenderChildrenClosure($renderChildrenClosure145);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output140 .= $viewHelper146->initializeArgumentsAndRender();

$output140 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments147 = array();
$arguments147['value'] = 'Submit';
$arguments147['additionalAttributes'] = NULL;
$arguments147['data'] = NULL;
$arguments147['name'] = NULL;
$arguments147['property'] = NULL;
$arguments147['disabled'] = NULL;
$arguments147['class'] = NULL;
$arguments147['dir'] = NULL;
$arguments147['id'] = NULL;
$arguments147['lang'] = NULL;
$arguments147['style'] = NULL;
$arguments147['title'] = NULL;
$arguments147['accesskey'] = NULL;
$arguments147['tabindex'] = NULL;
$arguments147['onclick'] = NULL;
$renderChildrenClosure148 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper149 = $self->getViewHelper('$viewHelper149', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper149->setArguments($arguments147);
$viewHelper149->setRenderingContext($renderingContext);
$viewHelper149->setRenderChildrenClosure($renderChildrenClosure148);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output140 .= $viewHelper149->initializeArgumentsAndRender();

$output140 .= '
            ';
return $output140;
};
$viewHelper150 = $self->getViewHelper('$viewHelper150', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper150->setArguments($arguments138);
$viewHelper150->setRenderingContext($renderingContext);
$viewHelper150->setRenderChildrenClosure($renderChildrenClosure139);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output128 .= $viewHelper150->initializeArgumentsAndRender();

$output128 .= '
            </td>
		</tr>
	</table>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments151 = array();
$arguments151['action'] = 'index';
$arguments151['additionalAttributes'] = NULL;
$arguments151['data'] = NULL;
$arguments151['arguments'] = array (
);
$arguments151['controller'] = NULL;
$arguments151['package'] = NULL;
$arguments151['subpackage'] = NULL;
$arguments151['section'] = '';
$arguments151['format'] = '';
$arguments151['additionalParams'] = array (
);
$arguments151['addQueryString'] = false;
$arguments151['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments151['useParentRequest'] = false;
$arguments151['absolute'] = true;
$arguments151['class'] = NULL;
$arguments151['dir'] = NULL;
$arguments151['id'] = NULL;
$arguments151['lang'] = NULL;
$arguments151['style'] = NULL;
$arguments151['title'] = NULL;
$arguments151['accesskey'] = NULL;
$arguments151['tabindex'] = NULL;
$arguments151['onclick'] = NULL;
$arguments151['name'] = NULL;
$arguments151['rel'] = NULL;
$arguments151['rev'] = NULL;
$arguments151['target'] = NULL;
$renderChildrenClosure152 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper153 = $self->getViewHelper('$viewHelper153', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper153->setArguments($arguments151);
$viewHelper153->setRenderingContext($renderingContext);
$viewHelper153->setRenderChildrenClosure($renderChildrenClosure152);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output128 .= $viewHelper153->initializeArgumentsAndRender();

$output128 .= ' -->




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
                <li id="list-1" class="item active">
                  ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments154 = array();
$arguments154['action'] = 'index';
$arguments154['additionalAttributes'] = NULL;
$arguments154['data'] = NULL;
$arguments154['arguments'] = array (
);
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
$renderChildrenClosure155 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper156 = $self->getViewHelper('$viewHelper156', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper156->setArguments($arguments154);
$viewHelper156->setRenderingContext($renderingContext);
$viewHelper156->setRenderChildrenClosure($renderChildrenClosure155);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output128 .= $viewHelper156->initializeArgumentsAndRender();

$output128 .= '
                </li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments157 = array();
// Rendering Boolean node
$arguments157['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments157['then'] = NULL;
$arguments157['else'] = NULL;
$renderChildrenClosure158 = function() use ($renderingContext, $self) {
$output159 = '';

$output159 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments160 = array();
$renderChildrenClosure161 = function() use ($renderingContext, $self) {
$output162 = '';

$output162 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments163 = array();
$arguments163['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments163['as'] = 'format';
$arguments163['iteration'] = 'key';
$arguments163['key'] = '';
$arguments163['reverse'] = false;
$renderChildrenClosure164 = function() use ($renderingContext, $self) {
$output165 = '';

$output165 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments166 = array();
$arguments166['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments166['keepQuotes'] = false;
$arguments166['encoding'] = 'UTF-8';
$arguments166['doubleEncode'] = true;
$renderChildrenClosure167 = function() use ($renderingContext, $self) {
return NULL;
};
$value168 = ($arguments166['value'] !== NULL ? $arguments166['value'] : $renderChildrenClosure167());

$output165 .= !is_string($value168) && !(is_object($value168) && method_exists($value168, '__toString')) ? $value168 : htmlspecialchars($value168, ($arguments166['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments166['encoding'], $arguments166['doubleEncode']);

$output165 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments169 = array();
$arguments169['action'] = 'show';
// Rendering Array
$array170 = array();
$array170['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments169['arguments'] = $array170;
$output171 = '';

$output171 .= 'form-';

$output171 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments169['id'] = $output171;
$arguments169['class'] = 'list';
$arguments169['additionalAttributes'] = NULL;
$arguments169['data'] = NULL;
$arguments169['controller'] = NULL;
$arguments169['package'] = NULL;
$arguments169['subpackage'] = NULL;
$arguments169['section'] = '';
$arguments169['format'] = '';
$arguments169['additionalParams'] = array (
);
$arguments169['addQueryString'] = false;
$arguments169['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments169['useParentRequest'] = false;
$arguments169['absolute'] = true;
$arguments169['dir'] = NULL;
$arguments169['lang'] = NULL;
$arguments169['style'] = NULL;
$arguments169['title'] = NULL;
$arguments169['accesskey'] = NULL;
$arguments169['tabindex'] = NULL;
$arguments169['onclick'] = NULL;
$arguments169['name'] = NULL;
$arguments169['rel'] = NULL;
$arguments169['rev'] = NULL;
$arguments169['target'] = NULL;
$renderChildrenClosure172 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments173 = array();
$arguments173['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments173['keepQuotes'] = false;
$arguments173['encoding'] = 'UTF-8';
$arguments173['doubleEncode'] = true;
$renderChildrenClosure174 = function() use ($renderingContext, $self) {
return NULL;
};
$value175 = ($arguments173['value'] !== NULL ? $arguments173['value'] : $renderChildrenClosure174());
return !is_string($value175) && !(is_object($value175) && method_exists($value175, '__toString')) ? $value175 : htmlspecialchars($value175, ($arguments173['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments173['encoding'], $arguments173['doubleEncode']);
};
$viewHelper176 = $self->getViewHelper('$viewHelper176', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper176->setArguments($arguments169);
$viewHelper176->setRenderingContext($renderingContext);
$viewHelper176->setRenderChildrenClosure($renderChildrenClosure172);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output165 .= $viewHelper176->initializeArgumentsAndRender();

$output165 .= '
												</li>
											';
return $output165;
};

$output162 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments163, $renderChildrenClosure164, $renderingContext);

$output162 .= '
									';
return $output162;
};
$viewHelper177 = $self->getViewHelper('$viewHelper177', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper177->setArguments($arguments160);
$viewHelper177->setRenderingContext($renderingContext);
$viewHelper177->setRenderChildrenClosure($renderChildrenClosure161);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output159 .= $viewHelper177->initializeArgumentsAndRender();

$output159 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments178 = array();
$renderChildrenClosure179 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper180 = $self->getViewHelper('$viewHelper180', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper180->setArguments($arguments178);
$viewHelper180->setRenderingContext($renderingContext);
$viewHelper180->setRenderChildrenClosure($renderChildrenClosure179);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output159 .= $viewHelper180->initializeArgumentsAndRender();

$output159 .= '
								';
return $output159;
};
$arguments157['__thenClosure'] = function() use ($renderingContext, $self) {
$output181 = '';

$output181 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments182 = array();
$arguments182['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments182['as'] = 'format';
$arguments182['iteration'] = 'key';
$arguments182['key'] = '';
$arguments182['reverse'] = false;
$renderChildrenClosure183 = function() use ($renderingContext, $self) {
$output184 = '';

$output184 .= '
												<li id="list-';
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

$output184 .= !is_string($value187) && !(is_object($value187) && method_exists($value187, '__toString')) ? $value187 : htmlspecialchars($value187, ($arguments185['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments185['encoding'], $arguments185['doubleEncode']);

$output184 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments188 = array();
$arguments188['action'] = 'show';
// Rendering Array
$array189 = array();
$array189['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments188['arguments'] = $array189;
$output190 = '';

$output190 .= 'form-';

$output190 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments188['id'] = $output190;
$arguments188['class'] = 'list';
$arguments188['additionalAttributes'] = NULL;
$arguments188['data'] = NULL;
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
$arguments188['dir'] = NULL;
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
$renderChildrenClosure191 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments192 = array();
$arguments192['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments192['keepQuotes'] = false;
$arguments192['encoding'] = 'UTF-8';
$arguments192['doubleEncode'] = true;
$renderChildrenClosure193 = function() use ($renderingContext, $self) {
return NULL;
};
$value194 = ($arguments192['value'] !== NULL ? $arguments192['value'] : $renderChildrenClosure193());
return !is_string($value194) && !(is_object($value194) && method_exists($value194, '__toString')) ? $value194 : htmlspecialchars($value194, ($arguments192['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments192['encoding'], $arguments192['doubleEncode']);
};
$viewHelper195 = $self->getViewHelper('$viewHelper195', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper195->setArguments($arguments188);
$viewHelper195->setRenderingContext($renderingContext);
$viewHelper195->setRenderChildrenClosure($renderChildrenClosure191);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output184 .= $viewHelper195->initializeArgumentsAndRender();

$output184 .= '
												</li>
											';
return $output184;
};

$output181 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments182, $renderChildrenClosure183, $renderingContext);

$output181 .= '
									';
return $output181;
};
$arguments157['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper196 = $self->getViewHelper('$viewHelper196', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper196->setArguments($arguments157);
$viewHelper196->setRenderingContext($renderingContext);
$viewHelper196->setRenderChildrenClosure($renderChildrenClosure158);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output128 .= $viewHelper196->initializeArgumentsAndRender();

$output128 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments197 = array();
$arguments197['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments197['keepQuotes'] = false;
$arguments197['encoding'] = 'UTF-8';
$arguments197['doubleEncode'] = true;
$renderChildrenClosure198 = function() use ($renderingContext, $self) {
return NULL;
};
$value199 = ($arguments197['value'] !== NULL ? $arguments197['value'] : $renderChildrenClosure198());

$output128 .= !is_string($value199) && !(is_object($value199) && method_exists($value199, '__toString')) ? $value199 : htmlspecialchars($value199, ($arguments197['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments197['encoding'], $arguments197['doubleEncode']);

$output128 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments200 = array();
$arguments200['action'] = 'logout';
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
return 'Logout';
};
$viewHelper202 = $self->getViewHelper('$viewHelper202', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper202->setArguments($arguments200);
$viewHelper202->setRenderingContext($renderingContext);
$viewHelper202->setRenderChildrenClosure($renderChildrenClosure201);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output128 .= $viewHelper202->initializeArgumentsAndRender();

$output128 .= '</li>
                      <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments203 = array();
$arguments203['action'] = 'profile';
$arguments203['additionalAttributes'] = NULL;
$arguments203['data'] = NULL;
$arguments203['arguments'] = array (
);
$arguments203['controller'] = NULL;
$arguments203['package'] = NULL;
$arguments203['subpackage'] = NULL;
$arguments203['section'] = '';
$arguments203['format'] = '';
$arguments203['additionalParams'] = array (
);
$arguments203['addQueryString'] = false;
$arguments203['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments203['useParentRequest'] = false;
$arguments203['absolute'] = true;
$arguments203['class'] = NULL;
$arguments203['dir'] = NULL;
$arguments203['id'] = NULL;
$arguments203['lang'] = NULL;
$arguments203['style'] = NULL;
$arguments203['title'] = NULL;
$arguments203['accesskey'] = NULL;
$arguments203['tabindex'] = NULL;
$arguments203['onclick'] = NULL;
$arguments203['name'] = NULL;
$arguments203['rel'] = NULL;
$arguments203['rev'] = NULL;
$arguments203['target'] = NULL;
$renderChildrenClosure204 = function() use ($renderingContext, $self) {
return 'Profile';
};
$viewHelper205 = $self->getViewHelper('$viewHelper205', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper205->setArguments($arguments203);
$viewHelper205->setRenderingContext($renderingContext);
$viewHelper205->setRenderChildrenClosure($renderChildrenClosure204);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output128 .= $viewHelper205->initializeArgumentsAndRender();

$output128 .= '</li>
	                  </ul>
	              </li>
	          </ul>
	      </div>

	  </div> <!-- End container-fluid -->
	</nav>

  <div class="container">
    <div class="row">
      <div id="welcome" class="col-md-12 col-sm-12 col-xs-12 contain">
        <h3 style="margin-top:15px; text-align:center;">Welcome to <strong>"';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments206 = array();
$arguments206['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments206['keepQuotes'] = false;
$arguments206['encoding'] = 'UTF-8';
$arguments206['doubleEncode'] = true;
$renderChildrenClosure207 = function() use ($renderingContext, $self) {
return NULL;
};
$value208 = ($arguments206['value'] !== NULL ? $arguments206['value'] : $renderChildrenClosure207());

$output128 .= !is_string($value208) && !(is_object($value208) && method_exists($value208, '__toString')) ? $value208 : htmlspecialchars($value208, ($arguments206['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments206['encoding'], $arguments206['doubleEncode']);

$output128 .= '"</strong></h3>
      </div>
      <div class="col-md-3 col-sm-2 col-xs-12">
        <ul class="list-group">
          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments209 = array();
// Rendering Boolean node
$arguments209['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments209['then'] = NULL;
$arguments209['else'] = NULL;
$renderChildrenClosure210 = function() use ($renderingContext, $self) {
$output211 = '';

$output211 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments212 = array();
$renderChildrenClosure213 = function() use ($renderingContext, $self) {
$output214 = '';

$output214 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments215 = array();
$arguments215['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments215['as'] = 'format';
$arguments215['iteration'] = 'key';
$arguments215['key'] = '';
$arguments215['reverse'] = false;
$renderChildrenClosure216 = function() use ($renderingContext, $self) {
$output217 = '';

$output217 .= '
                  <li class="list-group-item">
                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments218 = array();
$arguments218['action'] = 'profile';
// Rendering Array
$array219 = array();
$array219['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments218['arguments'] = $array219;
$output220 = '';

$output220 .= 'form-';

$output220 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments218['id'] = $output220;
$arguments218['class'] = 'list';
$arguments218['additionalAttributes'] = NULL;
$arguments218['data'] = NULL;
$arguments218['controller'] = NULL;
$arguments218['package'] = NULL;
$arguments218['subpackage'] = NULL;
$arguments218['section'] = '';
$arguments218['format'] = '';
$arguments218['additionalParams'] = array (
);
$arguments218['addQueryString'] = false;
$arguments218['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments218['useParentRequest'] = false;
$arguments218['absolute'] = true;
$arguments218['dir'] = NULL;
$arguments218['lang'] = NULL;
$arguments218['style'] = NULL;
$arguments218['title'] = NULL;
$arguments218['accesskey'] = NULL;
$arguments218['tabindex'] = NULL;
$arguments218['onclick'] = NULL;
$arguments218['name'] = NULL;
$arguments218['rel'] = NULL;
$arguments218['rev'] = NULL;
$arguments218['target'] = NULL;
$renderChildrenClosure221 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments222 = array();
$arguments222['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments222['keepQuotes'] = false;
$arguments222['encoding'] = 'UTF-8';
$arguments222['doubleEncode'] = true;
$renderChildrenClosure223 = function() use ($renderingContext, $self) {
return NULL;
};
$value224 = ($arguments222['value'] !== NULL ? $arguments222['value'] : $renderChildrenClosure223());
return !is_string($value224) && !(is_object($value224) && method_exists($value224, '__toString')) ? $value224 : htmlspecialchars($value224, ($arguments222['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments222['encoding'], $arguments222['doubleEncode']);
};
$viewHelper225 = $self->getViewHelper('$viewHelper225', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper225->setArguments($arguments218);
$viewHelper225->setRenderingContext($renderingContext);
$viewHelper225->setRenderChildrenClosure($renderChildrenClosure221);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output217 .= $viewHelper225->initializeArgumentsAndRender();

$output217 .= '
                  </li>
                ';
return $output217;
};

$output214 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments215, $renderChildrenClosure216, $renderingContext);

$output214 .= '
            ';
return $output214;
};
$viewHelper226 = $self->getViewHelper('$viewHelper226', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper226->setArguments($arguments212);
$viewHelper226->setRenderingContext($renderingContext);
$viewHelper226->setRenderChildrenClosure($renderChildrenClosure213);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output211 .= $viewHelper226->initializeArgumentsAndRender();

$output211 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments227 = array();
$renderChildrenClosure228 = function() use ($renderingContext, $self) {
return '
              <p>No forms created yet.</p>
            ';
};
$viewHelper229 = $self->getViewHelper('$viewHelper229', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper229->setArguments($arguments227);
$viewHelper229->setRenderingContext($renderingContext);
$viewHelper229->setRenderChildrenClosure($renderChildrenClosure228);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output211 .= $viewHelper229->initializeArgumentsAndRender();

$output211 .= '
          ';
return $output211;
};
$arguments209['__thenClosure'] = function() use ($renderingContext, $self) {
$output230 = '';

$output230 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments231 = array();
$arguments231['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments231['as'] = 'format';
$arguments231['iteration'] = 'key';
$arguments231['key'] = '';
$arguments231['reverse'] = false;
$renderChildrenClosure232 = function() use ($renderingContext, $self) {
$output233 = '';

$output233 .= '
                  <li class="list-group-item">
                    ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments234 = array();
$arguments234['action'] = 'profile';
// Rendering Array
$array235 = array();
$array235['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments234['arguments'] = $array235;
$output236 = '';

$output236 .= 'form-';

$output236 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
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
$arguments238['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
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

$output233 .= $viewHelper241->initializeArgumentsAndRender();

$output233 .= '
                  </li>
                ';
return $output233;
};

$output230 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments231, $renderChildrenClosure232, $renderingContext);

$output230 .= '
            ';
return $output230;
};
$arguments209['__elseClosure'] = function() use ($renderingContext, $self) {
return '
              <p>No forms created yet.</p>
            ';
};
$viewHelper242 = $self->getViewHelper('$viewHelper242', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper242->setArguments($arguments209);
$viewHelper242->setRenderingContext($renderingContext);
$viewHelper242->setRenderChildrenClosure($renderChildrenClosure210);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output128 .= $viewHelper242->initializeArgumentsAndRender();

$output128 .= '

        </ul>
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
#0             81249     