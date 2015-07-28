<?php class FluidCache_Standalone_template_file_Default_2729042c7444511b577210140f79089107d48423 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
		<title>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments1 = array();
$arguments1['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statusCode', $renderingContext);
$arguments1['keepQuotes'] = false;
$arguments1['encoding'] = 'UTF-8';
$arguments1['doubleEncode'] = true;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
return NULL;
};
$value3 = ($arguments1['value'] !== NULL ? $arguments1['value'] : $renderChildrenClosure2());

$output0 .= !is_string($value3) && !(is_object($value3) && method_exists($value3, '__toString')) ? $value3 : htmlspecialchars($value3, ($arguments1['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments1['encoding'], $arguments1['doubleEncode']);

$output0 .= ' - ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments4 = array();
$arguments4['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statusMessage', $renderingContext);
$arguments4['keepQuotes'] = false;
$arguments4['encoding'] = 'UTF-8';
$arguments4['doubleEncode'] = true;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$value6 = ($arguments4['value'] !== NULL ? $arguments4['value'] : $renderChildrenClosure5());

$output0 .= !is_string($value6) && !(is_object($value6) && method_exists($value6, '__toString')) ? $value6 : htmlspecialchars($value6, ($arguments4['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments4['encoding'], $arguments4['doubleEncode']);

$output0 .= '</title>
		<style type="text/css">
			body {
				font-family: Helvetica, Arial, sans-serif;
				margin: 0;
			}

			h1 {
				font-size: 15px;
			}

			.ApplicationWindow {
				position: absolute;
				width: 100%;
				height: 100%;
				background-color: #515151;
				margin: 0;
				z-index:1000;
			}

			.FloatingWindow {
				width: 500px;
				height: 360px;
				background: transparent url("data:image/gif;base64,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");
			}

			.FloatingWindow .Window_TitleBar {
				font-size: 13px;
				position: relative;
				padding: 25px 0 0 26px;
				width: 440px;
				text-align: center;
				color: #404040;
			}

			.FloatingWindow .Window_Body {
				font-size: 14px;
				position: relative;
				padding: 30px 0 0 50px;
				width: 400px;
				text-align: left;
				color: #202020;
				line-height: 18px;
			}

		</style>
	</head>
	<body>
		<div class="ApplicationWindow">
			<div class="FloatingWindow">
				<div class="Window_TitleBar">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments7 = array();
$arguments7['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statusCode', $renderingContext);
$arguments7['keepQuotes'] = false;
$arguments7['encoding'] = 'UTF-8';
$arguments7['doubleEncode'] = true;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$value9 = ($arguments7['value'] !== NULL ? $arguments7['value'] : $renderChildrenClosure8());

$output0 .= !is_string($value9) && !(is_object($value9) && method_exists($value9, '__toString')) ? $value9 : htmlspecialchars($value9, ($arguments7['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments7['encoding'], $arguments7['doubleEncode']);

$output0 .= ' - ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments10 = array();
$arguments10['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'statusMessage', $renderingContext);
$arguments10['keepQuotes'] = false;
$arguments10['encoding'] = 'UTF-8';
$arguments10['doubleEncode'] = true;
$renderChildrenClosure11 = function() use ($renderingContext, $self) {
return NULL;
};
$value12 = ($arguments10['value'] !== NULL ? $arguments10['value'] : $renderChildrenClosure11());

$output0 .= !is_string($value12) && !(is_object($value12) && method_exists($value12, '__toString')) ? $value12 : htmlspecialchars($value12, ($arguments10['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments10['encoding'], $arguments10['doubleEncode']);

$output0 .= '</div>
				<div class="Window_Body">
					<p><strong>';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments13 = array();
$arguments13['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'errorDescription', $renderingContext);
$arguments13['keepQuotes'] = false;
$arguments13['encoding'] = 'UTF-8';
$arguments13['doubleEncode'] = true;
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$value15 = ($arguments13['value'] !== NULL ? $arguments13['value'] : $renderChildrenClosure14());

$output0 .= !is_string($value15) && !(is_object($value15) && method_exists($value15, '__toString')) ? $value15 : htmlspecialchars($value15, ($arguments13['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments13['encoding'], $arguments13['doubleEncode']);

$output0 .= '</strong></p>
					';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments16 = array();
// Rendering Boolean node
$arguments16['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'renderingOptions.renderTechnicalDetails', $renderingContext));
$arguments16['then'] = NULL;
$arguments16['else'] = NULL;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
$output18 = '';

$output18 .= '
						<h2>Technical details:</h2>
						<p>
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments19 = array();
$arguments19['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'exception.message', $renderingContext);
$arguments19['keepQuotes'] = false;
$arguments19['encoding'] = 'UTF-8';
$arguments19['doubleEncode'] = true;
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};
$value21 = ($arguments19['value'] !== NULL ? $arguments19['value'] : $renderChildrenClosure20());

$output18 .= !is_string($value21) && !(is_object($value21) && method_exists($value21, '__toString')) ? $value21 : htmlspecialchars($value21, ($arguments19['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments19['encoding'], $arguments19['doubleEncode']);

$output18 .= '
							';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper
$arguments22 = array();
// Rendering Boolean node
$arguments22['condition'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'exception.referenceCode', $renderingContext));
$arguments22['then'] = NULL;
$arguments22['else'] = NULL;
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
$output24 = '';

$output24 .= '
								(reference code: ';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments25 = array();
$arguments25['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'exception.referenceCode', $renderingContext);
$arguments25['keepQuotes'] = false;
$arguments25['encoding'] = 'UTF-8';
$arguments25['doubleEncode'] = true;
$renderChildrenClosure26 = function() use ($renderingContext, $self) {
return NULL;
};
$value27 = ($arguments25['value'] !== NULL ? $arguments25['value'] : $renderChildrenClosure26());

$output24 .= !is_string($value27) && !(is_object($value27) && method_exists($value27, '__toString')) ? $value27 : htmlspecialchars($value27, ($arguments25['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments25['encoding'], $arguments25['doubleEncode']);

$output24 .= ')
							';
return $output24;
};
$viewHelper28 = $self->getViewHelper('$viewHelper28', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper28->setArguments($arguments22);
$viewHelper28->setRenderingContext($renderingContext);
$viewHelper28->setRenderChildrenClosure($renderChildrenClosure23);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output18 .= $viewHelper28->initializeArgumentsAndRender();

$output18 .= '
						</p>
					';
return $output18;
};
$viewHelper29 = $self->getViewHelper('$viewHelper29', $renderingContext, 'TYPO3\Fluid\ViewHelpers\IfViewHelper');
$viewHelper29->setArguments($arguments16);
$viewHelper29->setRenderingContext($renderingContext);
$viewHelper29->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\IfViewHelper

$output0 .= $viewHelper29->initializeArgumentsAndRender();

$output0 .= '
				</div>
			</div>
		</div>
	</body>
</html>';

return $output0;
}


}
#0             18504     