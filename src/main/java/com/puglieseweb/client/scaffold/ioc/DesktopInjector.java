package com.puglieseweb.client.scaffold.ioc;

import com.puglieseweb.client.scaffold.ScaffoldDesktopApp;
import com.google.gwt.inject.client.GinModules;

@GinModules(value = {ScaffoldModule.class})
public interface DesktopInjector extends ScaffoldInjector {

	ScaffoldDesktopApp getScaffoldApp();
}