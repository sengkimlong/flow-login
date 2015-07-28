<?php class FluidCache_SKL_Test_User_action_home_8737b1314639fdee00cc93ff9bfdd23ee4a82142 extends \TYPO3\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// TODO
	return new \TYPO3\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;

return 'default';
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

$output0 .= '
  <link rel="stylesheet" href="';
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

return NULL;
}
/**
 * section Content
 */
public function section_4f9be057f0ea5d2ba72fd2c810e8d7b9aa98b469(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output7 = '';

$output7 .= '
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
              <li id="list-2" class="item"><a id="form-1" class="list" role="button" >Form 1</a></li>
              <li id="list-3" class="item"><a id="form-2" class="list" role="button" >Form 2</a></li>
              <li id="list-4" class="item"><a id="form-3" class="list" role="button" >Form 3</a></li>
              <li id="list-5" class="dropdown item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments8 = array();
$arguments8['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments8['keepQuotes'] = false;
$arguments8['encoding'] = 'UTF-8';
$arguments8['doubleEncode'] = true;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
return NULL;
};
$value10 = ($arguments8['value'] !== NULL ? $arguments8['value'] : $renderChildrenClosure9());

$output7 .= !is_string($value10) && !(is_object($value10) && method_exists($value10, '__toString')) ? $value10 : htmlspecialchars($value10, ($arguments8['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments8['encoding'], $arguments8['doubleEncode']);

$output7 .= ' <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments11 = array();
$arguments11['action'] = 'logout';
$arguments11['additionalAttributes'] = NULL;
$arguments11['data'] = NULL;
$arguments11['arguments'] = array (
);
$arguments11['controller'] = NULL;
$arguments11['package'] = NULL;
$arguments11['subpackage'] = NULL;
$arguments11['section'] = '';
$arguments11['format'] = '';
$arguments11['additionalParams'] = array (
);
$arguments11['addQueryString'] = false;
$arguments11['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments11['useParentRequest'] = false;
$arguments11['absolute'] = true;
$arguments11['class'] = NULL;
$arguments11['dir'] = NULL;
$arguments11['id'] = NULL;
$arguments11['lang'] = NULL;
$arguments11['style'] = NULL;
$arguments11['title'] = NULL;
$arguments11['accesskey'] = NULL;
$arguments11['tabindex'] = NULL;
$arguments11['onclick'] = NULL;
$arguments11['name'] = NULL;
$arguments11['rel'] = NULL;
$arguments11['rev'] = NULL;
$arguments11['target'] = NULL;
$renderChildrenClosure12 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper13->setArguments($arguments11);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure12);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output7 .= $viewHelper13->initializeArgumentsAndRender();

$output7 .= '</li>
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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments14 = array();
$arguments14['action'] = 'test';
$arguments14['additionalAttributes'] = NULL;
$arguments14['data'] = NULL;
$arguments14['arguments'] = array (
);
$arguments14['controller'] = NULL;
$arguments14['package'] = NULL;
$arguments14['subpackage'] = NULL;
$arguments14['section'] = '';
$arguments14['format'] = '';
$arguments14['additionalParams'] = array (
);
$arguments14['addQueryString'] = false;
$arguments14['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments14['useParentRequest'] = false;
$arguments14['absolute'] = true;
$arguments14['class'] = NULL;
$arguments14['dir'] = NULL;
$arguments14['id'] = NULL;
$arguments14['lang'] = NULL;
$arguments14['style'] = NULL;
$arguments14['title'] = NULL;
$arguments14['accesskey'] = NULL;
$arguments14['tabindex'] = NULL;
$arguments14['onclick'] = NULL;
$arguments14['name'] = NULL;
$arguments14['rel'] = NULL;
$arguments14['rev'] = NULL;
$arguments14['target'] = NULL;
$renderChildrenClosure15 = function() use ($renderingContext, $self) {
return '
  test
';
};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper16->setArguments($arguments14);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output7 .= $viewHelper16->initializeArgumentsAndRender();

$output7 .= '


';

return $output7;
}
/**
 * Main Render function
 */
public function render(\TYPO3\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$output17 = '';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments18 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments19 = array();
$arguments19['name'] = 'default';
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper21 = $self->getViewHelper('$viewHelper21', $renderingContext, 'TYPO3\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper21->setArguments($arguments19);
$viewHelper21->setRenderingContext($renderingContext);
$viewHelper21->setRenderChildrenClosure($renderChildrenClosure20);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\LayoutViewHelper
$arguments18['value'] = $viewHelper21->initializeArgumentsAndRender();
$arguments18['keepQuotes'] = false;
$arguments18['encoding'] = 'UTF-8';
$arguments18['doubleEncode'] = true;
$renderChildrenClosure22 = function() use ($renderingContext, $self) {
return NULL;
};
$value23 = ($arguments18['value'] !== NULL ? $arguments18['value'] : $renderChildrenClosure22());

$output17 .= !is_string($value23) && !(is_object($value23) && method_exists($value23, '__toString')) ? $value23 : htmlspecialchars($value23, ($arguments18['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments18['encoding'], $arguments18['doubleEncode']);

$output17 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments24 = array();
$arguments24['name'] = 'stylesheet';
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
$output26 = '';

$output26 .= '
  <link rel="stylesheet" href="';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments27 = array();
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments28 = array();
$arguments28['path'] = 'CSS/style.css';
$arguments28['package'] = 'SKL.Test';
$arguments28['resource'] = NULL;
$arguments28['localize'] = true;
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
return NULL;
};
$viewHelper30 = $self->getViewHelper('$viewHelper30', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper');
$viewHelper30->setArguments($arguments28);
$viewHelper30->setRenderingContext($renderingContext);
$viewHelper30->setRenderChildrenClosure($renderChildrenClosure29);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
$arguments27['value'] = $viewHelper30->initializeArgumentsAndRender();
$arguments27['keepQuotes'] = false;
$arguments27['encoding'] = 'UTF-8';
$arguments27['doubleEncode'] = true;
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
return NULL;
};
$value32 = ($arguments27['value'] !== NULL ? $arguments27['value'] : $renderChildrenClosure31());

$output26 .= !is_string($value32) && !(is_object($value32) && method_exists($value32, '__toString')) ? $value32 : htmlspecialchars($value32, ($arguments27['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments27['encoding'], $arguments27['doubleEncode']);

$output26 .= '" />
';
return $output26;
};

$output17 .= '';

$output17 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments33 = array();
$arguments33['name'] = 'Title';
$renderChildrenClosure34 = function() use ($renderingContext, $self) {
return NULL;
};

$output17 .= '';

$output17 .= '

';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\SectionViewHelper
$arguments35 = array();
$arguments35['name'] = 'Content';
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$output37 = '';

$output37 .= '
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
              <li id="list-2" class="item"><a id="form-1" class="list" role="button" >Form 1</a></li>
              <li id="list-3" class="item"><a id="form-2" class="list" role="button" >Form 2</a></li>
              <li id="list-4" class="item"><a id="form-3" class="list" role="button" >Form 3</a></li>
              <li id="list-5" class="dropdown item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments38 = array();
$arguments38['value'] = \TYPO3\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($renderingContext->getTemplateVariableContainer(), 'usrname', $renderingContext);
$arguments38['keepQuotes'] = false;
$arguments38['encoding'] = 'UTF-8';
$arguments38['doubleEncode'] = true;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
return NULL;
};
$value40 = ($arguments38['value'] !== NULL ? $arguments38['value'] : $renderChildrenClosure39());

$output37 .= !is_string($value40) && !(is_object($value40) && method_exists($value40, '__toString')) ? $value40 : htmlspecialchars($value40, ($arguments38['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), $arguments38['encoding'], $arguments38['doubleEncode']);

$output37 .= ' <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li >';
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments41 = array();
$arguments41['action'] = 'logout';
$arguments41['additionalAttributes'] = NULL;
$arguments41['data'] = NULL;
$arguments41['arguments'] = array (
);
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
$arguments41['class'] = NULL;
$arguments41['dir'] = NULL;
$arguments41['id'] = NULL;
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
$renderChildrenClosure42 = function() use ($renderingContext, $self) {
return 'Logout';
};
$viewHelper43 = $self->getViewHelper('$viewHelper43', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper43->setArguments($arguments41);
$viewHelper43->setRenderingContext($renderingContext);
$viewHelper43->setRenderChildrenClosure($renderChildrenClosure42);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output37 .= $viewHelper43->initializeArgumentsAndRender();

$output37 .= '</li>
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
// Rendering ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments44 = array();
$arguments44['action'] = 'test';
$arguments44['additionalAttributes'] = NULL;
$arguments44['data'] = NULL;
$arguments44['arguments'] = array (
);
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
$renderChildrenClosure45 = function() use ($renderingContext, $self) {
return '
  test
';
};
$viewHelper46 = $self->getViewHelper('$viewHelper46', $renderingContext, 'TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper46->setArguments($arguments44);
$viewHelper46->setRenderingContext($renderingContext);
$viewHelper46->setRenderChildrenClosure($renderChildrenClosure45);
// End of ViewHelper TYPO3\Fluid\ViewHelpers\Link\ActionViewHelper

$output37 .= $viewHelper46->initializeArgumentsAndRender();

$output37 .= '


';
return $output37;
};

$output17 .= '';

$output17 .= '
';

return $output17;
}


}
#0             21018     