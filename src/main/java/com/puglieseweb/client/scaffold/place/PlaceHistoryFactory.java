package com.puglieseweb.client.scaffold.place;

import com.puglieseweb.client.managed.request.ApplicationRequestFactory;
import com.google.gwt.place.shared.PlaceTokenizer;
import com.google.inject.Inject;

public class PlaceHistoryFactory {

	private final ProxyListPlace.Tokenizer proxyListPlaceTokenizer;
	private final ProxyPlace.Tokenizer proxyPlaceTokenizer;

	@Inject
	public PlaceHistoryFactory(ApplicationRequestFactory requestFactory) {
		this.proxyListPlaceTokenizer = new ProxyListPlace.Tokenizer(requestFactory);
		this.proxyPlaceTokenizer = new ProxyPlace.Tokenizer(requestFactory);
	}

	public PlaceTokenizer<ProxyListPlace> getProxyListPlaceTokenizer() {
		return proxyListPlaceTokenizer;
	}

	public PlaceTokenizer<ProxyPlace> getProxyPlaceTokenizer() {
		return proxyPlaceTokenizer;
	}

}
