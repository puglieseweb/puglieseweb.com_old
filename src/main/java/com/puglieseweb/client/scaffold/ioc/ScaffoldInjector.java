package com.puglieseweb.client.scaffold.ioc;

import com.puglieseweb.client.scaffold.ScaffoldApp;
import com.google.gwt.inject.client.Ginjector;

public interface ScaffoldInjector extends Ginjector {

	ScaffoldApp getScaffoldApp();
}
