<?php class FluidCache_SKL_Test_User_action_index_9433a2659dc3c35fa2f43a89d4e698bc521ab919 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
 * section stylesheet
 */
public function section_220d19d1bc706bb369de96ef5d33b4398c5314ef(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '<link rel="stylesheet" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments1 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments2 = array();
$arguments2['path'] = 'CSS/style.css';
$arguments2['package'] = 'SKL.Test';
$arguments2['resource'] = NULL;
$arguments2['localize'] = true;
$renderChildrenClosure3 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper4 = $self->getViewHelper('$viewHelper4', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper4->setArguments($arguments2);
$viewHelper4->setRenderingContext($renderingContext);
$viewHelper4->setRenderChildrenClosure($renderChildrenClosure3);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments1['value'] = $viewHelper4->initializeArgumentsAndRender();
$arguments1['keepQuotes'] = false;
$arguments1['encoding'] = 'UTF-8';
$arguments1['doubleEncode'] = true;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$value6 = ($arguments1['value'] !== NULL ? $arguments1['value'] : $renderChildrenClosure5());

$output0 .= !is_string($value6) && !(is_object($value6) && method_exists($value6, '__toString')) ? $value6 : htmlspecialchars($value6, ($arguments1['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments1['encoding'], $arguments1['doubleEncode']);

$output0 .= '" />

';

return $output0;
}
/**
 * section Title
 */
public function section_768e0c1c69573fb588f61f1308a015c11468e05f(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'Welcome to our online question';
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output7 = '';

$output7 .= '
	<!-- ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments8 = array();
// Rendering Boolean node
$arguments8['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'users', $renderingContext));
$arguments8['then'] = NULL;
$arguments8['else'] = NULL;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
$output10 = '';

$output10 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments11 = array();
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
$output13 = '';

$output13 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments14 = array();
$arguments14['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'users', $renderingContext);
$arguments14['as'] = 'user';
$arguments14['key'] = '';
$arguments14['reverse'] = false;
$arguments14['iteration'] = NULL;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
$output16 = '';

$output16 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments17 = array();
$arguments17['action'] = 'show';
// Rendering Array
$array18 = array();
$array18['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments20 = array();
$arguments20['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user.name', $renderingContext);
$arguments20['keepQuotes'] = false;
$arguments20['encoding'] = 'UTF-8';
$arguments20['doubleEncode'] = true;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};
$value22 = ($arguments20['value'] !== NULL ? $arguments20['value'] : $renderChildrenClosure21());
return !is_string($value22) && !(is_object($value22) && method_exists($value22, '__toString')) ? $value22 : htmlspecialchars($value22, ($arguments20['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments20['encoding'], $arguments20['doubleEncode']);
};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper23->setArguments($arguments17);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure19);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output16 .= $viewHelper23->initializeArgumentsAndRender();

$output16 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments24 = array();
$arguments24['action'] = 'edit';
// Rendering Array
$array25 = array();
$array25['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments24['arguments'] = $array25;
$arguments24['additionalAttributes'] = NULL;
$arguments24['data'] = NULL;
$arguments24['controller'] = NULL;
$arguments24['package'] = NULL;
$arguments24['subpackage'] = NULL;
$arguments24['section'] = '';
$arguments24['format'] = '';
$arguments24['additionalParams'] = array (
);
$arguments24['addQueryString'] = false;
$arguments24['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments24['useParentRequest'] = false;
$arguments24['absolute'] = true;
$arguments24['class'] = NULL;
$arguments24['dir'] = NULL;
$arguments24['id'] = NULL;
$arguments24['lang'] = NULL;
$arguments24['style'] = NULL;
$arguments24['title'] = NULL;
$arguments24['accesskey'] = NULL;
$arguments24['tabindex'] = NULL;
$arguments24['onclick'] = NULL;
$arguments24['name'] = NULL;
$arguments24['rel'] = NULL;
$arguments24['rev'] = NULL;
$arguments24['target'] = NULL;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper27 = $self->getViewHelper('$viewHelper27', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper27->setArguments($arguments24);
$viewHelper27->setRenderingContext($renderingContext);
$viewHelper27->setRenderChildrenClosure($renderChildrenClosure26);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output16 .= $viewHelper27->initializeArgumentsAndRender();

$output16 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments28 = array();
$arguments28['action'] = 'delete';
// Rendering Array
$array29 = array();
$array29['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments28['arguments'] = $array29;
$arguments28['additionalAttributes'] = NULL;
$arguments28['data'] = NULL;
$arguments28['controller'] = NULL;
$arguments28['package'] = NULL;
$arguments28['subpackage'] = NULL;
$arguments28['object'] = NULL;
$arguments28['section'] = '';
$arguments28['format'] = '';
$arguments28['additionalParams'] = array (
);
$arguments28['absolute'] = false;
$arguments28['addQueryString'] = false;
$arguments28['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments28['fieldNamePrefix'] = NULL;
$arguments28['actionUri'] = NULL;
$arguments28['objectName'] = NULL;
$arguments28['useParentRequest'] = false;
$arguments28['enctype'] = NULL;
$arguments28['method'] = NULL;
$arguments28['name'] = NULL;
$arguments28['onreset'] = NULL;
$arguments28['onsubmit'] = NULL;
$arguments28['class'] = NULL;
$arguments28['dir'] = NULL;
$arguments28['id'] = NULL;
$arguments28['lang'] = NULL;
$arguments28['style'] = NULL;
$arguments28['title'] = NULL;
$arguments28['accesskey'] = NULL;
$arguments28['tabindex'] = NULL;
$arguments28['onclick'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$output31 = '';

$output31 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments32 = array();
$arguments32['value'] = 'Delete';
$arguments32['additionalAttributes'] = NULL;
$arguments32['data'] = NULL;
$arguments32['name'] = NULL;
$arguments32['property'] = NULL;
$arguments32['disabled'] = NULL;
$arguments32['class'] = NULL;
$arguments32['dir'] = NULL;
$arguments32['id'] = NULL;
$arguments32['lang'] = NULL;
$arguments32['style'] = NULL;
$arguments32['title'] = NULL;
$arguments32['accesskey'] = NULL;
$arguments32['tabindex'] = NULL;
$arguments32['onclick'] = NULL;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper34 = $self->getViewHelper('$viewHelper34', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper34->setArguments($arguments32);
$viewHelper34->setRenderingContext($renderingContext);
$viewHelper34->setRenderChildrenClosure($renderChildrenClosure33);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output31 .= $viewHelper34->initializeArgumentsAndRender();

$output31 .= '
						';
return $output31;
};
$viewHelper35 = $self->getViewHelper('$viewHelper35', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper35->setArguments($arguments28);
$viewHelper35->setRenderingContext($renderingContext);
$viewHelper35->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output16 .= $viewHelper35->initializeArgumentsAndRender();

$output16 .= '
					</li>
				';
return $output16;
};

$output13 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments14, $renderChildrenClosure15, $renderingContext);

$output13 .= '
			</ul>
		';
return $output13;
};
$viewHelper36 = $self->getViewHelper('$viewHelper36', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper36->setArguments($arguments11);
$viewHelper36->setRenderingContext($renderingContext);
$viewHelper36->setRenderChildrenClosure($renderChildrenClosure12);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output10 .= $viewHelper36->initializeArgumentsAndRender();

$output10 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments37 = array();
$renderChildrenClosure38 = function() use ($renderingContext, $self) {
return '
			<p>No users created yet.</p>
		';
};
$viewHelper39 = $self->getViewHelper('$viewHelper39', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper39->setArguments($arguments37);
$viewHelper39->setRenderingContext($renderingContext);
$viewHelper39->setRenderChildrenClosure($renderChildrenClosure38);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output10 .= $viewHelper39->initializeArgumentsAndRender();

$output10 .= '
	';
return $output10;
};
$arguments8['__thenClosure'] = function() use ($renderingContext, $self) {
$output40 = '';

$output40 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments41 = array();
$arguments41['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'users', $renderingContext);
$arguments41['as'] = 'user';
$arguments41['key'] = '';
$arguments41['reverse'] = false;
$arguments41['iteration'] = NULL;
$renderChildrenClosure42 = function() use ($renderingContext, $self) {
$output43 = '';

$output43 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments44 = array();
$arguments44['action'] = 'show';
// Rendering Array
$array45 = array();
$array45['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments47 = array();
$arguments47['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user.name', $renderingContext);
$arguments47['keepQuotes'] = false;
$arguments47['encoding'] = 'UTF-8';
$arguments47['doubleEncode'] = true;
$renderChildrenClosure48 = function() use ($renderingContext, $self) {
return NULL;
};
$value49 = ($arguments47['value'] !== NULL ? $arguments47['value'] : $renderChildrenClosure48());
return !is_string($value49) && !(is_object($value49) && method_exists($value49, '__toString')) ? $value49 : htmlspecialchars($value49, ($arguments47['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments47['encoding'], $arguments47['doubleEncode']);
};
$viewHelper50 = $self->getViewHelper('$viewHelper50', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper50->setArguments($arguments44);
$viewHelper50->setRenderingContext($renderingContext);
$viewHelper50->setRenderChildrenClosure($renderChildrenClosure46);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output43 .= $viewHelper50->initializeArgumentsAndRender();

$output43 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments51 = array();
$arguments51['action'] = 'edit';
// Rendering Array
$array52 = array();
$array52['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments51['arguments'] = $array52;
$arguments51['additionalAttributes'] = NULL;
$arguments51['data'] = NULL;
$arguments51['controller'] = NULL;
$arguments51['package'] = NULL;
$arguments51['subpackage'] = NULL;
$arguments51['section'] = '';
$arguments51['format'] = '';
$arguments51['additionalParams'] = array (
);
$arguments51['addQueryString'] = false;
$arguments51['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments51['useParentRequest'] = false;
$arguments51['absolute'] = true;
$arguments51['class'] = NULL;
$arguments51['dir'] = NULL;
$arguments51['id'] = NULL;
$arguments51['lang'] = NULL;
$arguments51['style'] = NULL;
$arguments51['title'] = NULL;
$arguments51['accesskey'] = NULL;
$arguments51['tabindex'] = NULL;
$arguments51['onclick'] = NULL;
$arguments51['name'] = NULL;
$arguments51['rel'] = NULL;
$arguments51['rev'] = NULL;
$arguments51['target'] = NULL;
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper54 = $self->getViewHelper('$viewHelper54', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper54->setArguments($arguments51);
$viewHelper54->setRenderingContext($renderingContext);
$viewHelper54->setRenderChildrenClosure($renderChildrenClosure53);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output43 .= $viewHelper54->initializeArgumentsAndRender();

$output43 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments55 = array();
$arguments55['action'] = 'delete';
// Rendering Array
$array56 = array();
$array56['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments55['arguments'] = $array56;
$arguments55['additionalAttributes'] = NULL;
$arguments55['data'] = NULL;
$arguments55['controller'] = NULL;
$arguments55['package'] = NULL;
$arguments55['subpackage'] = NULL;
$arguments55['object'] = NULL;
$arguments55['section'] = '';
$arguments55['format'] = '';
$arguments55['additionalParams'] = array (
);
$arguments55['absolute'] = false;
$arguments55['addQueryString'] = false;
$arguments55['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments55['fieldNamePrefix'] = NULL;
$arguments55['actionUri'] = NULL;
$arguments55['objectName'] = NULL;
$arguments55['useParentRequest'] = false;
$arguments55['enctype'] = NULL;
$arguments55['method'] = NULL;
$arguments55['name'] = NULL;
$arguments55['onreset'] = NULL;
$arguments55['onsubmit'] = NULL;
$arguments55['class'] = NULL;
$arguments55['dir'] = NULL;
$arguments55['id'] = NULL;
$arguments55['lang'] = NULL;
$arguments55['style'] = NULL;
$arguments55['title'] = NULL;
$arguments55['accesskey'] = NULL;
$arguments55['tabindex'] = NULL;
$arguments55['onclick'] = NULL;
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
$output58 = '';

$output58 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments59 = array();
$arguments59['value'] = 'Delete';
$arguments59['additionalAttributes'] = NULL;
$arguments59['data'] = NULL;
$arguments59['name'] = NULL;
$arguments59['property'] = NULL;
$arguments59['disabled'] = NULL;
$arguments59['class'] = NULL;
$arguments59['dir'] = NULL;
$arguments59['id'] = NULL;
$arguments59['lang'] = NULL;
$arguments59['style'] = NULL;
$arguments59['title'] = NULL;
$arguments59['accesskey'] = NULL;
$arguments59['tabindex'] = NULL;
$arguments59['onclick'] = NULL;
$renderChildrenClosure60 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper61 = $self->getViewHelper('$viewHelper61', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper61->setArguments($arguments59);
$viewHelper61->setRenderingContext($renderingContext);
$viewHelper61->setRenderChildrenClosure($renderChildrenClosure60);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output58 .= $viewHelper61->initializeArgumentsAndRender();

$output58 .= '
						';
return $output58;
};
$viewHelper62 = $self->getViewHelper('$viewHelper62', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper62->setArguments($arguments55);
$viewHelper62->setRenderingContext($renderingContext);
$viewHelper62->setRenderChildrenClosure($renderChildrenClosure57);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output43 .= $viewHelper62->initializeArgumentsAndRender();

$output43 .= '
					</li>
				';
return $output43;
};

$output40 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments41, $renderChildrenClosure42, $renderingContext);

$output40 .= '
			</ul>
		';
return $output40;
};
$arguments8['__elseClosure'] = function() use ($renderingContext, $self) {
return '
			<p>No users created yet.</p>
		';
};
$viewHelper63 = $self->getViewHelper('$viewHelper63', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper63->setArguments($arguments8);
$viewHelper63->setRenderingContext($renderingContext);
$viewHelper63->setRenderChildrenClosure($renderChildrenClosure9);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output7 .= $viewHelper63->initializeArgumentsAndRender();

$output7 .= ' -->

	<div class="container" id="loginForm">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">

				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments64 = array();
$arguments64['class'] = 'flashmessages';
$arguments64['id'] = 'flash';
$arguments64['style'] = 'list-style-type:none;color:red;';
$arguments64['additionalAttributes'] = NULL;
$arguments64['data'] = NULL;
$arguments64['as'] = NULL;
$arguments64['severity'] = NULL;
$arguments64['dir'] = NULL;
$arguments64['lang'] = NULL;
$arguments64['title'] = NULL;
$arguments64['accesskey'] = NULL;
$arguments64['tabindex'] = NULL;
$arguments64['onclick'] = NULL;
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper66 = $self->getViewHelper('$viewHelper66', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper66->setArguments($arguments64);
$viewHelper66->setRenderingContext($renderingContext);
$viewHelper66->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output7 .= $viewHelper66->initializeArgumentsAndRender();

$output7 .= '

				<div id="messageError" class="alert alert-danger" role="alert"></div>

				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments67 = array();
$arguments67['action'] = 'create';
$arguments67['object'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'User', $renderingContext);
$arguments67['objectName'] = 'newUser';
$arguments67['additionalAttributes'] = NULL;
$arguments67['data'] = NULL;
$arguments67['arguments'] = array (
);
$arguments67['controller'] = NULL;
$arguments67['package'] = NULL;
$arguments67['subpackage'] = NULL;
$arguments67['section'] = '';
$arguments67['format'] = '';
$arguments67['additionalParams'] = array (
);
$arguments67['absolute'] = false;
$arguments67['addQueryString'] = false;
$arguments67['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments67['fieldNamePrefix'] = NULL;
$arguments67['actionUri'] = NULL;
$arguments67['useParentRequest'] = false;
$arguments67['enctype'] = NULL;
$arguments67['method'] = NULL;
$arguments67['name'] = NULL;
$arguments67['onreset'] = NULL;
$arguments67['onsubmit'] = NULL;
$arguments67['class'] = NULL;
$arguments67['dir'] = NULL;
$arguments67['id'] = NULL;
$arguments67['lang'] = NULL;
$arguments67['style'] = NULL;
$arguments67['title'] = NULL;
$arguments67['accesskey'] = NULL;
$arguments67['tabindex'] = NULL;
$arguments67['onclick'] = NULL;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
$output69 = '';

$output69 .= '
			    <table class="table">
			      <tr>
			        <td><label for="name">Name: </label></td>
			        <td>
								<div class="input-group">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments70 = array();
$arguments70['property'] = 'name';
$arguments70['id'] = 'name';
$arguments70['class'] = 'form-control';
$arguments70['additionalAttributes'] = NULL;
$arguments70['data'] = NULL;
$arguments70['required'] = false;
$arguments70['type'] = 'text';
$arguments70['name'] = NULL;
$arguments70['value'] = NULL;
$arguments70['disabled'] = NULL;
$arguments70['maxlength'] = NULL;
$arguments70['readonly'] = NULL;
$arguments70['size'] = NULL;
$arguments70['placeholder'] = NULL;
$arguments70['autofocus'] = NULL;
$arguments70['errorClass'] = 'f3-form-error';
$arguments70['dir'] = NULL;
$arguments70['lang'] = NULL;
$arguments70['style'] = NULL;
$arguments70['title'] = NULL;
$arguments70['accesskey'] = NULL;
$arguments70['tabindex'] = NULL;
$arguments70['onclick'] = NULL;
$renderChildrenClosure71 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper72 = $self->getViewHelper('$viewHelper72', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper72->setArguments($arguments70);
$viewHelper72->setRenderingContext($renderingContext);
$viewHelper72->setRenderChildrenClosure($renderChildrenClosure71);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output69 .= $viewHelper72->initializeArgumentsAndRender();

$output69 .= '
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
			      		</div>
							</td>
						</tr>
			      <tr>
			        <td><label for="password">Password: </label></td>
							<td>
								<div class="input-group">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments73 = array();
$arguments73['property'] = 'password';
$arguments73['id'] = 'password';
$arguments73['type'] = 'password';
$arguments73['class'] = 'form-control';
$arguments73['additionalAttributes'] = NULL;
$arguments73['data'] = NULL;
$arguments73['required'] = false;
$arguments73['name'] = NULL;
$arguments73['value'] = NULL;
$arguments73['disabled'] = NULL;
$arguments73['maxlength'] = NULL;
$arguments73['readonly'] = NULL;
$arguments73['size'] = NULL;
$arguments73['placeholder'] = NULL;
$arguments73['autofocus'] = NULL;
$arguments73['errorClass'] = 'f3-form-error';
$arguments73['dir'] = NULL;
$arguments73['lang'] = NULL;
$arguments73['style'] = NULL;
$arguments73['title'] = NULL;
$arguments73['accesskey'] = NULL;
$arguments73['tabindex'] = NULL;
$arguments73['onclick'] = NULL;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper75 = $self->getViewHelper('$viewHelper75', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper75->setArguments($arguments73);
$viewHelper75->setRenderingContext($renderingContext);
$viewHelper75->setRenderChildrenClosure($renderChildrenClosure74);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output69 .= $viewHelper75->initializeArgumentsAndRender();

$output69 .= '
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
			      		</div>
							</td>
			      </tr>
						<tr>
			        <td><label for="confirmPassword">Confirm Password: </label></td>
							<td>
								<div class="input-group">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments76 = array();
$arguments76['property'] = 'confirmpassword';
$arguments76['id'] = 'confirmPassword';
$arguments76['type'] = 'password';
$arguments76['class'] = 'form-control';
$arguments76['additionalAttributes'] = NULL;
$arguments76['data'] = NULL;
$arguments76['required'] = false;
$arguments76['name'] = NULL;
$arguments76['value'] = NULL;
$arguments76['disabled'] = NULL;
$arguments76['maxlength'] = NULL;
$arguments76['readonly'] = NULL;
$arguments76['size'] = NULL;
$arguments76['placeholder'] = NULL;
$arguments76['autofocus'] = NULL;
$arguments76['errorClass'] = 'f3-form-error';
$arguments76['dir'] = NULL;
$arguments76['lang'] = NULL;
$arguments76['style'] = NULL;
$arguments76['title'] = NULL;
$arguments76['accesskey'] = NULL;
$arguments76['tabindex'] = NULL;
$arguments76['onclick'] = NULL;
$renderChildrenClosure77 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper78 = $self->getViewHelper('$viewHelper78', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper78->setArguments($arguments76);
$viewHelper78->setRenderingContext($renderingContext);
$viewHelper78->setRenderChildrenClosure($renderChildrenClosure77);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output69 .= $viewHelper78->initializeArgumentsAndRender();

$output69 .= '
									<span class="input-group-addon"><i class="fa fa-unlock"></i></span>
			      		</div>
							</td>
			      </tr>
						<tr>
			        <td><label for="email">Email: </label></td>
							<td>
								<div class="input-group">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments79 = array();
$arguments79['property'] = 'email';
$arguments79['id'] = 'email';
$arguments79['class'] = 'form-control';
$arguments79['additionalAttributes'] = NULL;
$arguments79['data'] = NULL;
$arguments79['required'] = false;
$arguments79['type'] = 'text';
$arguments79['name'] = NULL;
$arguments79['value'] = NULL;
$arguments79['disabled'] = NULL;
$arguments79['maxlength'] = NULL;
$arguments79['readonly'] = NULL;
$arguments79['size'] = NULL;
$arguments79['placeholder'] = NULL;
$arguments79['autofocus'] = NULL;
$arguments79['errorClass'] = 'f3-form-error';
$arguments79['dir'] = NULL;
$arguments79['lang'] = NULL;
$arguments79['style'] = NULL;
$arguments79['title'] = NULL;
$arguments79['accesskey'] = NULL;
$arguments79['tabindex'] = NULL;
$arguments79['onclick'] = NULL;
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper81 = $self->getViewHelper('$viewHelper81', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper81->setArguments($arguments79);
$viewHelper81->setRenderingContext($renderingContext);
$viewHelper81->setRenderChildrenClosure($renderChildrenClosure80);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output69 .= $viewHelper81->initializeArgumentsAndRender();

$output69 .= '
									<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
			      		</div>
							</td>
			      </tr>
						<tr>
							<td>
								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments82 = array();
$arguments82['value'] = 'Register';
$arguments82['class'] = 'btn btn-primary';
$arguments82['id'] = 'registerButton';
$arguments82['additionalAttributes'] = NULL;
$arguments82['data'] = NULL;
$arguments82['name'] = NULL;
$arguments82['property'] = NULL;
$arguments82['disabled'] = NULL;
$arguments82['dir'] = NULL;
$arguments82['lang'] = NULL;
$arguments82['style'] = NULL;
$arguments82['title'] = NULL;
$arguments82['accesskey'] = NULL;
$arguments82['tabindex'] = NULL;
$arguments82['onclick'] = NULL;
$renderChildrenClosure83 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper84 = $self->getViewHelper('$viewHelper84', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper84->setArguments($arguments82);
$viewHelper84->setRenderingContext($renderingContext);
$viewHelper84->setRenderChildrenClosure($renderChildrenClosure83);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output69 .= $viewHelper84->initializeArgumentsAndRender();

$output69 .= '
							</td>
							<td>
								<p class="text-right">If you have account, Please ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments85 = array();
$arguments85['action'] = 'login';
$arguments85['additionalAttributes'] = NULL;
$arguments85['data'] = NULL;
$arguments85['arguments'] = array (
);
$arguments85['controller'] = NULL;
$arguments85['package'] = NULL;
$arguments85['subpackage'] = NULL;
$arguments85['section'] = '';
$arguments85['format'] = '';
$arguments85['additionalParams'] = array (
);
$arguments85['addQueryString'] = false;
$arguments85['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments85['useParentRequest'] = false;
$arguments85['absolute'] = true;
$arguments85['class'] = NULL;
$arguments85['dir'] = NULL;
$arguments85['id'] = NULL;
$arguments85['lang'] = NULL;
$arguments85['style'] = NULL;
$arguments85['title'] = NULL;
$arguments85['accesskey'] = NULL;
$arguments85['tabindex'] = NULL;
$arguments85['onclick'] = NULL;
$arguments85['name'] = NULL;
$arguments85['rel'] = NULL;
$arguments85['rev'] = NULL;
$arguments85['target'] = NULL;
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
return 'Login';
};
$viewHelper87 = $self->getViewHelper('$viewHelper87', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper87->setArguments($arguments85);
$viewHelper87->setRenderingContext($renderingContext);
$viewHelper87->setRenderChildrenClosure($renderChildrenClosure86);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output69 .= $viewHelper87->initializeArgumentsAndRender();

$output69 .= ' here</p>
							</td>
						</tr>

			    </table>

			  ';
return $output69;
};
$viewHelper88 = $self->getViewHelper('$viewHelper88', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper88->setArguments($arguments67);
$viewHelper88->setRenderingContext($renderingContext);
$viewHelper88->setRenderChildrenClosure($renderChildrenClosure68);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output7 .= $viewHelper88->initializeArgumentsAndRender();

$output7 .= '


			</div>
		</div> <!-- End ROW -->
	</div> <!-- End CONTAINER -->

';

return $output7;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output89 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments90 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments91 = array();
$arguments91['name'] = 'Default';
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper93 = $self->getViewHelper('$viewHelper93', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper93->setArguments($arguments91);
$viewHelper93->setRenderingContext($renderingContext);
$viewHelper93->setRenderChildrenClosure($renderChildrenClosure92);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments90['value'] = $viewHelper93->initializeArgumentsAndRender();
$arguments90['keepQuotes'] = false;
$arguments90['encoding'] = 'UTF-8';
$arguments90['doubleEncode'] = true;
$renderChildrenClosure94 = function() use ($renderingContext, $self) {
return NULL;
};
$value95 = ($arguments90['value'] !== NULL ? $arguments90['value'] : $renderChildrenClosure94());

$output89 .= !is_string($value95) && !(is_object($value95) && method_exists($value95, '__toString')) ? $value95 : htmlspecialchars($value95, ($arguments90['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments90['encoding'], $arguments90['doubleEncode']);

$output89 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments96 = array();
$arguments96['name'] = 'stylesheet';
$renderChildrenClosure97 = function() use ($renderingContext, $self) {
$output98 = '';

$output98 .= '<link rel="stylesheet" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments99 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments100 = array();
$arguments100['path'] = 'CSS/style.css';
$arguments100['package'] = 'SKL.Test';
$arguments100['resource'] = NULL;
$arguments100['localize'] = true;
$renderChildrenClosure101 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper102 = $self->getViewHelper('$viewHelper102', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper102->setArguments($arguments100);
$viewHelper102->setRenderingContext($renderingContext);
$viewHelper102->setRenderChildrenClosure($renderChildrenClosure101);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments99['value'] = $viewHelper102->initializeArgumentsAndRender();
$arguments99['keepQuotes'] = false;
$arguments99['encoding'] = 'UTF-8';
$arguments99['doubleEncode'] = true;
$renderChildrenClosure103 = function() use ($renderingContext, $self) {
return NULL;
};
$value104 = ($arguments99['value'] !== NULL ? $arguments99['value'] : $renderChildrenClosure103());

$output98 .= !is_string($value104) && !(is_object($value104) && method_exists($value104, '__toString')) ? $value104 : htmlspecialchars($value104, ($arguments99['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments99['encoding'], $arguments99['doubleEncode']);

$output98 .= '" />

';
return $output98;
};

$output89 .= '';

$output89 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments105 = array();
$arguments105['name'] = 'Title';
$renderChildrenClosure106 = function() use ($renderingContext, $self) {
return 'Welcome to our online question';
};

$output89 .= '';

$output89 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments107 = array();
$arguments107['name'] = 'Content';
$renderChildrenClosure108 = function() use ($renderingContext, $self) {
$output109 = '';

$output109 .= '
	<!-- ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments110 = array();
// Rendering Boolean node
$arguments110['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'users', $renderingContext));
$arguments110['then'] = NULL;
$arguments110['else'] = NULL;
$renderChildrenClosure111 = function() use ($renderingContext, $self) {
$output112 = '';

$output112 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper
$arguments113 = array();
$renderChildrenClosure114 = function() use ($renderingContext, $self) {
$output115 = '';

$output115 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments116 = array();
$arguments116['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'users', $renderingContext);
$arguments116['as'] = 'user';
$arguments116['key'] = '';
$arguments116['reverse'] = false;
$arguments116['iteration'] = NULL;
$renderChildrenClosure117 = function() use ($renderingContext, $self) {
$output118 = '';

$output118 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments119 = array();
$arguments119['action'] = 'show';
// Rendering Array
$array120 = array();
$array120['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments119['arguments'] = $array120;
$arguments119['additionalAttributes'] = NULL;
$arguments119['data'] = NULL;
$arguments119['controller'] = NULL;
$arguments119['package'] = NULL;
$arguments119['subpackage'] = NULL;
$arguments119['section'] = '';
$arguments119['format'] = '';
$arguments119['additionalParams'] = array (
);
$arguments119['addQueryString'] = false;
$arguments119['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments119['useParentRequest'] = false;
$arguments119['absolute'] = true;
$arguments119['class'] = NULL;
$arguments119['dir'] = NULL;
$arguments119['id'] = NULL;
$arguments119['lang'] = NULL;
$arguments119['style'] = NULL;
$arguments119['title'] = NULL;
$arguments119['accesskey'] = NULL;
$arguments119['tabindex'] = NULL;
$arguments119['onclick'] = NULL;
$arguments119['name'] = NULL;
$arguments119['rel'] = NULL;
$arguments119['rev'] = NULL;
$arguments119['target'] = NULL;
$renderChildrenClosure121 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments122 = array();
$arguments122['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user.name', $renderingContext);
$arguments122['keepQuotes'] = false;
$arguments122['encoding'] = 'UTF-8';
$arguments122['doubleEncode'] = true;
$renderChildrenClosure123 = function() use ($renderingContext, $self) {
return NULL;
};
$value124 = ($arguments122['value'] !== NULL ? $arguments122['value'] : $renderChildrenClosure123());
return !is_string($value124) && !(is_object($value124) && method_exists($value124, '__toString')) ? $value124 : htmlspecialchars($value124, ($arguments122['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments122['encoding'], $arguments122['doubleEncode']);
};
$viewHelper125 = $self->getViewHelper('$viewHelper125', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper125->setArguments($arguments119);
$viewHelper125->setRenderingContext($renderingContext);
$viewHelper125->setRenderChildrenClosure($renderChildrenClosure121);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output118 .= $viewHelper125->initializeArgumentsAndRender();

$output118 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments126 = array();
$arguments126['action'] = 'edit';
// Rendering Array
$array127 = array();
$array127['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments126['arguments'] = $array127;
$arguments126['additionalAttributes'] = NULL;
$arguments126['data'] = NULL;
$arguments126['controller'] = NULL;
$arguments126['package'] = NULL;
$arguments126['subpackage'] = NULL;
$arguments126['section'] = '';
$arguments126['format'] = '';
$arguments126['additionalParams'] = array (
);
$arguments126['addQueryString'] = false;
$arguments126['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments126['useParentRequest'] = false;
$arguments126['absolute'] = true;
$arguments126['class'] = NULL;
$arguments126['dir'] = NULL;
$arguments126['id'] = NULL;
$arguments126['lang'] = NULL;
$arguments126['style'] = NULL;
$arguments126['title'] = NULL;
$arguments126['accesskey'] = NULL;
$arguments126['tabindex'] = NULL;
$arguments126['onclick'] = NULL;
$arguments126['name'] = NULL;
$arguments126['rel'] = NULL;
$arguments126['rev'] = NULL;
$arguments126['target'] = NULL;
$renderChildrenClosure128 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper129 = $self->getViewHelper('$viewHelper129', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper129->setArguments($arguments126);
$viewHelper129->setRenderingContext($renderingContext);
$viewHelper129->setRenderChildrenClosure($renderChildrenClosure128);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output118 .= $viewHelper129->initializeArgumentsAndRender();

$output118 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments130 = array();
$arguments130['action'] = 'delete';
// Rendering Array
$array131 = array();
$array131['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments130['arguments'] = $array131;
$arguments130['additionalAttributes'] = NULL;
$arguments130['data'] = NULL;
$arguments130['controller'] = NULL;
$arguments130['package'] = NULL;
$arguments130['subpackage'] = NULL;
$arguments130['object'] = NULL;
$arguments130['section'] = '';
$arguments130['format'] = '';
$arguments130['additionalParams'] = array (
);
$arguments130['absolute'] = false;
$arguments130['addQueryString'] = false;
$arguments130['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments130['fieldNamePrefix'] = NULL;
$arguments130['actionUri'] = NULL;
$arguments130['objectName'] = NULL;
$arguments130['useParentRequest'] = false;
$arguments130['enctype'] = NULL;
$arguments130['method'] = NULL;
$arguments130['name'] = NULL;
$arguments130['onreset'] = NULL;
$arguments130['onsubmit'] = NULL;
$arguments130['class'] = NULL;
$arguments130['dir'] = NULL;
$arguments130['id'] = NULL;
$arguments130['lang'] = NULL;
$arguments130['style'] = NULL;
$arguments130['title'] = NULL;
$arguments130['accesskey'] = NULL;
$arguments130['tabindex'] = NULL;
$arguments130['onclick'] = NULL;
$renderChildrenClosure132 = function() use ($renderingContext, $self) {
$output133 = '';

$output133 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments134 = array();
$arguments134['value'] = 'Delete';
$arguments134['additionalAttributes'] = NULL;
$arguments134['data'] = NULL;
$arguments134['name'] = NULL;
$arguments134['property'] = NULL;
$arguments134['disabled'] = NULL;
$arguments134['class'] = NULL;
$arguments134['dir'] = NULL;
$arguments134['id'] = NULL;
$arguments134['lang'] = NULL;
$arguments134['style'] = NULL;
$arguments134['title'] = NULL;
$arguments134['accesskey'] = NULL;
$arguments134['tabindex'] = NULL;
$arguments134['onclick'] = NULL;
$renderChildrenClosure135 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper136 = $self->getViewHelper('$viewHelper136', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper136->setArguments($arguments134);
$viewHelper136->setRenderingContext($renderingContext);
$viewHelper136->setRenderChildrenClosure($renderChildrenClosure135);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output133 .= $viewHelper136->initializeArgumentsAndRender();

$output133 .= '
						';
return $output133;
};
$viewHelper137 = $self->getViewHelper('$viewHelper137', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper137->setArguments($arguments130);
$viewHelper137->setRenderingContext($renderingContext);
$viewHelper137->setRenderChildrenClosure($renderChildrenClosure132);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output118 .= $viewHelper137->initializeArgumentsAndRender();

$output118 .= '
					</li>
				';
return $output118;
};

$output115 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments116, $renderChildrenClosure117, $renderingContext);

$output115 .= '
			</ul>
		';
return $output115;
};
$viewHelper138 = $self->getViewHelper('$viewHelper138', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ThenViewHelper');
$viewHelper138->setArguments($arguments113);
$viewHelper138->setRenderingContext($renderingContext);
$viewHelper138->setRenderChildrenClosure($renderChildrenClosure114);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ThenViewHelper

$output112 .= $viewHelper138->initializeArgumentsAndRender();

$output112 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper
$arguments139 = array();
$renderChildrenClosure140 = function() use ($renderingContext, $self) {
return '
			<p>No users created yet.</p>
		';
};
$viewHelper141 = $self->getViewHelper('$viewHelper141', $renderingContext, 'TYPO3\Fluid\ViewHelpers\ElseViewHelper');
$viewHelper141->setArguments($arguments139);
$viewHelper141->setRenderingContext($renderingContext);
$viewHelper141->setRenderChildrenClosure($renderChildrenClosure140);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\ElseViewHelper

$output112 .= $viewHelper141->initializeArgumentsAndRender();

$output112 .= '
	';
return $output112;
};
$arguments110['__thenClosure'] = function() use ($renderingContext, $self) {
$output142 = '';

$output142 .= '
			<ul>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\ForViewHelper
$arguments143 = array();
$arguments143['each'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'users', $renderingContext);
$arguments143['as'] = 'user';
$arguments143['key'] = '';
$arguments143['reverse'] = false;
$arguments143['iteration'] = NULL;
$renderChildrenClosure144 = function() use ($renderingContext, $self) {
$output145 = '';

$output145 .= '
					<li>
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments146 = array();
$arguments146['action'] = 'show';
// Rendering Array
$array147 = array();
$array147['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments146['arguments'] = $array147;
$arguments146['additionalAttributes'] = NULL;
$arguments146['data'] = NULL;
$arguments146['controller'] = NULL;
$arguments146['package'] = NULL;
$arguments146['subpackage'] = NULL;
$arguments146['section'] = '';
$arguments146['format'] = '';
$arguments146['additionalParams'] = array (
);
$arguments146['addQueryString'] = false;
$arguments146['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments146['useParentRequest'] = false;
$arguments146['absolute'] = true;
$arguments146['class'] = NULL;
$arguments146['dir'] = NULL;
$arguments146['id'] = NULL;
$arguments146['lang'] = NULL;
$arguments146['style'] = NULL;
$arguments146['title'] = NULL;
$arguments146['accesskey'] = NULL;
$arguments146['tabindex'] = NULL;
$arguments146['onclick'] = NULL;
$arguments146['name'] = NULL;
$arguments146['rel'] = NULL;
$arguments146['rev'] = NULL;
$arguments146['target'] = NULL;
$renderChildrenClosure148 = function() use ($renderingContext, $self) {
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments149 = array();
$arguments149['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user.name', $renderingContext);
$arguments149['keepQuotes'] = false;
$arguments149['encoding'] = 'UTF-8';
$arguments149['doubleEncode'] = true;
$renderChildrenClosure150 = function() use ($renderingContext, $self) {
return NULL;
};
$value151 = ($arguments149['value'] !== NULL ? $arguments149['value'] : $renderChildrenClosure150());
return !is_string($value151) && !(is_object($value151) && method_exists($value151, '__toString')) ? $value151 : htmlspecialchars($value151, ($arguments149['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments149['encoding'], $arguments149['doubleEncode']);
};
$viewHelper152 = $self->getViewHelper('$viewHelper152', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper152->setArguments($arguments146);
$viewHelper152->setRenderingContext($renderingContext);
$viewHelper152->setRenderChildrenClosure($renderChildrenClosure148);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output145 .= $viewHelper152->initializeArgumentsAndRender();

$output145 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments153 = array();
$arguments153['action'] = 'edit';
// Rendering Array
$array154 = array();
$array154['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments153['arguments'] = $array154;
$arguments153['additionalAttributes'] = NULL;
$arguments153['data'] = NULL;
$arguments153['controller'] = NULL;
$arguments153['package'] = NULL;
$arguments153['subpackage'] = NULL;
$arguments153['section'] = '';
$arguments153['format'] = '';
$arguments153['additionalParams'] = array (
);
$arguments153['addQueryString'] = false;
$arguments153['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments153['useParentRequest'] = false;
$arguments153['absolute'] = true;
$arguments153['class'] = NULL;
$arguments153['dir'] = NULL;
$arguments153['id'] = NULL;
$arguments153['lang'] = NULL;
$arguments153['style'] = NULL;
$arguments153['title'] = NULL;
$arguments153['accesskey'] = NULL;
$arguments153['tabindex'] = NULL;
$arguments153['onclick'] = NULL;
$arguments153['name'] = NULL;
$arguments153['rel'] = NULL;
$arguments153['rev'] = NULL;
$arguments153['target'] = NULL;
$renderChildrenClosure155 = function() use ($renderingContext, $self) {
return 'Edit';
};
$viewHelper156 = $self->getViewHelper('$viewHelper156', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper156->setArguments($arguments153);
$viewHelper156->setRenderingContext($renderingContext);
$viewHelper156->setRenderChildrenClosure($renderChildrenClosure155);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output145 .= $viewHelper156->initializeArgumentsAndRender();

$output145 .= '
						';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments157 = array();
$arguments157['action'] = 'delete';
// Rendering Array
$array158 = array();
$array158['user'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'user', $renderingContext);
$arguments157['arguments'] = $array158;
$arguments157['additionalAttributes'] = NULL;
$arguments157['data'] = NULL;
$arguments157['controller'] = NULL;
$arguments157['package'] = NULL;
$arguments157['subpackage'] = NULL;
$arguments157['object'] = NULL;
$arguments157['section'] = '';
$arguments157['format'] = '';
$arguments157['additionalParams'] = array (
);
$arguments157['absolute'] = false;
$arguments157['addQueryString'] = false;
$arguments157['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments157['fieldNamePrefix'] = NULL;
$arguments157['actionUri'] = NULL;
$arguments157['objectName'] = NULL;
$arguments157['useParentRequest'] = false;
$arguments157['enctype'] = NULL;
$arguments157['method'] = NULL;
$arguments157['name'] = NULL;
$arguments157['onreset'] = NULL;
$arguments157['onsubmit'] = NULL;
$arguments157['class'] = NULL;
$arguments157['dir'] = NULL;
$arguments157['id'] = NULL;
$arguments157['lang'] = NULL;
$arguments157['style'] = NULL;
$arguments157['title'] = NULL;
$arguments157['accesskey'] = NULL;
$arguments157['tabindex'] = NULL;
$arguments157['onclick'] = NULL;
$renderChildrenClosure159 = function() use ($renderingContext, $self) {
$output160 = '';

$output160 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments161 = array();
$arguments161['value'] = 'Delete';
$arguments161['additionalAttributes'] = NULL;
$arguments161['data'] = NULL;
$arguments161['name'] = NULL;
$arguments161['property'] = NULL;
$arguments161['disabled'] = NULL;
$arguments161['class'] = NULL;
$arguments161['dir'] = NULL;
$arguments161['id'] = NULL;
$arguments161['lang'] = NULL;
$arguments161['style'] = NULL;
$arguments161['title'] = NULL;
$arguments161['accesskey'] = NULL;
$arguments161['tabindex'] = NULL;
$arguments161['onclick'] = NULL;
$renderChildrenClosure162 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper163 = $self->getViewHelper('$viewHelper163', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper163->setArguments($arguments161);
$viewHelper163->setRenderingContext($renderingContext);
$viewHelper163->setRenderChildrenClosure($renderChildrenClosure162);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output160 .= $viewHelper163->initializeArgumentsAndRender();

$output160 .= '
						';
return $output160;
};
$viewHelper164 = $self->getViewHelper('$viewHelper164', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper164->setArguments($arguments157);
$viewHelper164->setRenderingContext($renderingContext);
$viewHelper164->setRenderChildrenClosure($renderChildrenClosure159);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output145 .= $viewHelper164->initializeArgumentsAndRender();

$output145 .= '
					</li>
				';
return $output145;
};

$output142 .= TYPO3\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments143, $renderChildrenClosure144, $renderingContext);

$output142 .= '
			</ul>
		';
return $output142;
};
$arguments110['__elseClosure'] = function() use ($renderingContext, $self) {
return '
			<p>No users created yet.</p>
		';
};
$viewHelper165 = $self->getViewHelper('$viewHelper165', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper165->setArguments($arguments110);
$viewHelper165->setRenderingContext($renderingContext);
$viewHelper165->setRenderChildrenClosure($renderChildrenClosure111);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output109 .= $viewHelper165->initializeArgumentsAndRender();

$output109 .= ' -->

	<div class="container" id="loginForm">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">

				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper
$arguments166 = array();
$arguments166['class'] = 'flashmessages';
$arguments166['id'] = 'flash';
$arguments166['style'] = 'list-style-type:none;color:red;';
$arguments166['additionalAttributes'] = NULL;
$arguments166['data'] = NULL;
$arguments166['as'] = NULL;
$arguments166['severity'] = NULL;
$arguments166['dir'] = NULL;
$arguments166['lang'] = NULL;
$arguments166['title'] = NULL;
$arguments166['accesskey'] = NULL;
$arguments166['tabindex'] = NULL;
$arguments166['onclick'] = NULL;
$renderChildrenClosure167 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper168 = $self->getViewHelper('$viewHelper168', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper');
$viewHelper168->setArguments($arguments166);
$viewHelper168->setRenderingContext($renderingContext);
$viewHelper168->setRenderChildrenClosure($renderChildrenClosure167);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FlashMessagesViewHelper

$output109 .= $viewHelper168->initializeArgumentsAndRender();

$output109 .= '

				<div id="messageError" class="alert alert-danger" role="alert"></div>

				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments169 = array();
$arguments169['action'] = 'create';
$arguments169['object'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'User', $renderingContext);
$arguments169['objectName'] = 'newUser';
$arguments169['additionalAttributes'] = NULL;
$arguments169['data'] = NULL;
$arguments169['arguments'] = array (
);
$arguments169['controller'] = NULL;
$arguments169['package'] = NULL;
$arguments169['subpackage'] = NULL;
$arguments169['section'] = '';
$arguments169['format'] = '';
$arguments169['additionalParams'] = array (
);
$arguments169['absolute'] = false;
$arguments169['addQueryString'] = false;
$arguments169['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments169['fieldNamePrefix'] = NULL;
$arguments169['actionUri'] = NULL;
$arguments169['useParentRequest'] = false;
$arguments169['enctype'] = NULL;
$arguments169['method'] = NULL;
$arguments169['name'] = NULL;
$arguments169['onreset'] = NULL;
$arguments169['onsubmit'] = NULL;
$arguments169['class'] = NULL;
$arguments169['dir'] = NULL;
$arguments169['id'] = NULL;
$arguments169['lang'] = NULL;
$arguments169['style'] = NULL;
$arguments169['title'] = NULL;
$arguments169['accesskey'] = NULL;
$arguments169['tabindex'] = NULL;
$arguments169['onclick'] = NULL;
$renderChildrenClosure170 = function() use ($renderingContext, $self) {
$output171 = '';

$output171 .= '
			    <table class="table">
			      <tr>
			        <td><label for="name">Name: </label></td>
			        <td>
								<div class="input-group">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments172 = array();
$arguments172['property'] = 'name';
$arguments172['id'] = 'name';
$arguments172['class'] = 'form-control';
$arguments172['additionalAttributes'] = NULL;
$arguments172['data'] = NULL;
$arguments172['required'] = false;
$arguments172['type'] = 'text';
$arguments172['name'] = NULL;
$arguments172['value'] = NULL;
$arguments172['disabled'] = NULL;
$arguments172['maxlength'] = NULL;
$arguments172['readonly'] = NULL;
$arguments172['size'] = NULL;
$arguments172['placeholder'] = NULL;
$arguments172['autofocus'] = NULL;
$arguments172['errorClass'] = 'f3-form-error';
$arguments172['dir'] = NULL;
$arguments172['lang'] = NULL;
$arguments172['style'] = NULL;
$arguments172['title'] = NULL;
$arguments172['accesskey'] = NULL;
$arguments172['tabindex'] = NULL;
$arguments172['onclick'] = NULL;
$renderChildrenClosure173 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper174 = $self->getViewHelper('$viewHelper174', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper174->setArguments($arguments172);
$viewHelper174->setRenderingContext($renderingContext);
$viewHelper174->setRenderChildrenClosure($renderChildrenClosure173);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output171 .= $viewHelper174->initializeArgumentsAndRender();

$output171 .= '
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
			      		</div>
							</td>
						</tr>
			      <tr>
			        <td><label for="password">Password: </label></td>
							<td>
								<div class="input-group">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments175 = array();
$arguments175['property'] = 'password';
$arguments175['id'] = 'password';
$arguments175['type'] = 'password';
$arguments175['class'] = 'form-control';
$arguments175['additionalAttributes'] = NULL;
$arguments175['data'] = NULL;
$arguments175['required'] = false;
$arguments175['name'] = NULL;
$arguments175['value'] = NULL;
$arguments175['disabled'] = NULL;
$arguments175['maxlength'] = NULL;
$arguments175['readonly'] = NULL;
$arguments175['size'] = NULL;
$arguments175['placeholder'] = NULL;
$arguments175['autofocus'] = NULL;
$arguments175['errorClass'] = 'f3-form-error';
$arguments175['dir'] = NULL;
$arguments175['lang'] = NULL;
$arguments175['style'] = NULL;
$arguments175['title'] = NULL;
$arguments175['accesskey'] = NULL;
$arguments175['tabindex'] = NULL;
$arguments175['onclick'] = NULL;
$renderChildrenClosure176 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper177 = $self->getViewHelper('$viewHelper177', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper177->setArguments($arguments175);
$viewHelper177->setRenderingContext($renderingContext);
$viewHelper177->setRenderChildrenClosure($renderChildrenClosure176);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output171 .= $viewHelper177->initializeArgumentsAndRender();

$output171 .= '
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
			      		</div>
							</td>
			      </tr>
						<tr>
			        <td><label for="confirmPassword">Confirm Password: </label></td>
							<td>
								<div class="input-group">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments178 = array();
$arguments178['property'] = 'confirmpassword';
$arguments178['id'] = 'confirmPassword';
$arguments178['type'] = 'password';
$arguments178['class'] = 'form-control';
$arguments178['additionalAttributes'] = NULL;
$arguments178['data'] = NULL;
$arguments178['required'] = false;
$arguments178['name'] = NULL;
$arguments178['value'] = NULL;
$arguments178['disabled'] = NULL;
$arguments178['maxlength'] = NULL;
$arguments178['readonly'] = NULL;
$arguments178['size'] = NULL;
$arguments178['placeholder'] = NULL;
$arguments178['autofocus'] = NULL;
$arguments178['errorClass'] = 'f3-form-error';
$arguments178['dir'] = NULL;
$arguments178['lang'] = NULL;
$arguments178['style'] = NULL;
$arguments178['title'] = NULL;
$arguments178['accesskey'] = NULL;
$arguments178['tabindex'] = NULL;
$arguments178['onclick'] = NULL;
$renderChildrenClosure179 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper180 = $self->getViewHelper('$viewHelper180', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper180->setArguments($arguments178);
$viewHelper180->setRenderingContext($renderingContext);
$viewHelper180->setRenderChildrenClosure($renderChildrenClosure179);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output171 .= $viewHelper180->initializeArgumentsAndRender();

$output171 .= '
									<span class="input-group-addon"><i class="fa fa-unlock"></i></span>
			      		</div>
							</td>
			      </tr>
						<tr>
			        <td><label for="email">Email: </label></td>
							<td>
								<div class="input-group">
									';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments181 = array();
$arguments181['property'] = 'email';
$arguments181['id'] = 'email';
$arguments181['class'] = 'form-control';
$arguments181['additionalAttributes'] = NULL;
$arguments181['data'] = NULL;
$arguments181['required'] = false;
$arguments181['type'] = 'text';
$arguments181['name'] = NULL;
$arguments181['value'] = NULL;
$arguments181['disabled'] = NULL;
$arguments181['maxlength'] = NULL;
$arguments181['readonly'] = NULL;
$arguments181['size'] = NULL;
$arguments181['placeholder'] = NULL;
$arguments181['autofocus'] = NULL;
$arguments181['errorClass'] = 'f3-form-error';
$arguments181['dir'] = NULL;
$arguments181['lang'] = NULL;
$arguments181['style'] = NULL;
$arguments181['title'] = NULL;
$arguments181['accesskey'] = NULL;
$arguments181['tabindex'] = NULL;
$arguments181['onclick'] = NULL;
$renderChildrenClosure182 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper183 = $self->getViewHelper('$viewHelper183', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper183->setArguments($arguments181);
$viewHelper183->setRenderingContext($renderingContext);
$viewHelper183->setRenderChildrenClosure($renderChildrenClosure182);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output171 .= $viewHelper183->initializeArgumentsAndRender();

$output171 .= '
									<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
			      		</div>
							</td>
			      </tr>
						<tr>
							<td>
								';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments184 = array();
$arguments184['value'] = 'Register';
$arguments184['class'] = 'btn btn-primary';
$arguments184['id'] = 'registerButton';
$arguments184['additionalAttributes'] = NULL;
$arguments184['data'] = NULL;
$arguments184['name'] = NULL;
$arguments184['property'] = NULL;
$arguments184['disabled'] = NULL;
$arguments184['dir'] = NULL;
$arguments184['lang'] = NULL;
$arguments184['style'] = NULL;
$arguments184['title'] = NULL;
$arguments184['accesskey'] = NULL;
$arguments184['tabindex'] = NULL;
$arguments184['onclick'] = NULL;
$renderChildrenClosure185 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper186 = $self->getViewHelper('$viewHelper186', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper186->setArguments($arguments184);
$viewHelper186->setRenderingContext($renderingContext);
$viewHelper186->setRenderChildrenClosure($renderChildrenClosure185);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output171 .= $viewHelper186->initializeArgumentsAndRender();

$output171 .= '
							</td>
							<td>
								<p class="text-right">If you have account, Please ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments187 = array();
$arguments187['action'] = 'login';
$arguments187['additionalAttributes'] = NULL;
$arguments187['data'] = NULL;
$arguments187['arguments'] = array (
);
$arguments187['controller'] = NULL;
$arguments187['package'] = NULL;
$arguments187['subpackage'] = NULL;
$arguments187['section'] = '';
$arguments187['format'] = '';
$arguments187['additionalParams'] = array (
);
$arguments187['addQueryString'] = false;
$arguments187['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments187['useParentRequest'] = false;
$arguments187['absolute'] = true;
$arguments187['class'] = NULL;
$arguments187['dir'] = NULL;
$arguments187['id'] = NULL;
$arguments187['lang'] = NULL;
$arguments187['style'] = NULL;
$arguments187['title'] = NULL;
$arguments187['accesskey'] = NULL;
$arguments187['tabindex'] = NULL;
$arguments187['onclick'] = NULL;
$arguments187['name'] = NULL;
$arguments187['rel'] = NULL;
$arguments187['rev'] = NULL;
$arguments187['target'] = NULL;
$renderChildrenClosure188 = function() use ($renderingContext, $self) {
return 'Login';
};
$viewHelper189 = $self->getViewHelper('$viewHelper189', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper189->setArguments($arguments187);
$viewHelper189->setRenderingContext($renderingContext);
$viewHelper189->setRenderChildrenClosure($renderChildrenClosure188);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output171 .= $viewHelper189->initializeArgumentsAndRender();

$output171 .= ' here</p>
							</td>
						</tr>

			    </table>

			  ';
return $output171;
};
$viewHelper190 = $self->getViewHelper('$viewHelper190', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper190->setArguments($arguments169);
$viewHelper190->setRenderingContext($renderingContext);
$viewHelper190->setRenderChildrenClosure($renderChildrenClosure170);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output109 .= $viewHelper190->initializeArgumentsAndRender();

$output109 .= '


			</div>
		</div> <!-- End ROW -->
	</div> <!-- End CONTAINER -->

';
return $output109;
};

$output89 .= '';

$output89 .= '
';

return $output89;
}


}
#0             69879     