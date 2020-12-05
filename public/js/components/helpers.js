export const getScrollPosition = (el = window) => ({
  	x: el.pageXOffset !== undefined ? el.pageXOffset : el.scrollLeft,
  	y: el.pageYOffset !== undefined ? el.pageYOffset : el.scrollTop
});

export const getImages = (el, includeDuplicates = false) => {
    const images = [...el.getElementsByTagName('img')].map(img => img.getAttribute('src'));
    return includeDuplicates ? images : [...new Set(images)];
};

export const formDataToJson = (form) => Object.fromEntries(new FormData(form));

export const displayResponseMessage = (element, classesToAdd, classesToRemove, html) => {
    addClasses(element, classesToAdd);
    removeClasses(element, classesToRemove);
    element.innerHTML = html;
}

export const elementContains = (parent, child) => {
	return parent !== child && parent.contains(child);
}

export const elementIsVisibleInViewport = (el, partiallyVisible = false) => {
    const { top, left, bottom, right } = el.getBoundingClientRect();
    const { innerHeight, innerWidth } = window;
    return partiallyVisible
    ? ((top > 0 && top < innerHeight) || (bottom > 0 && bottom < innerHeight)) &&
        ((left > 0 && left < innerWidth) || (right > 0 && right < innerWidth))
    : top >= 0 && left >= 0 && bottom <= innerHeight && right <= innerWidth;
};

export const scrollToTop = () => {
	const c = document.documentElement.scrollTop || document.body.scrollTop;
	if (c > 0) {
	    window.requestAnimationFrame(scrollToTop);
	    window.scrollTo(0, c - c / 8);
	}
};

export const addClasses = (element, classes) => {
	if (element.length || element !== undefined) {
		classes.forEach((className) => {
			element.classList.add(className);
		});
	}
}

export const removeClasses = (element, classes) => {
    if (element.length || element !== undefined) {
        classes.forEach((className) => {
            element.classList.remove(className);
        });
    }
}

export const getURLParameters = (url) =>
  (url.match(/([^?=&]+)(=([^&]*))/g) || []).reduce(
    (a, v) => ((a[v.slice(0, v.indexOf('='))] = v.slice(v.indexOf('=') + 1)), a),
    {}
  );

export const triggerEvent = (el, eventType, detail) => {
    el.dispatchEvent(
    	new CustomEvent(eventType, { detail })
    );
}

export const formDataToObject = (form) =>
    Array.from(new FormData(form)).reduce(
	    (acc, [key, value]) => ({
	        ...acc,
	        [key]: value
	    }),
	    {}
    );

export const httpGet = (url, callback, err = console.error) => {
    const request = new XMLHttpRequest();
    request.open('GET', url, true);
    request.onload = () => callback(request.responseText);
    request.onerror = () => err(request);
    request.send();
}; 

export const httpPost = (url, data, success, error) => {
    const request = new XMLHttpRequest();
    request.open('POST', url, true);
    request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    request.onload = () => success(request.responseText);
    request.onerror = () => error(request);
    request.send(data);
};

export const handleButtonSpinner = (button, spinner) => {
	button.hasAttribute('disabled') ? button.removeAttribute('disabled') : button.setAttribute('disabled', true);
    spinner.classList.toggle('d-none');
}

export const handleInputErrors = (input, span, message = '') => {
    input.classList.add('is-invalid');
    span.innerHTML = message;
    input.onfocus = () => {
    	input.classList.remove('is-invalid');
        span.innerHTML = '';
    };
}

export const detectDeviceType = () =>
  /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? 'Mobile' : 'Desktop';
