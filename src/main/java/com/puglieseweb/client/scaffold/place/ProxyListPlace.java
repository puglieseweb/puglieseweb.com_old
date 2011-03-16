package com.puglieseweb.client.scaffold.place;

import com.google.gwt.place.shared.Place;
import com.google.gwt.place.shared.PlaceTokenizer;
import com.google.gwt.place.shared.Prefix;
import com.google.gwt.requestfactory.shared.EntityProxy;
import com.google.gwt.requestfactory.shared.RequestFactory;

/**
 * A place in the app that deals with lists of {@link EntityProxy}.
 */
public class ProxyListPlace extends Place {

	/**
	 * Tokenizer.
	 */
	@Prefix("l")
	public static class Tokenizer implements PlaceTokenizer<ProxyListPlace> {
		private final RequestFactory requests;

		public Tokenizer(RequestFactory requests) {
			this.requests = requests;
		}

		public ProxyListPlace getPlace(String token) {
			return new ProxyListPlace(requests.getProxyClass(token));
		}

		public String getToken(ProxyListPlace place) {
			return requests.getHistoryToken(place.getProxyClass());
		}
	}

	private final Class<? extends EntityProxy> proxyType;

	public ProxyListPlace(Class<? extends EntityProxy> proxyType) {
		this.proxyType = proxyType;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj) {
			return true;
		}
		if (obj == null) {
			return false;
		}
		if (getClass() != obj.getClass()) {
			return false;
		}
		ProxyListPlace other = (ProxyListPlace) obj;
		if (!proxyType.equals(other.proxyType)) {
			return false;
		}
		return true;
	}

	public Class<? extends EntityProxy> getProxyClass() {
		return proxyType;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + proxyType.hashCode();
		return result;
	}

	@Override
	public String toString() {
		return "ProxyListPlace [proxyType=" + proxyType + "]";
	}
}
