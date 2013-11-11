<?php
$data = array(
	0=>array(
		'active'=>"active",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-dashboard',
		'label'=>'Dashboard'
	),
	1=>array(
		'active'=>"",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-text-width',
		'label'=>' Typography '
	),
	2=>array(
		'active'=>"",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-desktop',
		'label'=>' UI Elements ',
		'items'=>array(
			0=>array(
				'active'=>"",
				'countItem'=>0,
				'url'=>"javascript=>void(0)",
				'classIcon'=>'icon-double-angle-right',
				'label'=>' Elements '
			),
			1=>array(
				'active'=>"",
				'countItem'=>0,
				'url'=>"javascript=>void(0)",
				'classIcon'=>'icon-double-angle-right',
				'label'=>' Buttons &amp; Icons '
			),
			2=>array(
				'active'=>"",
				'countItem'=>0,
				'url'=>"javascript=>void(0)",
				'classIcon'=>'icon-double-angle-right',
				'label'=>' Treeview '
			)
		),
	),
	3=>array(
		'active'=>"",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-list',
		'label'=>' Tables '
	),
	4=>array(
		'active'=>"",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-edit',
		'label'=>' Forms '
	),
	5=>array(
		'active'=>"",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-list-alt',
		'label'=>'Widgets'
	),
	6=>array(
		'active'=>"",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-calendar',
		'label'=>'Calendar'
	),
	7=>array(
		'active'=>"",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-picture',
		'label'=>'Gallery'
	),
	8=>array(
		'active'=>"",
		'countItem'=>0,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-tag',
		'label'=>' More Pages '
	),
	9=>array(
		'active'=>"",
		'countItem'=>5,
		'url'=>"javascript=>void(0)",
		'classIcon'=>'icon-file-alt',
		'label'=>'Other page'
	)
);

		
?>
<a class="menu-toggler" id="menu-toggler" href="#">
	<span class="menu-text"></span>
</a>
<div class="sidebar menu-min" id="sidebar">
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="icon-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="icon-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="icon-group"></i>
			</button>

			<button class="btn btn-danger">
				<i class="icon-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- #sidebar-shortcuts -->

	<ul class="nav nav-list" id="oMenuLeftItem">
		<script id="tmplMenuLeftItem" type="text/x-jquery-tmpl">
			<li class="${active}">
				<a href="${url}" class="{{if typeof items!="undefined" && items.length!=0}} dropdown-toggle {{/if}}">
					<i class="${classIcon}"></i>
					<span class="menu-text"> ${label} 
					{{if countItem != 0 }}
						<span class="badge badge-primary ">${countItem}</span>
					{{/if}}
					</span>
					{{if typeof items!="undefined" && items.length!=0}}
					<b class="arrow icon-angle-down"></b>
					{{/if}}
				</a>
				{{if typeof items!="undefined" && items.length!=0}}
				<ul class="submenu">
					{{each(i, item) items}}
					<li>
						<a href="${item.url}">
							<i class="${item.classIcon}"></i>
							${item.label} 
						</a>
					</li>
					 {{/each}}
				</ul>
				{{/if}}
			</li>
		</script>

	</ul><!-- /.nav-list -->
	<script>
	ICHtml.menuLeft.data.item = <?php echo @CJSON::encode($data);?>;
	ICHtml.menuLeft.Actions.renderMenu();
	</script>
	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-right" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>