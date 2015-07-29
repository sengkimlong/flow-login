<?php class FluidCache_SKL_Test_Form_action_show_80f09a7560db184973714f4e03a796fd128fe10b extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments26 = array();
$arguments26['action'] = 'index';
$arguments26['class'] = 'navbar-brand';
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
	      </div> <!-- End navbar-header -->

	      <div class="collapse navbar-collapse" id="navigation">
	          <ul class="nav navbar-nav navbar-right">
                <li id="list-1" class="item">
                  ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments29 = array();
$arguments29['action'] = 'index';
$arguments29['additionalAttributes'] = NULL;
$arguments29['data'] = NULL;
$arguments29['arguments'] = array (
);
$arguments29['controller'] = NULL;
$arguments29['package'] = NULL;
$arguments29['subpackage'] = NULL;
$arguments29['section'] = '';
$arguments29['format'] = '';
$arguments29['additionalParams'] = array (
);
$arguments29['addQueryString'] = false;
$arguments29['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments29['useParentRequest'] = false;
$arguments29['absolute'] = true;
$arguments29['class'] = NULL;
$arguments29['dir'] = NULL;
$arguments29['id'] = NULL;
$arguments29['lang'] = NULL;
$arguments29['style'] = NULL;
$arguments29['title'] = NULL;
$arguments29['accesskey'] = NULL;
$arguments29['tabindex'] = NULL;
$arguments29['onclick'] = NULL;
$arguments29['name'] = NULL;
$arguments29['rel'] = NULL;
$arguments29['rev'] = NULL;
$arguments29['target'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper31 = $self->getViewHelper('$viewHelper31', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper31->setArguments($arguments29);
$viewHelper31->setRenderingContext($renderingContext);
$viewHelper31->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper31->initializeArgumentsAndRender();

$output0 .= '
                </li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments32 = array();
// Rendering Boolean node
$arguments32['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments32['then'] = NULL;
$arguments32['else'] = NULL;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
$output34 = '';

$output34 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments35 = array();
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments38 = array();
$arguments38['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments38['as'] = 'format';
$arguments38['iteration'] = 'key';
$arguments38['key'] = '';
$arguments38['reverse'] = false;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
$output40 = '';

$output40 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments41 = array();
$arguments41['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments41['keepQuotes'] = false;
$arguments41['encoding'] = 'UTF-8';
$arguments41['doubleEncode'] = true;
$renderChildrenClosure42 = function() use ($renderingContext, $self) {
return NULL;
};
$value43 = ($arguments41['value'] !== NULL ? $arguments41['value'] : $renderChildrenClosure42());

$output40 .= !is_string($value43) && !(is_object($value43) && method_exists($value43, '__toString')) ? $value43 : htmlspecialchars($value43, ($arguments41['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments41['encoding'], $arguments41['doubleEncode']);

$output40 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments44 = array();
$arguments44['action'] = 'show';
// Rendering Array
$array45 = array();
$array45['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments44['arguments'] = $array45;
$output46 = '';

$output46 .= 'form-';

$output46 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments44['id'] = $output46;
$arguments44['class'] = 'list';
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
$arguments44['dir'] = NULL;
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
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments48 = array();
$arguments48['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments48['keepQuotes'] = false;
$arguments48['encoding'] = 'UTF-8';
$arguments48['doubleEncode'] = true;
$renderChildrenClosure49 = function() use ($renderingContext, $self) {
return NULL;
};
$value50 = ($arguments48['value'] !== NULL ? $arguments48['value'] : $renderChildrenClosure49());
return !is_string($value50) && !(is_object($value50) && method_exists($value50, '__toString')) ? $value50 : htmlspecialchars($value50, ($arguments48['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments48['encoding'], $arguments48['doubleEncode']);
};
$viewHelper51 = $self->getViewHelper('$viewHelper51', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper51->setArguments($arguments44);
$viewHelper51->setRenderingContext($renderingContext);
$viewHelper51->setRenderChildrenClosure($renderChildrenClosure47);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output40 .= $viewHelper51->initializeArgumentsAndRender();

$output40 .= '
												</li>
											';
return $output40;
};

$output37 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments38, $renderChildrenClosure39, $renderingContext);

$output37 .= '
									';
return $output37;
};
$viewHelper52 = $self->getViewHelper('$viewHelper52', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper52->setArguments($arguments35);
$viewHelper52->setRenderingContext($renderingContext);
$viewHelper52->setRenderChildrenClosure($renderChildrenClosure36);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output34 .= $viewHelper52->initializeArgumentsAndRender();

$output34 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments53 = array();
$renderChildrenClosure54 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper55 = $self->getViewHelper('$viewHelper55', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper55->setArguments($arguments53);
$viewHelper55->setRenderingContext($renderingContext);
$viewHelper55->setRenderChildrenClosure($renderChildrenClosure54);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output34 .= $viewHelper55->initializeArgumentsAndRender();

$output34 .= '
								';
return $output34;
};
$arguments32['__thenClosure'] = function() use ($renderingContext, $self) {
$output56 = '';

$output56 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments57 = array();
$arguments57['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments57['as'] = 'format';
$arguments57['iteration'] = 'key';
$arguments57['key'] = '';
$arguments57['reverse'] = false;
$renderChildrenClosure58 = function() use ($renderingContext, $self) {
$output59 = '';

$output59 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments60 = array();
$arguments60['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments60['keepQuotes'] = false;
$arguments60['encoding'] = 'UTF-8';
$arguments60['doubleEncode'] = true;
$renderChildrenClosure61 = function() use ($renderingContext, $self) {
return NULL;
};
$value62 = ($arguments60['value'] !== NULL ? $arguments60['value'] : $renderChildrenClosure61());

$output59 .= !is_string($value62) && !(is_object($value62) && method_exists($value62, '__toString')) ? $value62 : htmlspecialchars($value62, ($arguments60['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments60['encoding'], $arguments60['doubleEncode']);

$output59 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments63 = array();
$arguments63['action'] = 'show';
// Rendering Array
$array64 = array();
$array64['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments63['arguments'] = $array64;
$output65 = '';

$output65 .= 'form-';

$output65 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments63['id'] = $output65;
$arguments63['class'] = 'list';
$arguments63['additionalAttributes'] = NULL;
$arguments63['data'] = NULL;
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
$arguments63['dir'] = NULL;
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
$renderChildrenClosure66 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments67 = array();
$arguments67['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments67['keepQuotes'] = false;
$arguments67['encoding'] = 'UTF-8';
$arguments67['doubleEncode'] = true;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
return NULL;
};
$value69 = ($arguments67['value'] !== NULL ? $arguments67['value'] : $renderChildrenClosure68());
return !is_string($value69) && !(is_object($value69) && method_exists($value69, '__toString')) ? $value69 : htmlspecialchars($value69, ($arguments67['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments67['encoding'], $arguments67['doubleEncode']);
};
$viewHelper70 = $self->getViewHelper('$viewHelper70', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper70->setArguments($arguments63);
$viewHelper70->setRenderingContext($renderingContext);
$viewHelper70->setRenderChildrenClosure($renderChildrenClosure66);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output59 .= $viewHelper70->initializeArgumentsAndRender();

$output59 .= '
												</li>
											';
return $output59;
};

$output56 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments57, $renderChildrenClosure58, $renderingContext);

$output56 .= '
									';
return $output56;
};
$arguments32['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper71->setArguments($arguments32);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure33);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper71->initializeArgumentsAndRender();

$output0 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments72 = array();
$arguments72['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments72['keepQuotes'] = false;
$arguments72['encoding'] = 'UTF-8';
$arguments72['doubleEncode'] = true;
$renderChildrenClosure73 = function() use ($renderingContext, $self) {
return NULL;
};
$value74 = ($arguments72['value'] !== NULL ? $arguments72['value'] : $renderChildrenClosure73());

$output0 .= !is_string($value74) && !(is_object($value74) && method_exists($value74, '__toString')) ? $value74 : htmlspecialchars($value74, ($arguments72['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments72['encoding'], $arguments72['doubleEncode']);

$output0 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments75 = array();
$arguments75['action'] = 'logout';
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
return 'Logout';
};
$viewHelper77 = $self->getViewHelper('$viewHelper77', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper77->setArguments($arguments75);
$viewHelper77->setRenderingContext($renderingContext);
$viewHelper77->setRenderChildrenClosure($renderChildrenClosure76);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper77->initializeArgumentsAndRender();

$output0 .= '</li>
                      <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments78 = array();
$arguments78['action'] = 'profile';
$arguments78['additionalAttributes'] = NULL;
$arguments78['data'] = NULL;
$arguments78['arguments'] = array (
);
$arguments78['controller'] = NULL;
$arguments78['package'] = NULL;
$arguments78['subpackage'] = NULL;
$arguments78['section'] = '';
$arguments78['format'] = '';
$arguments78['additionalParams'] = array (
);
$arguments78['addQueryString'] = false;
$arguments78['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments78['useParentRequest'] = false;
$arguments78['absolute'] = true;
$arguments78['class'] = NULL;
$arguments78['dir'] = NULL;
$arguments78['id'] = NULL;
$arguments78['lang'] = NULL;
$arguments78['style'] = NULL;
$arguments78['title'] = NULL;
$arguments78['accesskey'] = NULL;
$arguments78['tabindex'] = NULL;
$arguments78['onclick'] = NULL;
$arguments78['name'] = NULL;
$arguments78['rel'] = NULL;
$arguments78['rev'] = NULL;
$arguments78['target'] = NULL;
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
return 'Profile';
};
$viewHelper80 = $self->getViewHelper('$viewHelper80', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper80->setArguments($arguments78);
$viewHelper80->setRenderingContext($renderingContext);
$viewHelper80->setRenderChildrenClosure($renderChildrenClosure79);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output0 .= $viewHelper80->initializeArgumentsAndRender();

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

            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments81 = array();
$arguments81['action'] = 'create';
$arguments81['controller'] = 'Answer';
$arguments81['additionalAttributes'] = NULL;
$arguments81['data'] = NULL;
$arguments81['arguments'] = array (
);
$arguments81['package'] = NULL;
$arguments81['subpackage'] = NULL;
$arguments81['object'] = NULL;
$arguments81['section'] = '';
$arguments81['format'] = '';
$arguments81['additionalParams'] = array (
);
$arguments81['absolute'] = false;
$arguments81['addQueryString'] = false;
$arguments81['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments81['fieldNamePrefix'] = NULL;
$arguments81['actionUri'] = NULL;
$arguments81['objectName'] = NULL;
$arguments81['useParentRequest'] = false;
$arguments81['enctype'] = NULL;
$arguments81['method'] = NULL;
$arguments81['name'] = NULL;
$arguments81['onreset'] = NULL;
$arguments81['onsubmit'] = NULL;
$arguments81['class'] = NULL;
$arguments81['dir'] = NULL;
$arguments81['id'] = NULL;
$arguments81['lang'] = NULL;
$arguments81['style'] = NULL;
$arguments81['title'] = NULL;
$arguments81['accesskey'] = NULL;
$arguments81['tabindex'] = NULL;
$arguments81['onclick'] = NULL;
$renderChildrenClosure82 = function() use ($renderingContext, $self) {
$output83 = '';

$output83 .= '

  	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments84 = array();
$arguments84['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments84['as'] = 'question';
$arguments84['iteration'] = 'key';
$arguments84['key'] = '';
$arguments84['reverse'] = false;
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
$output86 = '';

$output86 .= '
  	            <div class="col-md-6">
  	                <div class="list-group">
  	                    <div class="list-group-item">
  	                      <h4 class="list-group-item-heading">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments87 = array();
$arguments87['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments87['keepQuotes'] = false;
$arguments87['encoding'] = 'UTF-8';
$arguments87['doubleEncode'] = true;
$renderChildrenClosure88 = function() use ($renderingContext, $self) {
return NULL;
};
$value89 = ($arguments87['value'] !== NULL ? $arguments87['value'] : $renderChildrenClosure88());

$output86 .= !is_string($value89) && !(is_object($value89) && method_exists($value89, '__toString')) ? $value89 : htmlspecialchars($value89, ($arguments87['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments87['encoding'], $arguments87['doubleEncode']);

$output86 .= '</h4>

                          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments90 = array();
$output91 = '';

$output91 .= 'obj[question-';

$output91 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);

$output91 .= ']';
$arguments90['name'] = $output91;
$arguments90['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question', $renderingContext);
$arguments90['additionalAttributes'] = NULL;
$arguments90['data'] = NULL;
$arguments90['property'] = NULL;
$arguments90['class'] = NULL;
$arguments90['dir'] = NULL;
$arguments90['id'] = NULL;
$arguments90['lang'] = NULL;
$arguments90['style'] = NULL;
$arguments90['title'] = NULL;
$arguments90['accesskey'] = NULL;
$arguments90['tabindex'] = NULL;
$arguments90['onclick'] = NULL;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper93 = $self->getViewHelper('$viewHelper93', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper93->setArguments($arguments90);
$viewHelper93->setRenderingContext($renderingContext);
$viewHelper93->setRenderChildrenClosure($renderChildrenClosure92);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output86 .= $viewHelper93->initializeArgumentsAndRender();

$output86 .= '

                          <!-- <input type="hidden" id="question-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments94 = array();
$arguments94['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments94['keepQuotes'] = false;
$arguments94['encoding'] = 'UTF-8';
$arguments94['doubleEncode'] = true;
$renderChildrenClosure95 = function() use ($renderingContext, $self) {
return NULL;
};
$value96 = ($arguments94['value'] !== NULL ? $arguments94['value'] : $renderChildrenClosure95());

$output86 .= !is_string($value96) && !(is_object($value96) && method_exists($value96, '__toString')) ? $value96 : htmlspecialchars($value96, ($arguments94['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments94['encoding'], $arguments94['doubleEncode']);

$output86 .= '" class="form-control" name="obj[question][]" value="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments97 = array();
$arguments97['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.id', $renderingContext);
$arguments97['keepQuotes'] = false;
$arguments97['encoding'] = 'UTF-8';
$arguments97['doubleEncode'] = true;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
return NULL;
};
$value99 = ($arguments97['value'] !== NULL ? $arguments97['value'] : $renderChildrenClosure98());

$output86 .= !is_string($value99) && !(is_object($value99) && method_exists($value99, '__toString')) ? $value99 : htmlspecialchars($value99, ($arguments97['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments97['encoding'], $arguments97['doubleEncode']);

$output86 .= '"> -->

                          <input type="text" id="answer-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments100 = array();
$arguments100['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments100['keepQuotes'] = false;
$arguments100['encoding'] = 'UTF-8';
$arguments100['doubleEncode'] = true;
$renderChildrenClosure101 = function() use ($renderingContext, $self) {
return NULL;
};
$value102 = ($arguments100['value'] !== NULL ? $arguments100['value'] : $renderChildrenClosure101());

$output86 .= !is_string($value102) && !(is_object($value102) && method_exists($value102, '__toString')) ? $value102 : htmlspecialchars($value102, ($arguments100['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments100['encoding'], $arguments100['doubleEncode']);

$output86 .= '" class="form-control" name="obj[question-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments103 = array();
$arguments103['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments103['keepQuotes'] = false;
$arguments103['encoding'] = 'UTF-8';
$arguments103['doubleEncode'] = true;
$renderChildrenClosure104 = function() use ($renderingContext, $self) {
return NULL;
};
$value105 = ($arguments103['value'] !== NULL ? $arguments103['value'] : $renderChildrenClosure104());

$output86 .= !is_string($value105) && !(is_object($value105) && method_exists($value105, '__toString')) ? $value105 : htmlspecialchars($value105, ($arguments103['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments103['encoding'], $arguments103['doubleEncode']);

$output86 .= '][]" placeholder="Input answer" required>

  	                      <!-- <input type="text" id="answer-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments106 = array();
$arguments106['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments106['keepQuotes'] = false;
$arguments106['encoding'] = 'UTF-8';
$arguments106['doubleEncode'] = true;
$renderChildrenClosure107 = function() use ($renderingContext, $self) {
return NULL;
};
$value108 = ($arguments106['value'] !== NULL ? $arguments106['value'] : $renderChildrenClosure107());

$output86 .= !is_string($value108) && !(is_object($value108) && method_exists($value108, '__toString')) ? $value108 : htmlspecialchars($value108, ($arguments106['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments106['encoding'], $arguments106['doubleEncode']);

$output86 .= '  \'" class="form-control" name="answer" placeholder="Input answer" required> -->

  	                      <p id="alert-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments109 = array();
$arguments109['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments109['keepQuotes'] = false;
$arguments109['encoding'] = 'UTF-8';
$arguments109['doubleEncode'] = true;
$renderChildrenClosure110 = function() use ($renderingContext, $self) {
return NULL;
};
$value111 = ($arguments109['value'] !== NULL ? $arguments109['value'] : $renderChildrenClosure110());

$output86 .= !is_string($value111) && !(is_object($value111) && method_exists($value111, '__toString')) ? $value111 : htmlspecialchars($value111, ($arguments109['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments109['encoding'], $arguments109['doubleEncode']);

$output86 .= '" style="color: red;visibility: hidden;">*Please input your answer...</p>
  	                    </div>
  	                </div>
  	            </div>
  	          ';
return $output86;
};

$output83 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments84, $renderChildrenClosure85, $renderingContext);

$output83 .= '


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
	        <div class="modal-body" id="answerbody">

              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Your Answer here: </h3>
              <table id="answerContainer" class="table" style="display: none" border="0">
                  ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments112 = array();
$arguments112['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments112['as'] = 'question';
$arguments112['iteration'] = 'key';
$arguments112['key'] = '';
$arguments112['reverse'] = false;
$renderChildrenClosure113 = function() use ($renderingContext, $self) {
$output114 = '';

$output114 .= '
                    <tr>
                      <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments115 = array();
$arguments115['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments115['keepQuotes'] = false;
$arguments115['encoding'] = 'UTF-8';
$arguments115['doubleEncode'] = true;
$renderChildrenClosure116 = function() use ($renderingContext, $self) {
return NULL;
};
$value117 = ($arguments115['value'] !== NULL ? $arguments115['value'] : $renderChildrenClosure116());

$output114 .= !is_string($value117) && !(is_object($value117) && method_exists($value117, '__toString')) ? $value117 : htmlspecialchars($value117, ($arguments115['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments115['encoding'], $arguments115['doubleEncode']);

$output114 .= '</td>
                      <td id="answerHere-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments118 = array();
$arguments118['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments118['keepQuotes'] = false;
$arguments118['encoding'] = 'UTF-8';
$arguments118['doubleEncode'] = true;
$renderChildrenClosure119 = function() use ($renderingContext, $self) {
return NULL;
};
$value120 = ($arguments118['value'] !== NULL ? $arguments118['value'] : $renderChildrenClosure119());

$output114 .= !is_string($value120) && !(is_object($value120) && method_exists($value120, '__toString')) ? $value120 : htmlspecialchars($value120, ($arguments118['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments118['encoding'], $arguments118['doubleEncode']);

$output114 .= '"></td>
                    </tr>

                  ';
return $output114;
};

$output83 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments112, $renderChildrenClosure113, $renderingContext);

$output83 .= '
                  <!-- Answer here-->

	            </table>
	        </div>
	        <div class="modal-footer">

	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments121 = array();
$arguments121['class'] = 'btn btn-primary';
$arguments121['value'] = 'Save';
$arguments121['additionalAttributes'] = NULL;
$arguments121['data'] = NULL;
$arguments121['name'] = NULL;
$arguments121['property'] = NULL;
$arguments121['disabled'] = NULL;
$arguments121['dir'] = NULL;
$arguments121['id'] = NULL;
$arguments121['lang'] = NULL;
$arguments121['style'] = NULL;
$arguments121['title'] = NULL;
$arguments121['accesskey'] = NULL;
$arguments121['tabindex'] = NULL;
$arguments121['onclick'] = NULL;
$renderChildrenClosure122 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper123 = $self->getViewHelper('$viewHelper123', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper123->setArguments($arguments121);
$viewHelper123->setRenderingContext($renderingContext);
$viewHelper123->setRenderChildrenClosure($renderChildrenClosure122);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output83 .= $viewHelper123->initializeArgumentsAndRender();

$output83 .= '

        ';
return $output83;
};
$viewHelper124 = $self->getViewHelper('$viewHelper124', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper124->setArguments($arguments81);
$viewHelper124->setRenderingContext($renderingContext);
$viewHelper124->setRenderChildrenClosure($renderChildrenClosure82);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper124->initializeArgumentsAndRender();

$output0 .= '


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
$output125 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments126 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments127 = array();
$arguments127['name'] = 'Default';
$renderChildrenClosure128 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper129 = $self->getViewHelper('$viewHelper129', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper129->setArguments($arguments127);
$viewHelper129->setRenderingContext($renderingContext);
$viewHelper129->setRenderChildrenClosure($renderChildrenClosure128);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments126['value'] = $viewHelper129->initializeArgumentsAndRender();
$arguments126['keepQuotes'] = false;
$arguments126['encoding'] = 'UTF-8';
$arguments126['doubleEncode'] = true;
$renderChildrenClosure130 = function() use ($renderingContext, $self) {
return NULL;
};
$value131 = ($arguments126['value'] !== NULL ? $arguments126['value'] : $renderChildrenClosure130());

$output125 .= !is_string($value131) && !(is_object($value131) && method_exists($value131, '__toString')) ? $value131 : htmlspecialchars($value131, ($arguments126['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments126['encoding'], $arguments126['doubleEncode']);

$output125 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments132 = array();
$arguments132['name'] = 'Title';
$renderChildrenClosure133 = function() use ($renderingContext, $self) {
return NULL;
};

$output125 .= '';

$output125 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments134 = array();
$arguments134['name'] = 'stylesheet';
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
return NULL;
};

$output125 .= '';

$output125 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments136 = array();
$arguments136['name'] = 'Content';
$renderChildrenClosure137 = function() use ($renderingContext, $self) {
$output138 = '';

$output138 .= '
  <!-- ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments139 = array();
$arguments139['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments139['as'] = 'question';
$arguments139['key'] = '';
$arguments139['reverse'] = false;
$arguments139['iteration'] = NULL;
$renderChildrenClosure140 = function() use ($renderingContext, $self) {
$output141 = '';

$output141 .= '
      ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments142 = array();
$arguments142['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments142['keepQuotes'] = false;
$arguments142['encoding'] = 'UTF-8';
$arguments142['doubleEncode'] = true;
$renderChildrenClosure143 = function() use ($renderingContext, $self) {
return NULL;
};
$value144 = ($arguments142['value'] !== NULL ? $arguments142['value'] : $renderChildrenClosure143());

$output141 .= !is_string($value144) && !(is_object($value144) && method_exists($value144, '__toString')) ? $value144 : htmlspecialchars($value144, ($arguments142['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments142['encoding'], $arguments142['doubleEncode']);

$output141 .= '
  ';
return $output141;
};

$output138 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments139, $renderChildrenClosure140, $renderingContext);

$output138 .= '
	<table>
		<tr>
			<th>Name</th>
			<td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments145 = array();
$arguments145['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.name', $renderingContext);
$arguments145['keepQuotes'] = false;
$arguments145['encoding'] = 'UTF-8';
$arguments145['doubleEncode'] = true;
$renderChildrenClosure146 = function() use ($renderingContext, $self) {
return NULL;
};
$value147 = ($arguments145['value'] !== NULL ? $arguments145['value'] : $renderChildrenClosure146());

$output138 .= !is_string($value147) && !(is_object($value147) && method_exists($value147, '__toString')) ? $value147 : htmlspecialchars($value147, ($arguments145['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments145['encoding'], $arguments145['doubleEncode']);

$output138 .= '
            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments148 = array();
$arguments148['action'] = 'create';
$arguments148['controller'] = 'question';
$arguments148['objectName'] = 'newQuestion';
$arguments148['additionalAttributes'] = NULL;
$arguments148['data'] = NULL;
$arguments148['arguments'] = array (
);
$arguments148['package'] = NULL;
$arguments148['subpackage'] = NULL;
$arguments148['object'] = NULL;
$arguments148['section'] = '';
$arguments148['format'] = '';
$arguments148['additionalParams'] = array (
);
$arguments148['absolute'] = false;
$arguments148['addQueryString'] = false;
$arguments148['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments148['fieldNamePrefix'] = NULL;
$arguments148['actionUri'] = NULL;
$arguments148['useParentRequest'] = false;
$arguments148['enctype'] = NULL;
$arguments148['method'] = NULL;
$arguments148['name'] = NULL;
$arguments148['onreset'] = NULL;
$arguments148['onsubmit'] = NULL;
$arguments148['class'] = NULL;
$arguments148['dir'] = NULL;
$arguments148['id'] = NULL;
$arguments148['lang'] = NULL;
$arguments148['style'] = NULL;
$arguments148['title'] = NULL;
$arguments148['accesskey'] = NULL;
$arguments148['tabindex'] = NULL;
$arguments148['onclick'] = NULL;
$renderChildrenClosure149 = function() use ($renderingContext, $self) {
$output150 = '';

$output150 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments151 = array();
$arguments151['property'] = 'sentence';
$arguments151['additionalAttributes'] = NULL;
$arguments151['data'] = NULL;
$arguments151['required'] = false;
$arguments151['type'] = 'text';
$arguments151['name'] = NULL;
$arguments151['value'] = NULL;
$arguments151['disabled'] = NULL;
$arguments151['maxlength'] = NULL;
$arguments151['readonly'] = NULL;
$arguments151['size'] = NULL;
$arguments151['placeholder'] = NULL;
$arguments151['autofocus'] = NULL;
$arguments151['errorClass'] = 'f3-form-error';
$arguments151['class'] = NULL;
$arguments151['dir'] = NULL;
$arguments151['id'] = NULL;
$arguments151['lang'] = NULL;
$arguments151['style'] = NULL;
$arguments151['title'] = NULL;
$arguments151['accesskey'] = NULL;
$arguments151['tabindex'] = NULL;
$arguments151['onclick'] = NULL;
$renderChildrenClosure152 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper153 = $self->getViewHelper('$viewHelper153', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper153->setArguments($arguments151);
$viewHelper153->setRenderingContext($renderingContext);
$viewHelper153->setRenderChildrenClosure($renderChildrenClosure152);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output150 .= $viewHelper153->initializeArgumentsAndRender();

$output150 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments154 = array();
$arguments154['property'] = 'form';
$arguments154['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form', $renderingContext);
$arguments154['additionalAttributes'] = NULL;
$arguments154['data'] = NULL;
$arguments154['name'] = NULL;
$arguments154['class'] = NULL;
$arguments154['dir'] = NULL;
$arguments154['id'] = NULL;
$arguments154['lang'] = NULL;
$arguments154['style'] = NULL;
$arguments154['title'] = NULL;
$arguments154['accesskey'] = NULL;
$arguments154['tabindex'] = NULL;
$arguments154['onclick'] = NULL;
$renderChildrenClosure155 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper156 = $self->getViewHelper('$viewHelper156', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper156->setArguments($arguments154);
$viewHelper156->setRenderingContext($renderingContext);
$viewHelper156->setRenderChildrenClosure($renderChildrenClosure155);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output150 .= $viewHelper156->initializeArgumentsAndRender();

$output150 .= '
                ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments157 = array();
$arguments157['value'] = 'Submit';
$arguments157['additionalAttributes'] = NULL;
$arguments157['data'] = NULL;
$arguments157['name'] = NULL;
$arguments157['property'] = NULL;
$arguments157['disabled'] = NULL;
$arguments157['class'] = NULL;
$arguments157['dir'] = NULL;
$arguments157['id'] = NULL;
$arguments157['lang'] = NULL;
$arguments157['style'] = NULL;
$arguments157['title'] = NULL;
$arguments157['accesskey'] = NULL;
$arguments157['tabindex'] = NULL;
$arguments157['onclick'] = NULL;
$renderChildrenClosure158 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper159 = $self->getViewHelper('$viewHelper159', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper159->setArguments($arguments157);
$viewHelper159->setRenderingContext($renderingContext);
$viewHelper159->setRenderChildrenClosure($renderChildrenClosure158);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output150 .= $viewHelper159->initializeArgumentsAndRender();

$output150 .= '
            ';
return $output150;
};
$viewHelper160 = $self->getViewHelper('$viewHelper160', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper160->setArguments($arguments148);
$viewHelper160->setRenderingContext($renderingContext);
$viewHelper160->setRenderChildrenClosure($renderChildrenClosure149);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output138 .= $viewHelper160->initializeArgumentsAndRender();

$output138 .= '
            </td>
		</tr>
	</table>
	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments161 = array();
$arguments161['action'] = 'index';
$arguments161['additionalAttributes'] = NULL;
$arguments161['data'] = NULL;
$arguments161['arguments'] = array (
);
$arguments161['controller'] = NULL;
$arguments161['package'] = NULL;
$arguments161['subpackage'] = NULL;
$arguments161['section'] = '';
$arguments161['format'] = '';
$arguments161['additionalParams'] = array (
);
$arguments161['addQueryString'] = false;
$arguments161['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments161['useParentRequest'] = false;
$arguments161['absolute'] = true;
$arguments161['class'] = NULL;
$arguments161['dir'] = NULL;
$arguments161['id'] = NULL;
$arguments161['lang'] = NULL;
$arguments161['style'] = NULL;
$arguments161['title'] = NULL;
$arguments161['accesskey'] = NULL;
$arguments161['tabindex'] = NULL;
$arguments161['onclick'] = NULL;
$arguments161['name'] = NULL;
$arguments161['rel'] = NULL;
$arguments161['rev'] = NULL;
$arguments161['target'] = NULL;
$renderChildrenClosure162 = function() use ($renderingContext, $self) {
return 'Back';
};
$viewHelper163 = $self->getViewHelper('$viewHelper163', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper163->setArguments($arguments161);
$viewHelper163->setRenderingContext($renderingContext);
$viewHelper163->setRenderChildrenClosure($renderChildrenClosure162);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output138 .= $viewHelper163->initializeArgumentsAndRender();

$output138 .= ' -->





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
$arguments164 = array();
$arguments164['action'] = 'index';
$arguments164['class'] = 'navbar-brand';
$arguments164['additionalAttributes'] = NULL;
$arguments164['data'] = NULL;
$arguments164['arguments'] = array (
);
$arguments164['controller'] = NULL;
$arguments164['package'] = NULL;
$arguments164['subpackage'] = NULL;
$arguments164['section'] = '';
$arguments164['format'] = '';
$arguments164['additionalParams'] = array (
);
$arguments164['addQueryString'] = false;
$arguments164['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments164['useParentRequest'] = false;
$arguments164['absolute'] = true;
$arguments164['dir'] = NULL;
$arguments164['id'] = NULL;
$arguments164['lang'] = NULL;
$arguments164['style'] = NULL;
$arguments164['title'] = NULL;
$arguments164['accesskey'] = NULL;
$arguments164['tabindex'] = NULL;
$arguments164['onclick'] = NULL;
$arguments164['name'] = NULL;
$arguments164['rel'] = NULL;
$arguments164['rev'] = NULL;
$arguments164['target'] = NULL;
$renderChildrenClosure165 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper166 = $self->getViewHelper('$viewHelper166', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper166->setArguments($arguments164);
$viewHelper166->setRenderingContext($renderingContext);
$viewHelper166->setRenderChildrenClosure($renderChildrenClosure165);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output138 .= $viewHelper166->initializeArgumentsAndRender();

$output138 .= '
	      </div> <!-- End navbar-header -->

	      <div class="collapse navbar-collapse" id="navigation">
	          <ul class="nav navbar-nav navbar-right">
                <li id="list-1" class="item">
                  ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments167 = array();
$arguments167['action'] = 'index';
$arguments167['additionalAttributes'] = NULL;
$arguments167['data'] = NULL;
$arguments167['arguments'] = array (
);
$arguments167['controller'] = NULL;
$arguments167['package'] = NULL;
$arguments167['subpackage'] = NULL;
$arguments167['section'] = '';
$arguments167['format'] = '';
$arguments167['additionalParams'] = array (
);
$arguments167['addQueryString'] = false;
$arguments167['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments167['useParentRequest'] = false;
$arguments167['absolute'] = true;
$arguments167['class'] = NULL;
$arguments167['dir'] = NULL;
$arguments167['id'] = NULL;
$arguments167['lang'] = NULL;
$arguments167['style'] = NULL;
$arguments167['title'] = NULL;
$arguments167['accesskey'] = NULL;
$arguments167['tabindex'] = NULL;
$arguments167['onclick'] = NULL;
$arguments167['name'] = NULL;
$arguments167['rel'] = NULL;
$arguments167['rev'] = NULL;
$arguments167['target'] = NULL;
$renderChildrenClosure168 = function() use ($renderingContext, $self) {
return 'Home';
};
$viewHelper169 = $self->getViewHelper('$viewHelper169', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper169->setArguments($arguments167);
$viewHelper169->setRenderingContext($renderingContext);
$viewHelper169->setRenderChildrenClosure($renderChildrenClosure168);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output138 .= $viewHelper169->initializeArgumentsAndRender();

$output138 .= '
                </li>

								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments170 = array();
// Rendering Boolean node
$arguments170['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext));
$arguments170['then'] = NULL;
$arguments170['else'] = NULL;
$renderChildrenClosure171 = function() use ($renderingContext, $self) {
$output172 = '';

$output172 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments173 = array();
$renderChildrenClosure174 = function() use ($renderingContext, $self) {
$output175 = '';

$output175 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments176 = array();
$arguments176['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments176['as'] = 'format';
$arguments176['iteration'] = 'key';
$arguments176['key'] = '';
$arguments176['reverse'] = false;
$renderChildrenClosure177 = function() use ($renderingContext, $self) {
$output178 = '';

$output178 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments179 = array();
$arguments179['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments179['keepQuotes'] = false;
$arguments179['encoding'] = 'UTF-8';
$arguments179['doubleEncode'] = true;
$renderChildrenClosure180 = function() use ($renderingContext, $self) {
return NULL;
};
$value181 = ($arguments179['value'] !== NULL ? $arguments179['value'] : $renderChildrenClosure180());

$output178 .= !is_string($value181) && !(is_object($value181) && method_exists($value181, '__toString')) ? $value181 : htmlspecialchars($value181, ($arguments179['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments179['encoding'], $arguments179['doubleEncode']);

$output178 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments182 = array();
$arguments182['action'] = 'show';
// Rendering Array
$array183 = array();
$array183['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments182['arguments'] = $array183;
$output184 = '';

$output184 .= 'form-';

$output184 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments182['id'] = $output184;
$arguments182['class'] = 'list';
$arguments182['additionalAttributes'] = NULL;
$arguments182['data'] = NULL;
$arguments182['controller'] = NULL;
$arguments182['package'] = NULL;
$arguments182['subpackage'] = NULL;
$arguments182['section'] = '';
$arguments182['format'] = '';
$arguments182['additionalParams'] = array (
);
$arguments182['addQueryString'] = false;
$arguments182['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments182['useParentRequest'] = false;
$arguments182['absolute'] = true;
$arguments182['dir'] = NULL;
$arguments182['lang'] = NULL;
$arguments182['style'] = NULL;
$arguments182['title'] = NULL;
$arguments182['accesskey'] = NULL;
$arguments182['tabindex'] = NULL;
$arguments182['onclick'] = NULL;
$arguments182['name'] = NULL;
$arguments182['rel'] = NULL;
$arguments182['rev'] = NULL;
$arguments182['target'] = NULL;
$renderChildrenClosure185 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments186 = array();
$arguments186['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments186['keepQuotes'] = false;
$arguments186['encoding'] = 'UTF-8';
$arguments186['doubleEncode'] = true;
$renderChildrenClosure187 = function() use ($renderingContext, $self) {
return NULL;
};
$value188 = ($arguments186['value'] !== NULL ? $arguments186['value'] : $renderChildrenClosure187());
return !is_string($value188) && !(is_object($value188) && method_exists($value188, '__toString')) ? $value188 : htmlspecialchars($value188, ($arguments186['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments186['encoding'], $arguments186['doubleEncode']);
};
$viewHelper189 = $self->getViewHelper('$viewHelper189', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper189->setArguments($arguments182);
$viewHelper189->setRenderingContext($renderingContext);
$viewHelper189->setRenderChildrenClosure($renderChildrenClosure185);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output178 .= $viewHelper189->initializeArgumentsAndRender();

$output178 .= '
												</li>
											';
return $output178;
};

$output175 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments176, $renderChildrenClosure177, $renderingContext);

$output175 .= '
									';
return $output175;
};
$viewHelper190 = $self->getViewHelper('$viewHelper190', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper190->setArguments($arguments173);
$viewHelper190->setRenderingContext($renderingContext);
$viewHelper190->setRenderChildrenClosure($renderChildrenClosure174);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output172 .= $viewHelper190->initializeArgumentsAndRender();

$output172 .= '
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments191 = array();
$renderChildrenClosure192 = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper193 = $self->getViewHelper('$viewHelper193', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper193->setArguments($arguments191);
$viewHelper193->setRenderingContext($renderingContext);
$viewHelper193->setRenderChildrenClosure($renderChildrenClosure192);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output172 .= $viewHelper193->initializeArgumentsAndRender();

$output172 .= '
								';
return $output172;
};
$arguments170['__thenClosure'] = function() use ($renderingContext, $self) {
$output194 = '';

$output194 .= '
											';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments195 = array();
$arguments195['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'forms', $renderingContext);
$arguments195['as'] = 'format';
$arguments195['iteration'] = 'key';
$arguments195['key'] = '';
$arguments195['reverse'] = false;
$renderChildrenClosure196 = function() use ($renderingContext, $self) {
$output197 = '';

$output197 .= '
												<li id="list-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments198 = array();
$arguments198['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments198['keepQuotes'] = false;
$arguments198['encoding'] = 'UTF-8';
$arguments198['doubleEncode'] = true;
$renderChildrenClosure199 = function() use ($renderingContext, $self) {
return NULL;
};
$value200 = ($arguments198['value'] !== NULL ? $arguments198['value'] : $renderChildrenClosure199());

$output197 .= !is_string($value200) && !(is_object($value200) && method_exists($value200, '__toString')) ? $value200 : htmlspecialchars($value200, ($arguments198['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments198['encoding'], $arguments198['doubleEncode']);

$output197 .= '" class="item">
													';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments201 = array();
$arguments201['action'] = 'show';
// Rendering Array
$array202 = array();
$array202['form'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format', $renderingContext);
$arguments201['arguments'] = $array202;
$output203 = '';

$output203 .= 'form-';

$output203 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments201['id'] = $output203;
$arguments201['class'] = 'list';
$arguments201['additionalAttributes'] = NULL;
$arguments201['data'] = NULL;
$arguments201['controller'] = NULL;
$arguments201['package'] = NULL;
$arguments201['subpackage'] = NULL;
$arguments201['section'] = '';
$arguments201['format'] = '';
$arguments201['additionalParams'] = array (
);
$arguments201['addQueryString'] = false;
$arguments201['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments201['useParentRequest'] = false;
$arguments201['absolute'] = true;
$arguments201['dir'] = NULL;
$arguments201['lang'] = NULL;
$arguments201['style'] = NULL;
$arguments201['title'] = NULL;
$arguments201['accesskey'] = NULL;
$arguments201['tabindex'] = NULL;
$arguments201['onclick'] = NULL;
$arguments201['name'] = NULL;
$arguments201['rel'] = NULL;
$arguments201['rev'] = NULL;
$arguments201['target'] = NULL;
$renderChildrenClosure204 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments205 = array();
$arguments205['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'format.name', $renderingContext);
$arguments205['keepQuotes'] = false;
$arguments205['encoding'] = 'UTF-8';
$arguments205['doubleEncode'] = true;
$renderChildrenClosure206 = function() use ($renderingContext, $self) {
return NULL;
};
$value207 = ($arguments205['value'] !== NULL ? $arguments205['value'] : $renderChildrenClosure206());
return !is_string($value207) && !(is_object($value207) && method_exists($value207, '__toString')) ? $value207 : htmlspecialchars($value207, ($arguments205['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments205['encoding'], $arguments205['doubleEncode']);
};
$viewHelper208 = $self->getViewHelper('$viewHelper208', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper208->setArguments($arguments201);
$viewHelper208->setRenderingContext($renderingContext);
$viewHelper208->setRenderChildrenClosure($renderChildrenClosure204);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output197 .= $viewHelper208->initializeArgumentsAndRender();

$output197 .= '
												</li>
											';
return $output197;
};

$output194 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments195, $renderChildrenClosure196, $renderingContext);

$output194 .= '
									';
return $output194;
};
$arguments170['__elseClosure'] = function() use ($renderingContext, $self) {
return '
										<p>No forms created yet.</p>
									';
};
$viewHelper209 = $self->getViewHelper('$viewHelper209', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper209->setArguments($arguments170);
$viewHelper209->setRenderingContext($renderingContext);
$viewHelper209->setRenderChildrenClosure($renderChildrenClosure171);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output138 .= $viewHelper209->initializeArgumentsAndRender();

$output138 .= '


	              <li id="list-5" class="dropdown item">
	                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments210 = array();
$arguments210['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments210['keepQuotes'] = false;
$arguments210['encoding'] = 'UTF-8';
$arguments210['doubleEncode'] = true;
$renderChildrenClosure211 = function() use ($renderingContext, $self) {
return NULL;
};
$value212 = ($arguments210['value'] !== NULL ? $arguments210['value'] : $renderChildrenClosure211());

$output138 .= !is_string($value212) && !(is_object($value212) && method_exists($value212, '__toString')) ? $value212 : htmlspecialchars($value212, ($arguments210['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments210['encoding'], $arguments210['doubleEncode']);

$output138 .= ' <span class="caret"></span></a>
	                  <ul class="dropdown-menu">
	                    <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments213 = array();
$arguments213['action'] = 'logout';
$arguments213['additionalAttributes'] = NULL;
$arguments213['data'] = NULL;
$arguments213['arguments'] = array (
);
$arguments213['controller'] = NULL;
$arguments213['package'] = NULL;
$arguments213['subpackage'] = NULL;
$arguments213['section'] = '';
$arguments213['format'] = '';
$arguments213['additionalParams'] = array (
);
$arguments213['addQueryString'] = false;
$arguments213['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments213['useParentRequest'] = false;
$arguments213['absolute'] = true;
$arguments213['class'] = NULL;
$arguments213['dir'] = NULL;
$arguments213['id'] = NULL;
$arguments213['lang'] = NULL;
$arguments213['style'] = NULL;
$arguments213['title'] = NULL;
$arguments213['accesskey'] = NULL;
$arguments213['tabindex'] = NULL;
$arguments213['onclick'] = NULL;
$arguments213['name'] = NULL;
$arguments213['rel'] = NULL;
$arguments213['rev'] = NULL;
$arguments213['target'] = NULL;
$renderChildrenClosure214 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper215 = $self->getViewHelper('$viewHelper215', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper215->setArguments($arguments213);
$viewHelper215->setRenderingContext($renderingContext);
$viewHelper215->setRenderChildrenClosure($renderChildrenClosure214);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output138 .= $viewHelper215->initializeArgumentsAndRender();

$output138 .= '</li>
                      <li>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments216 = array();
$arguments216['action'] = 'profile';
$arguments216['additionalAttributes'] = NULL;
$arguments216['data'] = NULL;
$arguments216['arguments'] = array (
);
$arguments216['controller'] = NULL;
$arguments216['package'] = NULL;
$arguments216['subpackage'] = NULL;
$arguments216['section'] = '';
$arguments216['format'] = '';
$arguments216['additionalParams'] = array (
);
$arguments216['addQueryString'] = false;
$arguments216['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments216['useParentRequest'] = false;
$arguments216['absolute'] = true;
$arguments216['class'] = NULL;
$arguments216['dir'] = NULL;
$arguments216['id'] = NULL;
$arguments216['lang'] = NULL;
$arguments216['style'] = NULL;
$arguments216['title'] = NULL;
$arguments216['accesskey'] = NULL;
$arguments216['tabindex'] = NULL;
$arguments216['onclick'] = NULL;
$arguments216['name'] = NULL;
$arguments216['rel'] = NULL;
$arguments216['rev'] = NULL;
$arguments216['target'] = NULL;
$renderChildrenClosure217 = function() use ($renderingContext, $self) {
return 'Profile';
};
$viewHelper218 = $self->getViewHelper('$viewHelper218', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper218->setArguments($arguments216);
$viewHelper218->setRenderingContext($renderingContext);
$viewHelper218->setRenderChildrenClosure($renderChildrenClosure217);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output138 .= $viewHelper218->initializeArgumentsAndRender();

$output138 .= '</li>
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

            ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments219 = array();
$arguments219['action'] = 'create';
$arguments219['controller'] = 'Answer';
$arguments219['additionalAttributes'] = NULL;
$arguments219['data'] = NULL;
$arguments219['arguments'] = array (
);
$arguments219['package'] = NULL;
$arguments219['subpackage'] = NULL;
$arguments219['object'] = NULL;
$arguments219['section'] = '';
$arguments219['format'] = '';
$arguments219['additionalParams'] = array (
);
$arguments219['absolute'] = false;
$arguments219['addQueryString'] = false;
$arguments219['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments219['fieldNamePrefix'] = NULL;
$arguments219['actionUri'] = NULL;
$arguments219['objectName'] = NULL;
$arguments219['useParentRequest'] = false;
$arguments219['enctype'] = NULL;
$arguments219['method'] = NULL;
$arguments219['name'] = NULL;
$arguments219['onreset'] = NULL;
$arguments219['onsubmit'] = NULL;
$arguments219['class'] = NULL;
$arguments219['dir'] = NULL;
$arguments219['id'] = NULL;
$arguments219['lang'] = NULL;
$arguments219['style'] = NULL;
$arguments219['title'] = NULL;
$arguments219['accesskey'] = NULL;
$arguments219['tabindex'] = NULL;
$arguments219['onclick'] = NULL;
$renderChildrenClosure220 = function() use ($renderingContext, $self) {
$output221 = '';

$output221 .= '

  	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments222 = array();
$arguments222['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments222['as'] = 'question';
$arguments222['iteration'] = 'key';
$arguments222['key'] = '';
$arguments222['reverse'] = false;
$renderChildrenClosure223 = function() use ($renderingContext, $self) {
$output224 = '';

$output224 .= '
  	            <div class="col-md-6">
  	                <div class="list-group">
  	                    <div class="list-group-item">
  	                      <h4 class="list-group-item-heading">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments225 = array();
$arguments225['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments225['keepQuotes'] = false;
$arguments225['encoding'] = 'UTF-8';
$arguments225['doubleEncode'] = true;
$renderChildrenClosure226 = function() use ($renderingContext, $self) {
return NULL;
};
$value227 = ($arguments225['value'] !== NULL ? $arguments225['value'] : $renderChildrenClosure226());

$output224 .= !is_string($value227) && !(is_object($value227) && method_exists($value227, '__toString')) ? $value227 : htmlspecialchars($value227, ($arguments225['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments225['encoding'], $arguments225['doubleEncode']);

$output224 .= '</h4>

                          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments228 = array();
$output229 = '';

$output229 .= 'obj[question-';

$output229 .= \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);

$output229 .= ']';
$arguments228['name'] = $output229;
$arguments228['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question', $renderingContext);
$arguments228['additionalAttributes'] = NULL;
$arguments228['data'] = NULL;
$arguments228['property'] = NULL;
$arguments228['class'] = NULL;
$arguments228['dir'] = NULL;
$arguments228['id'] = NULL;
$arguments228['lang'] = NULL;
$arguments228['style'] = NULL;
$arguments228['title'] = NULL;
$arguments228['accesskey'] = NULL;
$arguments228['tabindex'] = NULL;
$arguments228['onclick'] = NULL;
$renderChildrenClosure230 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper231 = $self->getViewHelper('$viewHelper231', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper231->setArguments($arguments228);
$viewHelper231->setRenderingContext($renderingContext);
$viewHelper231->setRenderChildrenClosure($renderChildrenClosure230);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\HiddenViewHelper

$output224 .= $viewHelper231->initializeArgumentsAndRender();

$output224 .= '

                          <!-- <input type="hidden" id="question-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments232 = array();
$arguments232['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments232['keepQuotes'] = false;
$arguments232['encoding'] = 'UTF-8';
$arguments232['doubleEncode'] = true;
$renderChildrenClosure233 = function() use ($renderingContext, $self) {
return NULL;
};
$value234 = ($arguments232['value'] !== NULL ? $arguments232['value'] : $renderChildrenClosure233());

$output224 .= !is_string($value234) && !(is_object($value234) && method_exists($value234, '__toString')) ? $value234 : htmlspecialchars($value234, ($arguments232['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments232['encoding'], $arguments232['doubleEncode']);

$output224 .= '" class="form-control" name="obj[question][]" value="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments235 = array();
$arguments235['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.id', $renderingContext);
$arguments235['keepQuotes'] = false;
$arguments235['encoding'] = 'UTF-8';
$arguments235['doubleEncode'] = true;
$renderChildrenClosure236 = function() use ($renderingContext, $self) {
return NULL;
};
$value237 = ($arguments235['value'] !== NULL ? $arguments235['value'] : $renderChildrenClosure236());

$output224 .= !is_string($value237) && !(is_object($value237) && method_exists($value237, '__toString')) ? $value237 : htmlspecialchars($value237, ($arguments235['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments235['encoding'], $arguments235['doubleEncode']);

$output224 .= '"> -->

                          <input type="text" id="answer-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments238 = array();
$arguments238['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments238['keepQuotes'] = false;
$arguments238['encoding'] = 'UTF-8';
$arguments238['doubleEncode'] = true;
$renderChildrenClosure239 = function() use ($renderingContext, $self) {
return NULL;
};
$value240 = ($arguments238['value'] !== NULL ? $arguments238['value'] : $renderChildrenClosure239());

$output224 .= !is_string($value240) && !(is_object($value240) && method_exists($value240, '__toString')) ? $value240 : htmlspecialchars($value240, ($arguments238['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments238['encoding'], $arguments238['doubleEncode']);

$output224 .= '" class="form-control" name="obj[question-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments241 = array();
$arguments241['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments241['keepQuotes'] = false;
$arguments241['encoding'] = 'UTF-8';
$arguments241['doubleEncode'] = true;
$renderChildrenClosure242 = function() use ($renderingContext, $self) {
return NULL;
};
$value243 = ($arguments241['value'] !== NULL ? $arguments241['value'] : $renderChildrenClosure242());

$output224 .= !is_string($value243) && !(is_object($value243) && method_exists($value243, '__toString')) ? $value243 : htmlspecialchars($value243, ($arguments241['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments241['encoding'], $arguments241['doubleEncode']);

$output224 .= '][]" placeholder="Input answer" required>

  	                      <!-- <input type="text" id="answer-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments244 = array();
$arguments244['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments244['keepQuotes'] = false;
$arguments244['encoding'] = 'UTF-8';
$arguments244['doubleEncode'] = true;
$renderChildrenClosure245 = function() use ($renderingContext, $self) {
return NULL;
};
$value246 = ($arguments244['value'] !== NULL ? $arguments244['value'] : $renderChildrenClosure245());

$output224 .= !is_string($value246) && !(is_object($value246) && method_exists($value246, '__toString')) ? $value246 : htmlspecialchars($value246, ($arguments244['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments244['encoding'], $arguments244['doubleEncode']);

$output224 .= '  \'" class="form-control" name="answer" placeholder="Input answer" required> -->

  	                      <p id="alert-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments247 = array();
$arguments247['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments247['keepQuotes'] = false;
$arguments247['encoding'] = 'UTF-8';
$arguments247['doubleEncode'] = true;
$renderChildrenClosure248 = function() use ($renderingContext, $self) {
return NULL;
};
$value249 = ($arguments247['value'] !== NULL ? $arguments247['value'] : $renderChildrenClosure248());

$output224 .= !is_string($value249) && !(is_object($value249) && method_exists($value249, '__toString')) ? $value249 : htmlspecialchars($value249, ($arguments247['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments247['encoding'], $arguments247['doubleEncode']);

$output224 .= '" style="color: red;visibility: hidden;">*Please input your answer...</p>
  	                    </div>
  	                </div>
  	            </div>
  	          ';
return $output224;
};

$output221 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments222, $renderChildrenClosure223, $renderingContext);

$output221 .= '


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
	        <div class="modal-body" id="answerbody">

              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Your Answer here: </h3>
              <table id="answerContainer" class="table" style="display: none" border="0">
                  ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments250 = array();
$arguments250['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'form.questions', $renderingContext);
$arguments250['as'] = 'question';
$arguments250['iteration'] = 'key';
$arguments250['key'] = '';
$arguments250['reverse'] = false;
$renderChildrenClosure251 = function() use ($renderingContext, $self) {
$output252 = '';

$output252 .= '
                    <tr>
                      <td>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments253 = array();
$arguments253['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'question.sentence', $renderingContext);
$arguments253['keepQuotes'] = false;
$arguments253['encoding'] = 'UTF-8';
$arguments253['doubleEncode'] = true;
$renderChildrenClosure254 = function() use ($renderingContext, $self) {
return NULL;
};
$value255 = ($arguments253['value'] !== NULL ? $arguments253['value'] : $renderChildrenClosure254());

$output252 .= !is_string($value255) && !(is_object($value255) && method_exists($value255, '__toString')) ? $value255 : htmlspecialchars($value255, ($arguments253['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments253['encoding'], $arguments253['doubleEncode']);

$output252 .= '</td>
                      <td id="answerHere-';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments256 = array();
$arguments256['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'key.cycle', $renderingContext);
$arguments256['keepQuotes'] = false;
$arguments256['encoding'] = 'UTF-8';
$arguments256['doubleEncode'] = true;
$renderChildrenClosure257 = function() use ($renderingContext, $self) {
return NULL;
};
$value258 = ($arguments256['value'] !== NULL ? $arguments256['value'] : $renderChildrenClosure257());

$output252 .= !is_string($value258) && !(is_object($value258) && method_exists($value258, '__toString')) ? $value258 : htmlspecialchars($value258, ($arguments256['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments256['encoding'], $arguments256['doubleEncode']);

$output252 .= '"></td>
                    </tr>

                  ';
return $output252;
};

$output221 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments250, $renderChildrenClosure251, $renderingContext);

$output221 .= '
                  <!-- Answer here-->

	            </table>
	        </div>
	        <div class="modal-footer">

	          ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments259 = array();
$arguments259['class'] = 'btn btn-primary';
$arguments259['value'] = 'Save';
$arguments259['additionalAttributes'] = NULL;
$arguments259['data'] = NULL;
$arguments259['name'] = NULL;
$arguments259['property'] = NULL;
$arguments259['disabled'] = NULL;
$arguments259['dir'] = NULL;
$arguments259['id'] = NULL;
$arguments259['lang'] = NULL;
$arguments259['style'] = NULL;
$arguments259['title'] = NULL;
$arguments259['accesskey'] = NULL;
$arguments259['tabindex'] = NULL;
$arguments259['onclick'] = NULL;
$renderChildrenClosure260 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper261 = $self->getViewHelper('$viewHelper261', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper261->setArguments($arguments259);
$viewHelper261->setRenderingContext($renderingContext);
$viewHelper261->setRenderChildrenClosure($renderChildrenClosure260);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output221 .= $viewHelper261->initializeArgumentsAndRender();

$output221 .= '

        ';
return $output221;
};
$viewHelper262 = $self->getViewHelper('$viewHelper262', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper262->setArguments($arguments219);
$viewHelper262->setRenderingContext($renderingContext);
$viewHelper262->setRenderChildrenClosure($renderChildrenClosure220);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output138 .= $viewHelper262->initializeArgumentsAndRender();

$output138 .= '


	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>

	    </div>

	  </div>

	</div>

	</div>


';
return $output138;
};

$output125 .= '';

$output125 .= '
';

return $output125;
}


}
#0             94030     