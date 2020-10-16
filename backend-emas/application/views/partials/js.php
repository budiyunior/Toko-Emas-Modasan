<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/assets/js/jquery.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>assets/assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="<?php echo base_url() ?>assets/assets/js/bootstrap.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo base_url() ?>assets/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dataTables.editor.min"></script>
<!-- ace scripts -->
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.scroller.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.colorpicker.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.fileinput.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.typeahead.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.wysiwyg.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.spinner.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.treeview.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.wizard.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.aside.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.ajax-content.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.touch-drag.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.sidebar.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.submenu-hover.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.widget-box.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.settings.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.settings-rtl.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.settings-skin.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.widget-on-reload.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.searchbox-autocomplete.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        var $sidebar = $('.sidebar').eq(0);
        if (!$sidebar.hasClass('h-sidebar')) return;

        $(document).on('settings.ace.top_menu', function(ev, event_name, fixed) {
            if (event_name !== 'sidebar_fixed') return;

            var sidebar = $sidebar.get(0);
            var $window = $(window);

            //return if sidebar is not fixed or in mobile view mode
            var sidebar_vars = $sidebar.ace_sidebar('vars');
            if (!fixed || (sidebar_vars['mobile_view'] || sidebar_vars['collapsible'])) {
                $sidebar.removeClass('lower-highlight');
                //restore original, default marginTop
                sidebar.style.marginTop = '';

                $window.off('scroll.ace.top_menu')
                return;
            }


            var done = false;
            $window.on('scroll.ace.top_menu', function(e) {

                var scroll = $window.scrollTop();
                scroll = parseInt(scroll / 4); //move the menu up 1px for every 4px of document scrolling
                if (scroll > 17) scroll = 17;


                if (scroll > 16) {
                    if (!done) {
                        $sidebar.addClass('lower-highlight');
                        done = true;
                    }
                } else {
                    if (done) {
                        $sidebar.removeClass('lower-highlight');
                        done = false;
                    }
                }

                sidebar.style['marginTop'] = (17 - scroll) + 'px';
            }).triggerHandler('scroll.ace.top_menu');

        }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);

        $(window).on('resize.ace.top_menu', function() {
            $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);
        });

        var oTable1 =
            $('#dynamic-table')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
            .dataTable({
                bAutoWidth: false,
                "aoColumns": [{
                        "bSortable": false
                    },
                    null, null, null, null, null,
                    {
                        "bSortable": false
                    }
                ],
                "aaSorting": [],

                //,
                //"sScrollY": "200px",
                //"bPaginate": false,

                //"sScrollX": "100%",
                //"sScrollXInner": "120%",
                //"bScrollCollapse": true,
                //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                //"iDisplayLength": 50
            });

        TableTools.classes.container = "btn-group btn-overlap";
        TableTools.classes.print = {
            "body": "DTTT_Print",
            "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
            "message": "tableTools-print-navbar"
        }

        var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
            "sSwfPath": "../assets/js/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo ../assets will be replaced by correct assets path

            "sRowSelector": "td:not(:last-child)",
            "sRowSelect": "multi",
            "fnRowSelected": function(row) {
                //check checkbox when row is selected
                try {
                    $(row).find('input[type=checkbox]').get(0).checked = true
                } catch (e) {}
            },
            "fnRowDeselected": function(row) {
                //uncheck checkbox
                try {
                    $(row).find('input[type=checkbox]').get(0).checked = false
                } catch (e) {}
            },

            "sSelectedClass": "success",
            "aButtons": [{
                    "sExtends": "copy",
                    "sToolTip": "Copy to clipboard",
                    "sButtonClass": "btn btn-white btn-primary btn-bold",
                    "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
                    "fnComplete": function() {
                        this.fnInfo('<h3 class="no-margin-top smaller">Table copied</h3>\
									<p>Copied ' + (oTable1.fnSettings().fnRecordsTotal()) + ' row(s) to the clipboard.</p>',
                            1500
                        );
                    }
                },

                {
                    "sExtends": "csv",
                    "sToolTip": "Export to CSV",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
                },

                {
                    "sExtends": "pdf",
                    "sToolTip": "Export to PDF",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
                },

                {
                    "sExtends": "print",
                    "sToolTip": "Print view",
                    "sButtonClass": "btn btn-white btn-primary  btn-bold",
                    "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",

                    "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",

                    "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
									  <p>Please use your browser's print function to\
									  print this table.\
									  <br />Press <b>escape</b> when finished.</p>",
                }
            ]
        });

        $(document).ready(function() {

            $('#btnSubmit').click(function() {

                $('.row-select input:checked').each(function() {
                    var id;
                    id = $(this).closest('tr').find('.id').html();
                    // name = $(this).closest('tr').find('.name').html();

                    alert('ID: ' + id);
                })

            })


            $('#btnSelectAll').click(function() {

                $('.row-select input').each(function() {
                    $(this).prop('checked', true);
                })

            })

        })

    });
</script>

<!-- the following scripts are used in demo only for onpage help and you don't need them -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/ace.onpage-help.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/docs/assets/js/themes/sunburst.css" />

<script type="text/javascript">
    ace.vars['base'] = '..';
</script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/elements.onpage-help.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/ace/ace.onpage-help.js"></script>
<script src="<?php echo base_url() ?>assets/docs/assets/js/rainbow.js"></script>
<script src="<?php echo base_url() ?>assets/docs/assets/js/language/generic.js"></script>
<script src="<?php echo base_url() ?>assets/docs/assets/js/language/html.js"></script>
<script src="<?php echo base_url() ?>assets/docs/assets/js/language/css.js"></script>
<script src="<?php echo base_url() ?>assets/docs/assets/js/language/javascript.js"></script>

</body>

</html>