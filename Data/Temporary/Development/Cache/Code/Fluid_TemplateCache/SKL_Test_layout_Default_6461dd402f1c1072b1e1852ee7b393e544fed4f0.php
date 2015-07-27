<?php class FluidCache_SKL_Test_layout_Default_6461dd402f1c1072b1e1852ee7b393e544fed4f0 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return NULL;
}
public function hasLayout() {
return FALSE;
}

/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output0 = '';

$output0 .= '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments1 = array();
$arguments1['section'] = 'Title';
$arguments1['partial'] = NULL;
$arguments1['arguments'] = array (
);
$arguments1['optional'] = false;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper3 = $self->getViewHelper('$viewHelper3', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper3->setArguments($arguments1);
$viewHelper3->setRenderingContext($renderingContext);
$viewHelper3->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output0 .= $viewHelper3->initializeArgumentsAndRender();

$output0 .= '</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments4 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments5 = array();
$arguments5['path'] = 'CSS/bootstrap.min.css';
$arguments5['package'] = 'SKL.Test';
$arguments5['resource'] = NULL;
$arguments5['localize'] = true;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper7 = $self->getViewHelper('$viewHelper7', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper7->setArguments($arguments5);
$viewHelper7->setRenderingContext($renderingContext);
$viewHelper7->setRenderChildrenClosure($renderChildrenClosure6);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments4['value'] = $viewHelper7->initializeArgumentsAndRender();
$arguments4['keepQuotes'] = false;
$arguments4['encoding'] = 'UTF-8';
$arguments4['doubleEncode'] = true;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$value9 = ($arguments4['value'] !== NULL ? $arguments4['value'] : $renderChildrenClosure8());

$output0 .= !is_string($value9) && !(is_object($value9) && method_exists($value9, '__toString')) ? $value9 : htmlspecialchars($value9, ($arguments4['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments4['encoding'], $arguments4['doubleEncode']);

$output0 .= '" >
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments10 = array();
$arguments10['section'] = 'stylesheet';
$arguments10['partial'] = NULL;
$arguments10['arguments'] = array (
);
$arguments10['optional'] = false;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper12->setArguments($arguments10);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output0 .= $viewHelper12->initializeArgumentsAndRender();

$output0 .= '
		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\BaseViewHelper
$arguments13 = array();
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'TYPO3\Fluid\ViewHelpers\BaseViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\BaseViewHelper

$output0 .= $viewHelper15->initializeArgumentsAndRender();

$output0 .= '
	</head>
	<body>

		<h1 class="text-center">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments16 = array();
$arguments16['section'] = 'Title';
$arguments16['partial'] = NULL;
$arguments16['arguments'] = array (
);
$arguments16['optional'] = false;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper18 = $self->getViewHelper('$viewHelper18', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper18->setArguments($arguments16);
$viewHelper18->setRenderingContext($renderingContext);
$viewHelper18->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output0 .= $viewHelper18->initializeArgumentsAndRender();

$output0 .= '</h1>

		';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper
$arguments19 = array();
$arguments19['section'] = 'Content';
$arguments19['partial'] = NULL;
$arguments19['arguments'] = array (
);
$arguments19['optional'] = false;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper21 = $self->getViewHelper('$viewHelper21', $renderingContext, 'TYPO3\Fluid\ViewHelpers\RenderViewHelper');
$viewHelper21->setArguments($arguments19);
$viewHelper21->setRenderingContext($renderingContext);
$viewHelper21->setRenderChildrenClosure($renderChildrenClosure20);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\RenderViewHelper

$output0 .= $viewHelper21->initializeArgumentsAndRender();

$output0 .= '


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments22 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments23 = array();
$arguments23['path'] = 'Js/bootstrap.min.js';
$arguments23['package'] = 'SKL.Test';
$arguments23['resource'] = NULL;
$arguments23['localize'] = true;
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper25 = $self->getViewHelper('$viewHelper25', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper25->setArguments($arguments23);
$viewHelper25->setRenderingContext($renderingContext);
$viewHelper25->setRenderChildrenClosure($renderChildrenClosure24);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments22['value'] = $viewHelper25->initializeArgumentsAndRender();
$arguments22['keepQuotes'] = false;
$arguments22['encoding'] = 'UTF-8';
$arguments22['doubleEncode'] = true;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return NULL;
};
$value27 = ($arguments22['value'] !== NULL ? $arguments22['value'] : $renderChildrenClosure26());

$output0 .= !is_string($value27) && !(is_object($value27) && method_exists($value27, '__toString')) ? $value27 : htmlspecialchars($value27, ($arguments22['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments22['encoding'], $arguments22['doubleEncode']);

$output0 .= '"></script>
		<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments28 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments29 = array();
$arguments29['path'] = 'Js/login.js';
$arguments29['package'] = 'SKL.Test';
$arguments29['resource'] = NULL;
$arguments29['localize'] = true;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper31 = $self->getViewHelper('$viewHelper31', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper31->setArguments($arguments29);
$viewHelper31->setRenderingContext($renderingContext);
$viewHelper31->setRenderChildrenClosure($renderChildrenClosure30);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments28['value'] = $viewHelper31->initializeArgumentsAndRender();
$arguments28['keepQuotes'] = false;
$arguments28['encoding'] = 'UTF-8';
$arguments28['doubleEncode'] = true;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$value33 = ($arguments28['value'] !== NULL ? $arguments28['value'] : $renderChildrenClosure32());

$output0 .= !is_string($value33) && !(is_object($value33) && method_exists($value33, '__toString')) ? $value33 : htmlspecialchars($value33, ($arguments28['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments28['encoding'], $arguments28['doubleEncode']);

$output0 .= '"></script>
		<script src="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments34 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments35 = array();
$arguments35['path'] = 'Js/functions.js';
$arguments35['package'] = 'SKL.Test';
$arguments35['resource'] = NULL;
$arguments35['localize'] = true;
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper37 = $self->getViewHelper('$viewHelper37', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper37->setArguments($arguments35);
$viewHelper37->setRenderingContext($renderingContext);
$viewHelper37->setRenderChildrenClosure($renderChildrenClosure36);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments34['value'] = $viewHelper37->initializeArgumentsAndRender();
$arguments34['keepQuotes'] = false;
$arguments34['encoding'] = 'UTF-8';
$arguments34['doubleEncode'] = true;
$renderChildrenClosure38 = function() use ($renderingContext, $self) {
return NULL;
};
$value39 = ($arguments34['value'] !== NULL ? $arguments34['value'] : $renderChildrenClosure38());

$output0 .= !is_string($value39) && !(is_object($value39) && method_exists($value39, '__toString')) ? $value39 : htmlspecialchars($value39, ($arguments34['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments34['encoding'], $arguments34['doubleEncode']);

$output0 .= '"></script>
	</body>
</html>
';

return $output0;
}


}
#0             10348     