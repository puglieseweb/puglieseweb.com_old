package com.puglieseweb.server.gae;

import com.google.appengine.api.users.User;

/**
 * Service object that reduces the visible api of
 * {@link com.google.appengine.api.users.UserService}. Needed to work around a
 * limitation of RequestFactory, which cannot yet handle overloaded service
 * methods.
 */
public interface UserServiceWrapper {
	public String createLoginURL(String destinationURL);

	public String createLogoutURL(String destinationURL);

	public User getCurrentUser();
}
