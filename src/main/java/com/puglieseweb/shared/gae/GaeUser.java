package com.puglieseweb.shared.gae;

import com.google.gwt.requestfactory.shared.ProxyForName;
import com.google.gwt.requestfactory.shared.ValueProxy;

/**
 * Client visible proxy of Google AppEngine User class.
 */
@ProxyForName("com.google.appengine.api.users.User")
public interface GaeUser extends ValueProxy {
	String getNickname();

	String getEmail();
}
