<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        .demo {margin:4em auto}


        // Quickly SCSS'ed
        // Handful of questionable important flags

        .dataTables_length {
        label {float:left;text-align:left}
        select {width:75px}
        }
        .dataTables_filter {
        label {float:right}
        }
        .dataTables_info {padding-top:26px}
        .dataTables_paginate {float:right;margin:0}

        table {
        &.table {
            clear:both;
            margin-bottom:6px !important;
            max-width:none !important;
            thead {
            .sorting,
            .sorting_asc,
            .sorting_desc,
            .sorting_asc_disabled,
            .sorting_desc_disabled {cursor:pointer;*cursor:hand}
            .sorting { background: url('../images/sort_both.png') no-repeat center right; }
            .sorting_asc { background: url('../images/sort_asc.png') no-repeat center right; }
            .sorting_desc { background: url('../images/sort_desc.png') no-repeat center right; }
            .sorting_asc_disabled { background: url('../images/sort_asc_disabled.png') no-repeat center right; }
            .sorting_desc_disabled { background: url('../images/sort_desc_disabled.png') no-repeat center right; }
            }
        }
        &.dataTable {
            th:active {outline:none}
        }
        }

        /* Scrolling */
        .dataTables_scrollHead table {
        margin-bottom: 0 !important;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        thead {
            tr:last-child {
            th:first-child,td:first-child {
                border-bottom-left-radius: 0 !important;
                border-bottom-right-radius: 0 !important;
            }
            }
        }
        }
        .dataTables_scrollBody {
        table {
            border-top: none;
            margin-bottom: 0 !important;
            tbody tr:first-child {
            th, td {border-top:none}
            }
        }
        }
        .dataTables_scrollFoot table {
        border-top: none;
        }


        /*
        * TableTools styles
        */

        .table tbody tr {
        &.active {
            td,th {background-color:#08C;color:white}
            &:hover {
            td,th {background-color: #0075b0 !important}
            }
        }
        }
        .table-striped tbody tr {
        &.active:nth-child(odd) {
            td,th {background-color: #017ebc;}
        }
        }

        table.DTTT_selectable tbody tr {cursor: pointer;*cursor: hand}

        .DTTT {
        .btn {
            color: #333 !important;
            font-size: 12px;
            &:hover {text-decoration: none !important;}
        }
        }

        ul.DTTT_dropdown.dropdown-menu li:hover a {
        background-color: #0088cc;
        color: white !important;
        }

        /* TableTools information display */

        .DTTT_print_info {
        &.modal {
            height: 150px;
            margin-top: -75px;
            text-align: center;
        }
        h6 {
            font-weight: normal;
            font-size: 28px;
            line-height: 28px;
            margin: 1em;
        }
        p {font-size:14px;line-height:20px}
        }

        /*
        * FixedColumns styles
        */
        div.DTFC_LeftHeadWrapper table,
        div.DTFC_LeftFootWrapper table,
        table.DTFC_Cloned tr.even {
        background-color: white;
        }

        div.DTFC_LeftHeadWrapper table {
        margin-bottom: 0 !important;
        border-top-right-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
        }

        div.DTFC_LeftHeadWrapper table thead tr:last-child th:first-child,
        div.DTFC_LeftHeadWrapper table thead tr:last-child td:first-child {
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
        }

        div.DTFC_LeftBodyWrapper table {
        border-top: none;
        margin-bottom: 0 !important;
        }

        div.DTFC_LeftBodyWrapper tbody tr:first-child th,
        div.DTFC_LeftBodyWrapper tbody tr:first-child td {
        border-top: none;
        }

        div.DTFC_LeftFootWrapper table {
        border-top: none;
        }  

        .eyyy {
            display: flex;
            justify-content: space-between;
        } 

        .result-eyyy {
            width: 10rem;
        }

        .part-eyyy {
            display: flex;
            justify-content: space-between;
        }

        .green {
            color: green;
        }

        .blue {
            color: blue;
        }

        .grey {
            color: grey;
        }
    </style>
</head>
<body>
<div class="container demo">
  <table class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>Full name</th>
            <th>Phone Number</th>
            <th>Choice</th>
            <th>Date Join</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $mmbr)
            <tr>
                <td>{{$mmbr->full_name}}</td>
                <td>{{$mmbr->phone_number}}</td>
                @if($mmbr->choice == 'tree')
                <td class="green">تشجـــير</td>
                @endif
                @if($mmbr->choice == 'clean')
                <td class="grey">طـــلاء</td>
                @endif
                @if($mmbr->choice == 'paint')
                <td class="blue">تنظـــيف</td>
                @endif
                <td class="eyyy"><span class="eyy">{{$mmbr->updated_at->format('F j')}}</span> <span class="eyy">{{$mmbr->updated_at->format('g:i a')}}</span></td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>

    </tfoot>
  </table>

    <h2>Basic Analytics</h2>
    <div dir="rtl" lang="ar" class="result-eyyy">
        <p class="part-eyyy">
            <span>{{ $members->count() }}</span>
            <span>Total Participant </span>
        </p>
        <p class="part-eyyy">
            <span>{{ $members->where('choice', 'tree')->count() }}</span>
            <span>تشجـــير </span>
        </p>
        <p class="part-eyyy">
            <span>{{ $members->where('choice', 'paint')->count() }}</span>
            <span>طـــلاء </span>
        </p>
        <p class="part-eyyy">
            <span>{{ $members->where('choice', 'clean')->count() }}</span>
            <span>تنظـــيف </span>
        </p>
    </div>

</div><!--/.container.demo --> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script>
    (function (factory) {
        if (typeof define === 'function' && define.amd) {
            define(['jquery','datatables'], factory);
        }
        else {
            factory(jQuery);
        }
    }(function ($) {
        /* Set the defaults for DataTables initialisation */
        $.extend( true, $.fn.dataTable.defaults, {
            "sDom": "<'row'<'col-sm-12'<'pull-right'f><'pull-left'l>r<'clearfix'>>>t<'row'<'col-sm-12'<'pull-left'i><'pull-right'p><'clearfix'>>>",
            "sPaginationType": "bs_normal",
            "oLanguage": {
                "sLengthMenu": "Show _MENU_ Rows",
                "sSearch": ""
            }
        } );

        /* Default class modification */
        $.extend( $.fn.dataTableExt.oStdClasses, {
            "sWrapper": "dataTables_wrapper form-inline"
        } );

        /* API method to get paging information */
        $.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
        {
            return {
                "iStart":         oSettings._iDisplayStart,
                "iEnd":           oSettings.fnDisplayEnd(),
                "iLength":        oSettings._iDisplayLength,
                "iTotal":         oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage":          oSettings._iDisplayLength === -1 ?
                    0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
                "iTotalPages":    oSettings._iDisplayLength === -1 ?
                    0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
            };
        };

        /* Bootstrap style pagination control */
        $.extend( $.fn.dataTableExt.oPagination, {
            "bs_normal": {
                "fnInit": function( oSettings, nPaging, fnDraw ) {
                    var oLang = oSettings.oLanguage.oPaginate;
                    var fnClickHandler = function ( e ) {
                        e.preventDefault();
                        if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                            fnDraw( oSettings );
                        }
                    };
                    $(nPaging).append(
                        '<ul class="pagination">'+
                            '<li class="prev disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;'+oLang.sPrevious+'</a></li>'+
                            '<li class="next disabled"><a href="#">'+oLang.sNext+'&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>'+
                        '</ul>'
                    );
                    var els = $('a', nPaging);
                    $(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
                    $(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
                },
                "fnUpdate": function ( oSettings, fnDraw ) {
                    var iListLength = 5;
                    var oPaging = oSettings.oInstance.fnPagingInfo();
                    var an = oSettings.aanFeatures.p;
                    var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);
                    if ( oPaging.iTotalPages < iListLength) {
                        iStart = 1;
                        iEnd = oPaging.iTotalPages;
                    }
                    else if ( oPaging.iPage <= iHalf ) {
                        iStart = 1;
                        iEnd = iListLength;
                    } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
                        iStart = oPaging.iTotalPages - iListLength + 1;
                        iEnd = oPaging.iTotalPages;
                    } else {
                        iStart = oPaging.iPage - iHalf + 1;
                        iEnd = iStart + iListLength - 1;
                    }
                    for ( i=0, ien=an.length ; i<ien ; i++ ) {
                        $('li:gt(0)', an[i]).filter(':not(:last)').remove();
                        for ( j=iStart ; j<=iEnd ; j++ ) {
                            sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                            $('<li '+sClass+'><a href="#">'+j+'</a></li>')
                                .insertBefore( $('li:last', an[i])[0] )
                                .bind('click', function (e) {
                                    e.preventDefault();
                                    if ( oSettings.oApi._fnPageChange(oSettings, parseInt($('a', this).text(),10)-1) ) {
                                        fnDraw( oSettings );
                                    }
                                } );
                        }
                        if ( oPaging.iPage === 0 ) {
                            $('li:first', an[i]).addClass('disabled');
                        } else {
                            $('li:first', an[i]).removeClass('disabled');
                        }

                        if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                            $('li:last', an[i]).addClass('disabled');
                        } else {
                            $('li:last', an[i]).removeClass('disabled');
                        }
                    }
                }
            },	
            "bs_two_button": {
                "fnInit": function ( oSettings, nPaging, fnCallbackDraw )
                {
                    var oLang = oSettings.oLanguage.oPaginate;
                    var oClasses = oSettings.oClasses;
                    var fnClickHandler = function ( e ) {
                        if ( oSettings.oApi._fnPageChange( oSettings, e.data.action ) )
                        {
                            fnCallbackDraw( oSettings );
                        }
                    };
                    var sAppend = '<ul class="pagination">'+
                        '<li class="prev"><a class="'+oSettings.oClasses.sPagePrevDisabled+'" tabindex="'+oSettings.iTabIndex+'" role="button"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;'+oLang.sPrevious+'</a></li>'+
                        '<li class="next"><a class="'+oSettings.oClasses.sPageNextDisabled+'" tabindex="'+oSettings.iTabIndex+'" role="button">'+oLang.sNext+'&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>'+
                        '</ul>';
                    $(nPaging).append( sAppend );
                    var els = $('a', nPaging);
                    var nPrevious = els[0],
                        nNext = els[1];
                    oSettings.oApi._fnBindAction( nPrevious, {action: "previous"}, fnClickHandler );
                    oSettings.oApi._fnBindAction( nNext,     {action: "next"},     fnClickHandler );
                    if ( !oSettings.aanFeatures.p )
                    {
                        nPaging.id = oSettings.sTableId+'_paginate';
                        nPrevious.id = oSettings.sTableId+'_previous';
                        nNext.id = oSettings.sTableId+'_next';
                        nPrevious.setAttribute('aria-controls', oSettings.sTableId);
                        nNext.setAttribute('aria-controls', oSettings.sTableId);
                    }
                },
                "fnUpdate": function ( oSettings, fnCallbackDraw )
                {
                    if ( !oSettings.aanFeatures.p )
                    {
                        return;
                    }
                    var oPaging = oSettings.oInstance.fnPagingInfo();
                    var oClasses = oSettings.oClasses;
                    var an = oSettings.aanFeatures.p;
                    var nNode;
                    for ( var i=0, iLen=an.length ; i<iLen ; i++ )
                    {
                        if ( oPaging.iPage === 0 ) {
                            $('li:first', an[i]).addClass('disabled');
                        } else {
                            $('li:first', an[i]).removeClass('disabled');
                        }

                        if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                            $('li:last', an[i]).addClass('disabled');
                        } else {
                            $('li:last', an[i]).removeClass('disabled');
                        }
                    }
                }
            },
            "bs_four_button": {
                "fnInit": function ( oSettings, nPaging, fnCallbackDraw )
                    {
                        var oLang = oSettings.oLanguage.oPaginate;
                        var oClasses = oSettings.oClasses;
                        var fnClickHandler = function ( e ) {
                            e.preventDefault()
                            if ( oSettings.oApi._fnPageChange( oSettings, e.data.action ) )
                            {
                                fnCallbackDraw( oSettings );
                            }
                        };
                        $(nPaging).append(
                            '<ul class="pagination">'+
                            '<li class="disabled"><a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageFirst+'"><span class="glyphicon glyphicon-backward"></span>&nbsp;'+oLang.sFirst+'</a></li>'+
                            '<li class="disabled"><a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPagePrevious+'"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;'+oLang.sPrevious+'</a></li>'+
                            '<li><a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageNext+'">'+oLang.sNext+'&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a></li>'+
                            '<li><a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageLast+'">'+oLang.sLast+'&nbsp;<span class="glyphicon glyphicon-forward"></span></a></li>'+
                            '</ul>'
                        );
                        var els = $('a', nPaging);
                        var nFirst = els[0],
                            nPrev = els[1],
                            nNext = els[2],
                            nLast = els[3];
                        oSettings.oApi._fnBindAction( nFirst, {action: "first"},    fnClickHandler );
                        oSettings.oApi._fnBindAction( nPrev,  {action: "previous"}, fnClickHandler );
                        oSettings.oApi._fnBindAction( nNext,  {action: "next"},     fnClickHandler );
                        oSettings.oApi._fnBindAction( nLast,  {action: "last"},     fnClickHandler );
                        if ( !oSettings.aanFeatures.p )
                        {
                            nPaging.id = oSettings.sTableId+'_paginate';
                            nFirst.id =oSettings.sTableId+'_first';
                            nPrev.id =oSettings.sTableId+'_previous';
                            nNext.id =oSettings.sTableId+'_next';
                            nLast.id =oSettings.sTableId+'_last';
                        }
                    },
                "fnUpdate": function ( oSettings, fnCallbackDraw )
                    {
                        if ( !oSettings.aanFeatures.p )
                        {
                            return;
                        }
                        var oPaging = oSettings.oInstance.fnPagingInfo();
                        var oClasses = oSettings.oClasses;
                        var an = oSettings.aanFeatures.p;
                        var nNode;
                        for ( var i=0, iLen=an.length ; i<iLen ; i++ )
                        {
                            if ( oPaging.iPage === 0 ) {
                                $('li:eq(0)', an[i]).addClass('disabled');
                                $('li:eq(1)', an[i]).addClass('disabled');
                            } else {
                                $('li:eq(0)', an[i]).removeClass('disabled');
                                $('li:eq(1)', an[i]).removeClass('disabled');
                            }

                            if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                                $('li:eq(2)', an[i]).addClass('disabled');
                                $('li:eq(3)', an[i]).addClass('disabled');
                            } else {
                                $('li:eq(2)', an[i]).removeClass('disabled');
                                $('li:eq(3)', an[i]).removeClass('disabled');
                            }
                        }
                    }
            },
            "bs_full": {
                "fnInit": function ( oSettings, nPaging, fnCallbackDraw )
                    {
                        var oLang = oSettings.oLanguage.oPaginate;
                        var oClasses = oSettings.oClasses;
                        var fnClickHandler = function ( e ) {
                            if ( oSettings.oApi._fnPageChange( oSettings, e.data.action ) )
                            {
                                fnCallbackDraw( oSettings );
                            }
                        };
                        $(nPaging).append(
                            '<ul class="pagination">'+
                            '<li class="disabled"><a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageFirst+'">'+oLang.sFirst+'</a></li>'+
                            '<li class="disabled"><a  tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPagePrevious+'">'+oLang.sPrevious+'</a></li>'+
                            '<li><a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageNext+'">'+oLang.sNext+'</a></li>'+
                            '<li><a tabindex="'+oSettings.iTabIndex+'" class="'+oClasses.sPageButton+" "+oClasses.sPageLast+'">'+oLang.sLast+'</a></li>'+
                            '</ul>'
                        );
                        var els = $('a', nPaging);
                        var nFirst = els[0],
                            nPrev = els[1],
                            nNext = els[2],
                            nLast = els[3];
                        oSettings.oApi._fnBindAction( nFirst, {action: "first"},    fnClickHandler );
                        oSettings.oApi._fnBindAction( nPrev,  {action: "previous"}, fnClickHandler );
                        oSettings.oApi._fnBindAction( nNext,  {action: "next"},     fnClickHandler );
                        oSettings.oApi._fnBindAction( nLast,  {action: "last"},     fnClickHandler );
                        if ( !oSettings.aanFeatures.p )
                        {
                            nPaging.id = oSettings.sTableId+'_paginate';
                            nFirst.id =oSettings.sTableId+'_first';
                            nPrev.id =oSettings.sTableId+'_previous';
                            nNext.id =oSettings.sTableId+'_next';
                            nLast.id =oSettings.sTableId+'_last';
                        }
                    },
                "fnUpdate": function ( oSettings, fnCallbackDraw )
                    {
                        if ( !oSettings.aanFeatures.p )
                        {
                            return;
                        }
                        var oPaging = oSettings.oInstance.fnPagingInfo();
                        var iPageCount = $.fn.dataTableExt.oPagination.iFullNumbersShowPages;
                        var iPageCountHalf = Math.floor(iPageCount / 2);
                        var iPages = Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength);
                        var iCurrentPage = Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
                        var sList = "";
                        var iStartButton, iEndButton, i, iLen;
                        var oClasses = oSettings.oClasses;
                        var anButtons, anStatic, nPaginateList, nNode;
                        var an = oSettings.aanFeatures.p;
                        var fnBind = function (j) {
                            oSettings.oApi._fnBindAction( this, {"page": j+iStartButton-1}, function(e) {
                                if( oSettings.oApi._fnPageChange( oSettings, e.data.page ) ){
                                    fnCallbackDraw( oSettings );
                                }
                                e.preventDefault();
                            } );
                        };
                        if ( oSettings._iDisplayLength === -1 )
                        {
                            iStartButton = 1;
                            iEndButton = 1;
                            iCurrentPage = 1;
                        }
                        else if (iPages < iPageCount)
                        {
                            iStartButton = 1;
                            iEndButton = iPages;
                        }
                        else if (iCurrentPage <= iPageCountHalf)
                        {
                            iStartButton = 1;
                            iEndButton = iPageCount;
                        }
                        else if (iCurrentPage >= (iPages - iPageCountHalf))
                        {
                            iStartButton = iPages - iPageCount + 1;
                            iEndButton = iPages;
                        }
                        else
                        {
                            iStartButton = iCurrentPage - Math.ceil(iPageCount / 2) + 1;
                            iEndButton = iStartButton + iPageCount - 1;
                        }
                        for ( i=iStartButton ; i<=iEndButton ; i++ )
                        {
                            sList += (iCurrentPage !== i) ?
                                '<li><a tabindex="'+oSettings.iTabIndex+'">'+oSettings.fnFormatNumber(i)+'</a></li>' :
                                '<li class="active"><a tabindex="'+oSettings.iTabIndex+'">'+oSettings.fnFormatNumber(i)+'</a></li>';
                        }
                        for ( i=0, iLen=an.length ; i<iLen ; i++ )
                        {
                            nNode = an[i];
                            if ( !nNode.hasChildNodes() )
                            {
                                continue;
                            }
                            $('li:gt(1)', an[i]).filter(':not(li:eq(-2))').filter(':not(li:eq(-1))').remove();
                            if ( oPaging.iPage === 0 ) {
                                $('li:eq(0)', an[i]).addClass('disabled');
                                $('li:eq(1)', an[i]).addClass('disabled');
                            } else {
                                $('li:eq(0)', an[i]).removeClass('disabled');
                                $('li:eq(1)', an[i]).removeClass('disabled');
                            }
                            if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                                $('li:eq(-1)', an[i]).addClass('disabled');
                                $('li:eq(-2)', an[i]).addClass('disabled');
                            } else {
                                $('li:eq(-1)', an[i]).removeClass('disabled');
                                $('li:eq(-2)', an[i]).removeClass('disabled');
                            }
                            $(sList)
                                .insertBefore($('li:eq(-2)', an[i]))
                                .bind('click', function (e) {
                                    e.preventDefault();
                                    if ( oSettings.oApi._fnPageChange(oSettings, parseInt($('a', this).text(),10)-1) ) {
                                        fnCallbackDraw( oSettings );
                                    }
                                });
                        }
                    }
            }	
        } );


        /*
        * TableTools Bootstrap compatibility
        * Required TableTools 2.1+
        */
        if ( $.fn.DataTable.TableTools ) {
            // Set the classes that TableTools uses to something suitable for Bootstrap
            $.extend( true, $.fn.DataTable.TableTools.classes, {
                "container": "DTTT btn-group",
                "buttons": {
                    "normal": "btn",
                    "disabled": "disabled"
                },
                "collection": {
                    "container": "DTTT_dropdown dropdown-menu",
                    "buttons": {
                        "normal": "",
                        "disabled": "disabled"
                    }
                },
                "print": {
                    "info": "DTTT_print_info modal"
                },
                "select": {
                    "row": "active"
                }
            } );

            // Have the collection use a bootstrap compatible dropdown
            $.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
                "collection": {
                    "container": "ul",
                    "button": "li",
                    "liner": "a"
                }
            } );
        }
    }));


    $(document).ready(function() {
			$('.datatable').dataTable({
				"sPaginationType": "bs_normal"
			});	
			$('.datatable').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Search');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
                datatable.bind('page', function(e){
                    window.console && console.log('pagination event:', e) //this event must be fired whenever you paginate
                });
			});
		});

</script>
</body>
</html>


