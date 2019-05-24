var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

/* src/PNotifyReference.html generated by Svelte v2.16.1 */
var PNotifyReference = function (PNotify) {
	"use strict";

	PNotify = PNotify && PNotify.__esModule ? PNotify["default"] : PNotify;

	function data() {
		return _extends({
			'_notice': null, // The PNotify notice.
			'_options': {}, // The options for the notice.
			'_mouseIsIn': false
		}, PNotify.modules.Reference.defaults);
	};

	var methods = {
		// This method is called from the core to give us our actual options.
		// Until it is called, our options will just be the defaults.
		initModule: function initModule(options) {
			var _this = this;

			// Set our options.
			this.set(options);
			// Now that the notice is available to us, we can listen to events fired
			// from it.

			var _get = this.get(),
			    _notice = _get._notice;

			_notice.on('mouseenter', function () {
				return _this.set({ '_mouseIsIn': true });
			});
			_notice.on('mouseleave', function () {
				return _this.set({ '_mouseIsIn': false });
			});
		},
		doSomething: function doSomething() {
			// Spin the notice around.
			var curAngle = 0;

			var _get2 = this.get(),
			    _notice = _get2._notice;

			var timer = setInterval(function () {
				curAngle += 10;
				if (curAngle === 360) {
					curAngle = 0;
					clearInterval(timer);
				}
				_notice.refs.elem.style.transform = 'rotate(' + curAngle + 'deg)';
			}, 20);
		},


		// I have nothing to put in these, just showing you that they exist. You
		// won't need to include them if you aren't using them.
		update: function update() {
			// Called when the notice is updating its options.
		},
		beforeOpen: function beforeOpen() {
			// Called before the notice is opened.
		},
		afterOpen: function afterOpen() {
			// Called after the notice is opened.
		},
		beforeClose: function beforeClose() {
			// Called before the notice is closed.
		},
		afterClose: function afterClose() {
			// Called after the notice is closed.
		},
		beforeDestroy: function beforeDestroy() {
			// Called before the notice is destroyed.
		},
		afterDestroy: function afterDestroy() {
			// Called after the notice is destroyed.
		}
	};

	function oncreate() {
		// This is the second way to init a module. Because we put markup in the
		// template, we have to fire this event to tell the core that we are ready
		// to receive our options.
		this.fire('init', { module: this });
	};

	function setup(Component) {
		// This is the key you use for registering your module with PNotify.
		Component.key = 'Reference';

		// This if the default values of your options.
		Component.defaults = {
			// Provide a thing for stuff. Turned off by default.
			putThing: false,
			// If you are displaying any text, you should use a labels options to
			// support internationalization.
			labels: {
				text: 'Spin Around'
			}
		};

		// This is the first way to init a module. If you aren't placing any
		// markup in the template, you would do this.
		// Component.init = (_notice) => {
		//   return new Component({target: document.body, data: {_notice}});
		// };

		// Register the module with PNotify.
		PNotify.modules.Reference = Component;
		// Append our markup to the container.
		PNotify.modulesAppendContainer.push(Component);

		// This is where you would add any styling or icons classes you are using in your code.
		_extends(PNotify.icons.brighttheme, {
			athing: 'bt-icon bt-icon-refresh'
		});
		_extends(PNotify.icons.bootstrap3, {
			athing: 'glyphicon glyphicon-refresh'
		});
		_extends(PNotify.icons.fontawesome4, {
			athing: 'fa fa-refresh'
		});
		_extends(PNotify.icons.fontawesome5, {
			athing: 'fas fa-sync'
		});
		if (!PNotify.icons.material) {
			PNotify.icons.material = {};
		}
		_extends(PNotify.icons.material, {
			athing: 'material-icons pnotify-material-icon-refresh'
		});
	};

	function add_css() {
		var style = createElement("style");
		style.id = 'svelte-1qy4b0e-style';
		style.textContent = ".ui-pnotify-reference-button.svelte-1qy4b0e{float:right}.ui-pnotify-reference-clearing.svelte-1qy4b0e{clear:right;line-height:0}";
		append(document.head, style);
	}

	function create_main_fragment(component, ctx) {
		var if_block_anchor;

		var if_block = ctx.putThing && create_if_block(component, ctx);

		return {
			c: function c() {
				if (if_block) if_block.c();
				if_block_anchor = createComment();
			},
			m: function m(target, anchor) {
				if (if_block) if_block.m(target, anchor);
				insert(target, if_block_anchor, anchor);
			},
			p: function p(changed, ctx) {
				if (ctx.putThing) {
					if (if_block) {
						if_block.p(changed, ctx);
					} else {
						if_block = create_if_block(component, ctx);
						if_block.c();
						if_block.m(if_block_anchor.parentNode, if_block_anchor);
					}
				} else if (if_block) {
					if_block.d(1);
					if_block = null;
				}
			},
			d: function d(detach) {
				if (if_block) if_block.d(detach);
				if (detach) {
					detachNode(if_block_anchor);
				}
			}
		};
	}

	// (2:0) {#if putThing}
	function create_if_block(component, ctx) {
		var button,
		    i,
		    i_class_value,
		    text0,
		    text1_value = ctx.labels.text,
		    text1,
		    button_disabled_value,
		    text2,
		    div;

		function click_handler(event) {
			component.doSomething();
		}

		return {
			c: function c() {
				button = createElement("button");
				i = createElement("i");
				text0 = createText("Â ");
				text1 = createText(text1_value);
				text2 = createText("\n  \n  ");
				div = createElement("div");
				i.className = i_class_value = "" + ctx._notice.get()._icons.athing + " svelte-1qy4b0e";
				addListener(button, "click", click_handler);
				button.className = "ui-pnotify-reference-button btn btn-default svelte-1qy4b0e";
				button.type = "button";
				button.disabled = button_disabled_value = !ctx._mouseIsIn;
				div.className = "ui-pnotify-reference-clearing svelte-1qy4b0e";
			},
			m: function m(target, anchor) {
				insert(target, button, anchor);
				append(button, i);
				append(button, text0);
				append(button, text1);
				component.refs.thingElem = button;
				insert(target, text2, anchor);
				insert(target, div, anchor);
			},
			p: function p(changed, ctx) {
				if (changed._notice && i_class_value !== (i_class_value = "" + ctx._notice.get()._icons.athing + " svelte-1qy4b0e")) {
					i.className = i_class_value;
				}

				if (changed.labels && text1_value !== (text1_value = ctx.labels.text)) {
					setData(text1, text1_value);
				}

				if (changed._mouseIsIn && button_disabled_value !== (button_disabled_value = !ctx._mouseIsIn)) {
					button.disabled = button_disabled_value;
				}
			},
			d: function d(detach) {
				if (detach) {
					detachNode(button);
				}

				removeListener(button, "click", click_handler);
				if (component.refs.thingElem === button) component.refs.thingElem = null;
				if (detach) {
					detachNode(text2);
					detachNode(div);
				}
			}
		};
	}

	function PNotifyReference(options) {
		var _this2 = this;

		init(this, options);
		this.refs = {};
		this._state = assign(data(), options.data);
		this._intro = true;

		if (!document.getElementById("svelte-1qy4b0e-style")) add_css();

		this._fragment = create_main_fragment(this, this._state);

		this.root._oncreate.push(function () {
			oncreate.call(_this2);
			_this2.fire("update", { changed: assignTrue({}, _this2._state), current: _this2._state });
		});

		if (options.target) {
			this._fragment.c();
			this._mount(options.target, options.anchor);

			flush(this);
		}
	}

	assign(PNotifyReference.prototype, {
		destroy: destroy,
		get: get,
		fire: fire,
		on: on,
		set: set,
		_set: _set,
		_stage: _stage,
		_mount: _mount,
		_differs: _differs
	});
	assign(PNotifyReference.prototype, methods);

	PNotifyReference.prototype._recompute = noop;

	setup(PNotifyReference);

	function createElement(name) {
		return document.createElement(name);
	}

	function append(target, node) {
		target.appendChild(node);
	}

	function createComment() {
		return document.createComment('');
	}

	function insert(target, node, anchor) {
		target.insertBefore(node, anchor);
	}

	function detachNode(node) {
		node.parentNode.removeChild(node);
	}

	function createText(data) {
		return document.createTextNode(data);
	}

	function addListener(node, event, handler, options) {
		node.addEventListener(event, handler, options);
	}

	function setData(text, data) {
		text.data = '' + data;
	}

	function removeListener(node, event, handler, options) {
		node.removeEventListener(event, handler, options);
	}

	function init(component, options) {
		component._handlers = blankObject();
		component._slots = blankObject();
		component._bind = options._bind;
		component._staged = {};

		component.options = options;
		component.root = options.root || component;
		component.store = options.store || component.root.store;

		if (!options.root) {
			component._beforecreate = [];
			component._oncreate = [];
			component._aftercreate = [];
		}
	}

	function assign(tar, src) {
		for (var k in src) {
			tar[k] = src[k];
		}return tar;
	}

	function assignTrue(tar, src) {
		for (var k in src) {
			tar[k] = 1;
		}return tar;
	}

	function flush(component) {
		component._lock = true;
		callAll(component._beforecreate);
		callAll(component._oncreate);
		callAll(component._aftercreate);
		component._lock = false;
	}

	function destroy(detach) {
		this.destroy = noop;
		this.fire('destroy');
		this.set = noop;

		this._fragment.d(detach !== false);
		this._fragment = null;
		this._state = {};
	}

	function get() {
		return this._state;
	}

	function fire(eventName, data) {
		var handlers = eventName in this._handlers && this._handlers[eventName].slice();
		if (!handlers) return;

		for (var i = 0; i < handlers.length; i += 1) {
			var handler = handlers[i];

			if (!handler.__calling) {
				try {
					handler.__calling = true;
					handler.call(this, data);
				} finally {
					handler.__calling = false;
				}
			}
		}
	}

	function on(eventName, handler) {
		var handlers = this._handlers[eventName] || (this._handlers[eventName] = []);
		handlers.push(handler);

		return {
			cancel: function cancel() {
				var index = handlers.indexOf(handler);
				if (~index) handlers.splice(index, 1);
			}
		};
	}

	function set(newState) {
		this._set(assign({}, newState));
		if (this.root._lock) return;
		flush(this.root);
	}

	function _set(newState) {
		var oldState = this._state,
		    changed = {},
		    dirty = false;

		newState = assign(this._staged, newState);
		this._staged = {};

		for (var key in newState) {
			if (this._differs(newState[key], oldState[key])) changed[key] = dirty = true;
		}
		if (!dirty) return;

		this._state = assign(assign({}, oldState), newState);
		this._recompute(changed, this._state);
		if (this._bind) this._bind(changed, this._state);

		if (this._fragment) {
			this.fire("state", { changed: changed, current: this._state, previous: oldState });
			this._fragment.p(changed, this._state);
			this.fire("update", { changed: changed, current: this._state, previous: oldState });
		}
	}

	function _stage(newState) {
		assign(this._staged, newState);
	}

	function _mount(target, anchor) {
		this._fragment[this._fragment.i ? 'i' : 'm'](target, anchor || null);
	}

	function _differs(a, b) {
		return a != a ? b == b : a !== b || a && (typeof a === "undefined" ? "undefined" : _typeof(a)) === 'object' || typeof a === 'function';
	}

	function noop() {}

	function blankObject() {
		return Object.create(null);
	}

	function callAll(fns) {
		while (fns && fns.length) {
			fns.shift()();
		}
	}
	return PNotifyReference;
}(PNotify);
//# sourceMappingURL=PNotifyReference.js.map