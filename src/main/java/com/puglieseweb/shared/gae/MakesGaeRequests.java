package com.puglieseweb.shared.gae;

/**
 * Implemented by {@link com.google.gwt.requestfactory.shared.RequestFactory}s
 * that vend AppEngine requests.
 */
public interface MakesGaeRequests {

	/**
	 * Return a request selector.
	 */
	GaeUserServiceRequest userServiceRequest();
}
