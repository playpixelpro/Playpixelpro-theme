(function () {
	'use strict';

	// Mobile Navigation Toggle
	var toggle = document.querySelector('.menu-toggle');
	var nav = document.querySelector('.main-navigation');

	if (toggle && nav) {
		toggle.addEventListener('click', function () {
			var isOpen = nav.classList.toggle('is-open');
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		});
	}

	// Download Sequence Timer
	var downloadData = window.pppDownload;
	if (downloadData) {
		var countEl = document.getElementById('download-countdown');
		var barEl = document.getElementById('download-progress');
		var buttonEl = document.getElementById('download-button');

		if (countEl && barEl && buttonEl) {
			var totalSeconds = parseInt(downloadData.seconds, 10) || 10;
			var secondsLeft = totalSeconds;

			countEl.textContent = '[ download available in ' + secondsLeft + 's ]';

			var timer = setInterval(function () {
				secondsLeft--;

				if (secondsLeft > 0) {
					countEl.textContent = '[ download available in ' + secondsLeft + 's ]';
					var progressPct = ((totalSeconds - secondsLeft) / totalSeconds) * 100;
					barEl.style.width = progressPct + '%';
				} else {
					clearInterval(timer);
					countEl.textContent = '[ download ready ]';
					barEl.style.width = '100%';
					buttonEl.hidden = false;
				}
			}, 1000);
		}
	}

	// Micro-interaction for Sidebar CPU Load Bar
	var progressBar = document.getElementById('dynamic-progress');
	if (progressBar) {
		setInterval(function () {
			var currentWidth = parseFloat(progressBar.style.width) || 15;
			var fluctuation = (Math.random() - 0.5) * 6;
			var newWidth = Math.min(Math.max(currentWidth + fluctuation, 6), 35);
			progressBar.style.width = newWidth + '%';
		}, 1500);
	}

	// Contact Form Terminal Transmission AJAX Handler
	var contactForm = document.getElementById('contact-terminal-form');
	if (contactForm) {
		contactForm.addEventListener('submit', function (e) {
			e.preventDefault();

			var submitBtn = document.getElementById('contact-submit-btn');
			var outputBox = document.getElementById('contact-cli-output');
			var nonceVal  = contactForm.querySelector('input[name="contact_nonce"]').value;
			var username  = contactForm.querySelector('input[name="username"]').value;
			var email     = contactForm.querySelector('input[name="email"]').value;
			var message   = contactForm.querySelector('textarea[name="message"]').value;
			var subscribe = contactForm.querySelector('input[name="subscribe"]').checked ? 1 : 0;

			var botToken = '';
			var cfTurnstile = contactForm.querySelector('input[name="cf-turnstile-response"]');
			var gRecaptcha  = contactForm.querySelector('textarea[name="g-recaptcha-response"]') || contactForm.querySelector('input[name="g-recaptcha-response"]');
			if (cfTurnstile) {
				botToken = cfTurnstile.value;
			} else if (gRecaptcha) {
				botToken = gRecaptcha.value;
			}

			if (submitBtn) {
				submitBtn.disabled = true;
				submitBtn.innerHTML = '<span>TRANSMITTING_PACKET...</span>';
			}

			if (outputBox) {
				outputBox.style.display = 'block';
				outputBox.innerHTML = '&gt; INITIALIZING_SOCKET_CONNECTION... [PENDING]';
			}

			var formData = new FormData();
			formData.append('action', 'ppp_send_contact_packet');
			formData.append('security', nonceVal);
			formData.append('username', username);
			formData.append('email', email);
			formData.append('message', message);
			formData.append('subscribe', subscribe);
			formData.append('bot_token', botToken);

			var ajaxUrl = (window.pppData && window.pppData.ajaxUrl) ? window.pppData.ajaxUrl : '/wp-admin/admin-ajax.php';

			fetch(ajaxUrl, {
				method: 'POST',
				body: formData
			})
			.then(function (res) { return res.json(); })
			.then(function (data) {
				if (data.success) {
					outputBox.innerHTML = '&gt; ' + data.data.message;
					contactForm.reset();
				} else {
					outputBox.innerHTML = '&gt; ' + (data.data ? data.data.message : '[ERROR_0x99]: TRANSMISSION_FAILED');
				}
			})
			.catch(function () {
				outputBox.innerHTML = '&gt; [ERROR_0x99]: SERVER_UNREACHABLE';
			})
			.finally(function () {
				if (submitBtn) {
					submitBtn.disabled = false;
					submitBtn.innerHTML = '<span>SEND_PACKET</span>';
				}
			});
		});
	}
	// Social Share Buttons — URLs are built in JS to bypass ad-blocker
	// cosmetic filters that hide elements whose href matches known share domains.
	document.querySelectorAll('.ppp-share-btn').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var platform = this.getAttribute('data-platform');
			var url      = this.getAttribute('data-url')  || '';
			var text     = this.getAttribute('data-text') || '';
			var shareUrl = '';

			if (platform === 'twitter') {
				shareUrl = 'https://x.com/intent/tweet?text=' + text + '&url=' + url;
			} else if (platform === 'facebook') {
				shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
			} else if (platform === 'linkedin') {
				shareUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' + url;
			} else if (platform === 'reddit') {
				shareUrl = 'https://reddit.com/submit?url=' + url + '&title=' + text;
			}

			if (shareUrl) {
				var w = 600, h = 500;
				var top  = Math.round(screen.height / 2 - h / 2);
				var left = Math.round(screen.width  / 2 - w / 2);
				window.open(shareUrl, 'pppShare', 'width=' + w + ',height=' + h + ',top=' + top + ',left=' + left);
			}
		});
	});

	// Hero Terminal Live Typing Animation
	function initHeroTerminalTyping() {
		var terminal = document.getElementById('hero-terminal-screen');
		if (!terminal) return;

		var lines = terminal.querySelectorAll('.typing-line');
		if (!lines.length) return;

		lines.forEach(function (line) {
			var textEl = line.querySelector('.typing-text');
			if (!textEl) return;

			var delay = parseInt(line.getAttribute('data-delay'), 10) || 0;
			var fullText = textEl.getAttribute('data-text') || textEl.textContent || '';
			var hasCursor = line.getAttribute('data-cursor') === 'true';
			var existingCursor = line.querySelector('.cli-cursor');

			if (hasCursor && existingCursor) {
				existingCursor.style.display = 'none';
			}

			textEl.textContent = '';

			setTimeout(function () {
				if (hasCursor && existingCursor) {
					existingCursor.style.display = 'inline-block';
				}

				var charIdx = 0;
				function typeChar() {
					if (charIdx < fullText.length) {
						textEl.textContent = fullText.substring(0, charIdx + 1);
						charIdx++;
						var jitter = 18 + Math.random() * 22;
						setTimeout(typeChar, jitter);
					} else {
						textEl.textContent = fullText;
						if (hasCursor && existingCursor) {
							existingCursor.style.display = 'inline-block';
						}
					}
				}

				typeChar();
			}, delay);
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initHeroTerminalTyping);
	} else {
		initHeroTerminalTyping();
	}
}());