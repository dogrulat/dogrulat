function collapseThreeToTwo() {
    // console.log('collapseThreeToTwo');

    var $thirdColumn = jQuery("#col_3");
    var $thirdColumnChildren = $thirdColumn.children('li');
    var $secondColumn = jQuery("#col_2");
    var $secondColumnChildren = $secondColumn.children('li');
    var $firstColumn = jQuery("#col_1");
    var $firstColumnChildren = $firstColumn.children('li');
    var liArray = [];
    var i = 0;
    var maxColumnLength = Math.max($firstColumnChildren.length, Math.max($secondColumnChildren.length, $thirdColumnChildren.length));

    for(i = 0; i < maxColumnLength; i += 1) {
        if($firstColumn.length > 0) {
            liArray.push($firstColumnChildren.eq(i).detach());
        }
        if($secondColumn.length > 0) {
            liArray.push($secondColumnChildren.eq(i).detach());
        }
        if($thirdColumn.length > 0) {
            liArray.push($thirdColumnChildren.eq(i).detach());
        }
    }
    
    $thirdColumn.detach();

    var liArrLen = liArray.length;
    i = 0;

    while(i < liArrLen) {
        liArray.shift().appendTo($firstColumn);
        i += 1;

        if(i < liArrLen) {
            liArray.shift().appendTo($secondColumn);
            i += 1;
        }
    }
}

function collapseThreeToOne() {
    // console.log('collapseThreeToOne');

    var $thirdColumn = jQuery("#col_3");
    var $thirdColumnChildren = $thirdColumn.children('li');
    var $secondColumn = jQuery("#col_2");
    var $secondColumnChildren = $secondColumn.children('li');
    var $firstColumn = jQuery('#col_1');
    var $firstColumnChildren = $firstColumn.children('li');
    var liArray = [];
    var i = 0;
    var maxColumnLength = Math.max($firstColumnChildren.length, Math.max($secondColumnChildren.length, $thirdColumnChildren.length));

    for(i = 0; i < maxColumnLength; i += 1) {
        if($firstColumn.length > 0) {
            liArray.push($firstColumnChildren.eq(i).detach());
        }
        if($secondColumn.length > 0) {
            liArray.push($secondColumnChildren.eq(i).detach());
        }
        if($thirdColumn.length > 0) {
            liArray.push($thirdColumnChildren.eq(i).detach());
        }
    }

    var liArrLen = liArray.length;
    i = 0;

    while(i < liArrLen) {
        liArray.shift().appendTo($firstColumn);
        i += 1;
    }

    $secondColumn.detach();
    $thirdColumn.detach();
}

function collapseTwoToOne() {
    // console.log('collapseTwoToOne');

    var $secondColumn = jQuery("#col_2");
    var $secondColumnChildren = $secondColumn.children('li');
    var $firstColumnChildren = jQuery("#col_1 li");
    
    var i = 0;

    $secondColumnChildren.each(function () {
        var item = jQuery(this).detach();
        item.insertAfter($firstColumnChildren.eq(i));
        i += 1;
    });

    $secondColumn.detach();
}

function expandOneToTwo() {
    // console.log('expandOneToTwo');

    var $firstColumn = jQuery("#col_1 li");
    var i, colLen = $firstColumn.length;
    if(jQuery('#col_2').length === 0) {
        var $secondColumn = jQuery('<ul id="col_2" class="col"></ul>');
        jQuery('.posts').append($secondColumn);

        for(i = 1; i < colLen; i += 2) {
            var item = $firstColumn.eq(i).detach();
            item.appendTo($secondColumn);
        }
    }
}

function expandOneToThree() {
    // console.log('expandOneToThree');
    if(jQuery("#col_2").length > 0) {
        return;
    }

    var $secondColumn = jQuery('<ul id="col_2" class="col"></ul>');
    var $thirdColumn = jQuery('<ul id="col_3" class="col"></ul>');
    
    var $firstColumn = jQuery("#col_1");
    var $firstColumnChildren = $firstColumn.children('li');
    var liArray = [];
    var i = 0;

    var maxColumnLength = $firstColumnChildren.length;

    jQuery('.posts').append($secondColumn);
    jQuery('.posts').append($thirdColumn);

    for(i = 0; i < maxColumnLength; i += 1) {
        liArray.push($firstColumnChildren.eq(i).detach());
    }

    i = 0;
    while(i < maxColumnLength) {
        liArray.shift().appendTo($firstColumn);
        i += 1;
        if(i < maxColumnLength) {
            liArray.shift().appendTo($secondColumn);
            i += 1;
        }
        if(i < maxColumnLength) {
            liArray.shift().appendTo($thirdColumn);
            i += 1;
        }
    }
}

function expandTwoToThree() {
    // console.log('expandTwoToThree');
    if(jQuery("#col_3").length > 0) {
        return;
    }

    var $thirdColumn = jQuery('<ul id="col_3" class="col"></ul>');
    
    var $secondColumn = jQuery("#col_2");
    var $secondColumnChildren = $secondColumn.children('li');
    var $firstColumn = jQuery("#col_1");
    var $firstColumnChildren = $firstColumn.children('li');
    var liArray = [];
    var i = 0;

    var maxColumnLength = Math.max($secondColumnChildren.length, $firstColumnChildren.length);

    jQuery('.posts').append($thirdColumn);

    for(i = 0; i < maxColumnLength; i += 1) {
        if($firstColumn.length > 0) {
            liArray.push($firstColumnChildren.eq(i).detach());
        }
        if($secondColumn.length > 0) {
            liArray.push($secondColumnChildren.eq(i).detach());
        }
    }

    var liArrLen = liArray.length;
    i = 0;
    while(i < liArrLen) {
        liArray.shift().appendTo($firstColumn);
        i += 1;
        if(i < liArrLen) {
            liArray.shift().appendTo($secondColumn);
            i += 1;
        }
        if(i < liArrLen) {
            liArray.shift().appendTo($thirdColumn);
            i += 1;
        }
    }
}

var colSize = 1;
var $window = jQuery(window);

if($window.width() >= 1050) {
    expandOneToThree();
    colSize = 3;
}
else if($window.width() >= 751) {
    expandOneToTwo();
    colSize = 2;
}

$window.resize(function () {
    var winSize = $window.width();
    if(colSize == 1 && winSize >= 1150) {
        expandOneToThree();
        colSize = 3;
    }
    else if(colSize == 1 && winSize >= 751) {
        expandOneToTwo();
        colSize = 2;
    }
    else if(colSize == 2 && winSize >= 978) {
        expandTwoToThree();
        colSize = 3;
    }
    else if(colSize === 2 && winSize <= 751) {
        collapseTwoToOne();
        colSize = 1;
    }
    else if(colSize === 3 && winSize <= 751) {
        collapseThreeToOne();
        colSize = 1;
    }
    else if(colSize === 3 && winSize < 978) {
        collapseThreeToTwo();
        colSize = 2;
    }

});