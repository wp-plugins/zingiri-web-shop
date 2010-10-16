<?php
$menus=array();
$menus['dashboard']=array('group' => 'admin102', 'grouping' => 'dashboard', 'single' => true, 'label' => 'admin102','href' => 'page=dashboard', 'img' => 'dashboard.png');
$menus['orderadmin']=array('group' => 'admin2', 'grouping' => 'orders', 'label' => 'admin2','href' => 'page=orderadmin', 'img' => 'orders.jpg', 'func' => 'CountAllOrders');
$menus['showcustomers']=array('page' => 'customeradmin', 'grouping' => 'customers', 'group' => 'admin3', 'label' => 'admin3','href' => 'page=customeradmin&action=showcustomers', 'img' => 'customers.gif', 'func' => 'CountCustomers','param' => 'CUSTOMER');
$menus['showadmins']=array('page' => 'customeradmin', 'grouping' => 'customers', 'group' => 'admin3', 'label' => 'admin29','href' => 'page=customeradmin&action=showadmins', 'img' => 'admins.gif', 'func' => 'CountCustomers','param' => 'ADMIN');
//$menus['admineditbanned']=array('page' => 'adminedit', 'grouping' => 'customers', 'group' => 'admin3', 'label' => 'admin19','href' => 'page=adminedit&filename=banned.txt&root=1&wysiwyg=0', 'img' => 'banned.gif');
$menus['mailinglist']=array('grouping' => 'customers', 'group' => 'admin3', 'label' => 'admin35','href' => 'page=mailinglist', 'img' => 'mailinglist.gif');
$menus['inventory']=array('page' => 'inventory','grouping' => 'products', 'group' => 'menu15', 'label' => 'menu15','href' => 'page=inventory&includesearch=1&action=list', 'img' => 'productswh.png', 'func' => 'CountProducts');
$menus['product']=array('hide' => true,'type' => 'apps','grouping' => 'products', 'group' => 'menu9', 'label' => 'productadmin17','href' => 'zfaces=list&form=product', 'img' => 'products.gif');
$menus['stockadmin']=array('group' => 'menu15', 'grouping' => 'products', 'label' => 'admin32','href' => 'page=stockadmin', 'img' => 'stockadmin.gif');
$menus['uploadadmin']=array('group' => 'menu15', 'grouping' => 'products', 'label' => 'admin9','href' => 'page=uploadadmin', 'img' => 'uploadlist.gif');
$menus['editsettings']=array('group' => 'admin23', 'grouping' => 'settings', 'label' => 'admin8','href' => 'page=editsettings', 'img' => 'settings.gif');
$menus['groupadmin']=array('type' => 'apps', 'grouping' => 'settings', 'group' => 'admin23', 'label' => 'admin6','href' => 'zfaces=list&form=group', 'img' => 'groups.gif');
$menus['paymentadmin']=array('type' => 'apps', 'grouping' => 'settings', 'group' => 'admin23', 'label' => 'admin21','href' => 'zfaces=list&form=payment', 'img' => 'paymentadmin.gif');
$menus['shippingadmin']=array('group' => 'admin23', 'grouping' => 'settings', 'label' => 'admin18','href' => 'page=shippingadmin', 'img' => 'shippingadmin.gif');
$menus['discountadmin']=array('type' => 'apps', 'grouping' => 'settings', 'group' => 'admin23', 'label' => 'admin38','href' => 'zfaces=list&form=discount', 'img' => 'discount.gif');
$menus['taxes']=array('type' => 'apps', 'grouping' => 'settings', 'group' => 'admin23', 'label' => 'admin100','href' => 'zfaces=list&form=taxes', 'img' => 'taxes.png');
$menus['admineditcountries']=array('page' => 'adminedit', 'grouping' => 'settings', 'group' => 'admin23', 'label' => 'admin37','href' => 'page=adminedit&filename=countries.txt&root=1&wysiwyg=0', 'img' => 'countries.gif');
$menus['admineditmain']=array('page' => 'adminedit', 'grouping' => 'files', 'group' => 'admin24', 'label' => 'admin22','href' => 'page=adminedit&filename=main.sql&root=0', 'img' => 'mainadmin.gif');
$menus['templates']=array('type' => 'apps', 'grouping' => 'files', 'group' => 'admin24', 'label' => 'template3','href' => 'zfaces=list&form=template', 'img' => 'template.png');
$menus['adminedit']=array('group' => 'admin24', 'grouping' => 'files', 'label' => 'admin15','href' => 'page=adminedit&filename=conditions.sql&root=0&wysiwyg=0', 'img' => 'conditionsadmin.gif');
$menus['prompts']=array('grouping' => 'files', 'type' => 'apps', 'group' => 'admin24', 'label' => 'admin101','href' => 'zfaces=list&form=prompt', 'img' => 'update.gif');
$menus['errorlogadmin']=array('grouping' => 'info', 'group' => 'admin25', 'label' => 'admin26','href' => 'page=errorlogadmin', 'img' => 'errorlog.gif');
$menus['accesslogadmin']=array('grouping' => 'info', 'group' => 'admin25', 'label' => 'admin31','href' => 'page=accesslogadmin', 'img' => 'accesslog.gif');
$menus['bannedip']=array('grouping' => 'files', 'type' => 'apps', 'group' => 'admin24', 'label' => 'banned1','href' => 'zfaces=list&form=bannedip', 'img' => 'banned.gif');
$menus['admin']=array('grouping' => 'info', 'group' => 'admin25', 'label' => 'admin7','href' => 'page=admin&adminaction=optimize_tables', 'img' => 'optimize.gif');

$menus['advancedsettings']=array('hide' => true, 'grouping' => 'settings', 'type' => 'apps', 'group' => 'admin23', 'label' => 'editsettings93','href' => 'zfaces=form&form=settings&action=edit&no_redirect=1&id=1', 'img' => 'pc.gif');
$menus['customer']=array('type' => 'apps','hide' => true, 'group' => 'my5', 'label' => 'my7','href' => 'page=customer&action=show', 'img' => 'customers.gif');
$menus['orders']=array('hide' => true, 'group' => 'my5', 'label' => 'my8','href' => 'page=orders&id='.$customerid, 'img' => 'orders.gif');
$menus['cart']=array('hide' => true, 'group' => 'my5', 'label' => 'my9','href' => 'page=cart&action=show', 'img' => 'carticon.gif');
$menus['products']=array('hide' => true, 'group' => 'my5', 'label' => 'admin5','href' => 'page=products&action=show', 'img' => 'products.gif');
$menus['readorder']=array('page' => 'readorder', 'hide' => true, 'group' => 'admin23', 'label' => 'details7','href' => 'page=orderadmin', 'img' => 'orders.gif', 'func' => 'CountAllOrders');
$menus['customeradmin']=array('hide' => true,'page' => 'customeradmin', 'group' => 'menu9', 'label' => 'admin3','href' => 'page=customeradmin&action=showcustomers', 'img' => 'customers.gif', 'func' => 'CountCustomers','param' => 'CUSTOMER');
?>