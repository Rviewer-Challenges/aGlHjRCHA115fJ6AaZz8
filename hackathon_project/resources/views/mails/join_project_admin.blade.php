
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="utf-8"> <!-- utf-8 works for most cases -->
	<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldnt be necessary -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
	<meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
	<meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no"> <!-- Tell iOS not to automatically link certain text strings. -->
	<meta name="color-scheme" content="light">
	<meta name="supported-color-schemes" content="light">
	<title></title> <!--   The title tag shows in email notifications, like Android 4.4. -->

	<!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->

	<!-- Web Font / @font-face : BEGIN -->
	<!-- NOTE: If web fonts are not required, lines 23 - 41 can be safely removed. -->

	<!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
	<!--[if mso]>
		<style>
			* {
				font-family: sans-serif !important;
			}
		</style>
	<![endif]-->

	<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
	<!--[if !mso]><!-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Raleway:wght@600&display=swap" rel="stylesheet">
	<!--<![endif]-->

	<!-- Web Font / @font-face : END -->

	<!-- CSS Reset : BEGIN -->
	<style>

		/* What it does: Tells the email client that only light styles are provided but the client can transform them to dark. A duplicate of meta color-scheme meta tag above. */
		:root {
		  color-scheme: light;
		  supported-color-schemes: light;
		}

		/* What it does: Remove spaces around the email design added by some email clients. */
		/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		/* What it does: forces Samsung Android mail clients to use the entire viewport */
		#MessageViewBody, #MessageWebViewDiv{
			width: 100% !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode:bicubic;
		}

		/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
		a {
			text-decoration: none;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		a[x-apple-data-detectors],  /* iOS */
		.unstyle-auto-detected-links a,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		/* What it does: Prevents Gmail from changing the text color in conversation threads. */
		.im {
			color: inherit !important;
		}

		/* If the above doesn't work, add a .g-img class to any image in question. */
		img.g-img + div {
			display: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you'd like to fix */

		/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
		@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
			u ~ div .email-container {
				min-width: 320px !important;
			}
		}
		/* iPhone 6, 6S, 7, 8, and X */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
			u ~ div .email-container {
				min-width: 375px !important;
			}
		}
		/* iPhone 6+, 7+, and 8+ */
		@media only screen and (min-device-width: 414px) {
			u ~ div .email-container {
				min-width: 414px !important;
			}
		}

	</style>
	<!-- CSS Reset : END -->

	<!-- Progressive Enhancements : BEGIN -->
	<style>

		/* What it does: Hover styles for buttons */
		.button-td,
		.button-a {
			transition: all 100ms ease-in;
		}
		.button-td-primary:hover,
		.button-a-primary:hover {
			background: #555555 !important;
			border-color: #555555 !important;
		}

		/* Media Queries */
		@media screen and (max-width: 600px) {

			/* What it does: Adjust typography on small screens to improve readability */
			.email-container p {
				font-size: 17px !important;
			}

		}

	</style>
	<!-- Progressive Enhancements : END -->

</head>
<!--
	The email background color (#222222) is defined in three places:
	1. body tag: for most email clients
	2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
	3. mso conditional: For Windows 10 Mail
-->
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #ffffff;">
	<center role="article" aria-roledescription="email" lang="en" style="width: 100%; background-color: #ffffff;">
	<!--[if mso | IE]>
	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #ffffff;">
	<tr>
	<td>
	<![endif]-->

		<!-- Visually Hidden Preheader Text : BEGIN -->
		<div style="max-height:0; overflow:hidden; mso-hide:all;" aria-hidden="true">
		</div>
		<!-- Visually Hidden Preheader Text : END -->

		<!-- Create white space after the desired preview text so email clients don’t pull other distracting text into the inbox preview. Extend as necessary. -->
		<!-- Preview Text Spacing Hack : BEGIN -->
		<div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
			&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
		</div>
		<!-- Preview Text Spacing Hack : END -->

		<!--
			Set the email width. Defined in two places:
			1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
			2. MSO tags for Desktop Windows Outlook enforce a 600px width.
		-->
		<div style="max-width: 600px; margin: 0 auto;" class="email-container">
			<!--[if mso]>
			<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600">
			<tr>
			<td>
			<![endif]-->

			<!-- Email Body : BEGIN -->
			<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
				<!-- Email Header : BEGIN -->
				<tr>
					<td style="padding: 20px 0; text-align: center">
						<a href="{{ route('home') }}">
							UNION TASK
						</a>
					</td>
				</tr>
				<!-- Email Header : END -->

				<!-- Clear Spacer : BEGIN -->
				<tr>
					<td aria-hidden="true" height="40" style="font-size: 0px; line-height: 0px;">
						&nbsp;
					</td>
				</tr>
				<!-- Clear Spacer : END -->

				<!-- 1 Column Text + Button : BEGIN -->
				<tr>
					<td style="background-color: #ffffff;">
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td style="padding: 20px; font-family: 'Playfair Display', serif; font-size: 18px; line-height: 26px; color: #555555;">
									<h1 style="margin: 0 0 10px 0; font-family: 'Raleway', sans-serif; font-size: 25px; line-height: 30px; color: #333333; font-weight: 600;">Hola, {{ $name }}</h1>
                                    <br>
									<p style="margin: 0;">¡Tienes una nueva solicitud!</p>
                                    <br>
                                    <p style="margin: 0;">Un desarrollador se ha interesado por tu proyecto {{$name_project}} y quiere unirse para ayudarte a llevarlo a cabo.</p>
                                    <br>
                                    <p style="margin: 0;">Para contactar con él nos ha dejado este correo electrónico, por favor ponte en contacto con él y valida si es apto para trabajar junto a tí.</p>
                                    <br>
                                    <p style="margin: 0;"><strong>Correo electrónico de contacto:</strong> {{$user_email}}</p>
                                    <br>
                                    <p style="margin: 0;">Aquí tienes las respuestas de solicitud que ha respondido tu futuro ayudant:</p>
                                    <br>
                                    <p style="margin: 0;"><strong>¿Por qué quieres unirte al proyecto?</strong></p>
                                    <br>
                                    <p style="margin: 0;">{{$why}}</p>
                                    <br>
                                    <p style="margin: 0;"><strong>¿Qué aportaras al proyecto?</strong></p>
                                    <br>
                                    <p style="margin: 0;">{{$share}}</p>
                                    <br>
                                    <p style="margin: 0;"><strong>¿Tienes experiencia con las tecnologías que solicitan, o similares?</strong></p>
                                    <br>
                                    <p style="margin: 0;">{{$experience}}</p>
                                    <br>
                                    <br>
                                    <p style="margin: 0;"><strong>Recuerda:</strong> Podrás aceptar la solicitud iniciando sesión en la plataforma. Y poder gestionar a los demás miembros del equipo, pudiendo eliminarlos si fuese necesario.</p>
                                    <br>
								</td>
							</tr>
							<!-- Clear Spacer : BEGIN -->
							<tr>
								<td aria-hidden="true" height="40" style="font-size: 0px; line-height: 0px;">
									&nbsp;
								</td>
							</tr>
							<!-- Clear Spacer : END -->
						</table>
					</td>
				</tr>
				<!-- 1 Column Text + Button : END -->


				<!-- Clear Spacer : BEGIN -->
				<tr>
					<td aria-hidden="true" height="40" style="font-size: 0px; line-height: 0px;">
						&nbsp;
					</td>
				</tr>
				<!-- Clear Spacer : END -->

			</table>
			<!-- Email Body : END -->



			<!--[if mso]>
			</td>
			</tr>
			</table>
			<![endif]-->
		</div>

	<!--[if mso | IE]>
	</td>
	</tr>
	</table>
	<![endif]-->
	</center>
</body>
</html>
