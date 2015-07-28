<?php class FluidCache_SKL_Test_Form_action_new_26c43268775fa75208e86171fcb5b3d42e23a164 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

return 'New form';
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
	<p>Just fill out the following form to create a new form:</p>

	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments1 = array();
$arguments1['action'] = 'create';
$arguments1['objectName'] = 'newForm';
$arguments1['additionalAttributes'] = NULL;
$arguments1['data'] = NULL;
$arguments1['arguments'] = array (
);
$arguments1['controller'] = NULL;
$arguments1['package'] = NULL;
$arguments1['subpackage'] = NULL;
$arguments1['object'] = NULL;
$arguments1['section'] = '';
$arguments1['format'] = '';
$arguments1['additionalParams'] = array (
);
$arguments1['absolute'] = false;
$arguments1['addQueryString'] = false;
$arguments1['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments1['fieldNamePrefix'] = NULL;
$arguments1['actionUri'] = NULL;
$arguments1['useParentRequest'] = false;
$arguments1['enctype'] = NULL;
$arguments1['method'] = NULL;
$arguments1['name'] = NULL;
$arguments1['onreset'] = NULL;
$arguments1['onsubmit'] = NULL;
$arguments1['class'] = NULL;
$arguments1['dir'] = NULL;
$arguments1['id'] = NULL;
$arguments1['lang'] = NULL;
$arguments1['style'] = NULL;
$arguments1['title'] = NULL;
$arguments1['accesskey'] = NULL;
$arguments1['tabindex'] = NULL;
$arguments1['onclick'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$output3 = '';

$output3 .= '
		<ol>
			<li>
				<label for="name">Name</label>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments4 = array();
$arguments4['property'] = 'name';
$arguments4['id'] = 'name';
$arguments4['additionalAttributes'] = NULL;
$arguments4['data'] = NULL;
$arguments4['required'] = false;
$arguments4['type'] = 'text';
$arguments4['name'] = NULL;
$arguments4['value'] = NULL;
$arguments4['disabled'] = NULL;
$arguments4['maxlength'] = NULL;
$arguments4['readonly'] = NULL;
$arguments4['size'] = NULL;
$arguments4['placeholder'] = NULL;
$arguments4['autofocus'] = NULL;
$arguments4['errorClass'] = 'f3-form-error';
$arguments4['class'] = NULL;
$arguments4['dir'] = NULL;
$arguments4['lang'] = NULL;
$arguments4['style'] = NULL;
$arguments4['title'] = NULL;
$arguments4['accesskey'] = NULL;
$arguments4['tabindex'] = NULL;
$arguments4['onclick'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper6 = $self->getViewHelper('$viewHelper6', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper6->setArguments($arguments4);
$viewHelper6->setRenderingContext($renderingContext);
$viewHelper6->setRenderChildrenClosure($renderChildrenClosure5);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output3 .= $viewHelper6->initializeArgumentsAndRender();

$output3 .= '
			</li>
		
			<li>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments7 = array();
$arguments7['value'] = 'Create';
$arguments7['additionalAttributes'] = NULL;
$arguments7['data'] = NULL;
$arguments7['name'] = NULL;
$arguments7['property'] = NULL;
$arguments7['disabled'] = NULL;
$arguments7['class'] = NULL;
$arguments7['dir'] = NULL;
$arguments7['id'] = NULL;
$arguments7['lang'] = NULL;
$arguments7['style'] = NULL;
$arguments7['title'] = NULL;
$arguments7['accesskey'] = NULL;
$arguments7['tabindex'] = NULL;
$arguments7['onclick'] = NULL;
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper9 = $self->getViewHelper('$viewHelper9', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper9->setArguments($arguments7);
$viewHelper9->setRenderingContext($renderingContext);
$viewHelper9->setRenderChildrenClosure($renderChildrenClosure8);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output3 .= $viewHelper9->initializeArgumentsAndRender();

$output3 .= '
			</li>
		</ol>
	';
return $output3;
};
$viewHelper10 = $self->getViewHelper('$viewHelper10', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper10->setArguments($arguments1);
$viewHelper10->setRenderingContext($renderingContext);
$viewHelper10->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper10->initializeArgumentsAndRender();

$output0 .= '
';

return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output11 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments12 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments13 = array();
$arguments13['name'] = 'Default';
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper15 = $self->getViewHelper('$viewHelper15', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper15->setArguments($arguments13);
$viewHelper15->setRenderingContext($renderingContext);
$viewHelper15->setRenderChildrenClosure($renderChildrenClosure14);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments12['value'] = $viewHelper15->initializeArgumentsAndRender();
$arguments12['keepQuotes'] = false;
$arguments12['encoding'] = 'UTF-8';
$arguments12['doubleEncode'] = true;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
return NULL;
};
$value17 = ($arguments12['value'] !== NULL ? $arguments12['value'] : $renderChildrenClosure16());

$output11 .= !is_string($value17) && !(is_object($value17) && method_exists($value17, '__toString')) ? $value17 : htmlspecialchars($value17, ($arguments12['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments12['encoding'], $arguments12['doubleEncode']);

$output11 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments18 = array();
$arguments18['name'] = 'Title';
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
return 'New form';
};

$output11 .= '';

$output11 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments20 = array();
$arguments20['name'] = 'stylesheet';
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
return NULL;
};

$output11 .= '';

$output11 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments22 = array();
$arguments22['name'] = 'Content';
$renderChildrenClosure23 = function() use ($renderingContext, $self) {
$output24 = '';

$output24 .= '
	<p>Just fill out the following form to create a new form:</p>

	';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper
$arguments25 = array();
$arguments25['action'] = 'create';
$arguments25['objectName'] = 'newForm';
$arguments25['additionalAttributes'] = NULL;
$arguments25['data'] = NULL;
$arguments25['arguments'] = array (
);
$arguments25['controller'] = NULL;
$arguments25['package'] = NULL;
$arguments25['subpackage'] = NULL;
$arguments25['object'] = NULL;
$arguments25['section'] = '';
$arguments25['format'] = '';
$arguments25['additionalParams'] = array (
);
$arguments25['absolute'] = false;
$arguments25['addQueryString'] = false;
$arguments25['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments25['fieldNamePrefix'] = NULL;
$arguments25['actionUri'] = NULL;
$arguments25['useParentRequest'] = false;
$arguments25['enctype'] = NULL;
$arguments25['method'] = NULL;
$arguments25['name'] = NULL;
$arguments25['onreset'] = NULL;
$arguments25['onsubmit'] = NULL;
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
$output27 = '';

$output27 .= '
		<ol>
			<li>
				<label for="name">Name</label>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments28 = array();
$arguments28['property'] = 'name';
$arguments28['id'] = 'name';
$arguments28['additionalAttributes'] = NULL;
$arguments28['data'] = NULL;
$arguments28['required'] = false;
$arguments28['type'] = 'text';
$arguments28['name'] = NULL;
$arguments28['value'] = NULL;
$arguments28['disabled'] = NULL;
$arguments28['maxlength'] = NULL;
$arguments28['readonly'] = NULL;
$arguments28['size'] = NULL;
$arguments28['placeholder'] = NULL;
$arguments28['autofocus'] = NULL;
$arguments28['errorClass'] = 'f3-form-error';
$arguments28['class'] = NULL;
$arguments28['dir'] = NULL;
$arguments28['lang'] = NULL;
$arguments28['style'] = NULL;
$arguments28['title'] = NULL;
$arguments28['accesskey'] = NULL;
$arguments28['tabindex'] = NULL;
$arguments28['onclick'] = NULL;
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper30 = $self->getViewHelper('$viewHelper30', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper30->setArguments($arguments28);
$viewHelper30->setRenderingContext($renderingContext);
$viewHelper30->setRenderChildrenClosure($renderChildrenClosure29);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output27 .= $viewHelper30->initializeArgumentsAndRender();

$output27 .= '
			</li>
		
			<li>
				';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments31 = array();
$arguments31['value'] = 'Create';
$arguments31['additionalAttributes'] = NULL;
$arguments31['data'] = NULL;
$arguments31['name'] = NULL;
$arguments31['property'] = NULL;
$arguments31['disabled'] = NULL;
$arguments31['class'] = NULL;
$arguments31['dir'] = NULL;
$arguments31['id'] = NULL;
$arguments31['lang'] = NULL;
$arguments31['style'] = NULL;
$arguments31['title'] = NULL;
$arguments31['accesskey'] = NULL;
$arguments31['tabindex'] = NULL;
$arguments31['onclick'] = NULL;
$renderChildrenClosure32 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper33 = $self->getViewHelper('$viewHelper33', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper33->setArguments($arguments31);
$viewHelper33->setRenderingContext($renderingContext);
$viewHelper33->setRenderChildrenClosure($renderChildrenClosure32);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Form\SubmitViewHelper

$output27 .= $viewHelper33->initializeArgumentsAndRender();

$output27 .= '
			</li>
		</ol>
	';
return $output27;
};
$viewHelper34 = $self->getViewHelper('$viewHelper34', $renderingContext, 'TYPO3\Fluid\ViewHelpers\FormViewHelper');
$viewHelper34->setArguments($arguments25);
$viewHelper34->setRenderingContext($renderingContext);
$viewHelper34->setRenderChildrenClosure($renderChildrenClosure26);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\FormViewHelper

$output24 .= $viewHelper34->initializeArgumentsAndRender();

$output24 .= '
';
return $output24;
};

$output11 .= '';

return $output11;
}


}
#0             12016     