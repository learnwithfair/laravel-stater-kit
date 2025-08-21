<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Your OTP code: {{ $code }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Preheader (hidden preview text in inbox) -->
  <style>
    .preheader { display:none !important; visibility:hidden; mso-hide:all; font-size:1px; line-height:1px; color:#ffffff; max-height:0; max-width:0; opacity:0; overflow:hidden; }
    @media screen and (max-width: 600px) {
      .container { width: 100% !important; }
      .px-24 { padding-left:16px !important; padding-right:16px !important; }
    }
  </style>
</head>
<body style="margin:0; padding:0; background:#FAFAFA; font-family:Arial, Helvetica, sans-serif; color:#0A0A0A;">
  <div class="preheader">Your OTP  code is {{ $code }}. It expires in {{ $ttl }} minutes.</div>

  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FAFAFA;">
    <tr>
      <td align="center" style="padding:24px 12px;">
        <!-- Card -->
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" class="container" style="width:600px; max-width:600px; background:#FFFFFF; border-radius:12px; overflow:hidden; border:1px solid #eee;">
          <!-- Top accent -->
          <tr>
            <td style="height:6px; background:#D4AF37; font-size:0; line-height:0;">&nbsp;</td>
          </tr>

          <!-- Header / Brand -->
          <tr>
            <td class="px-24" style="padding:20px 24px 0 24px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td align="left" style="padding-bottom:16px;">
                    <img src="{{ $logoUrl ?? url('/assets/img/logo/logo.png') }}"
                         alt="Logo"
                         width="48"
                         height="48"
                         style="display:block; border:0; outline:none; text-decoration:none; border-radius:12px;">
                  </td>
                  <td align="right" style="font-size:12px; color:#606060;">
                    {{ $sentAt ?? now()->format('M d, Y H:i') }}
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Title -->
          <tr>
            <td class="px-24" style="padding:0 24px;">
              <h1 style="margin:0 0 8px; font-size:22px; font-weight:700; line-height:1.3;">
                Your Verification code: {{ $code }}
              </h1>
              <p style="margin:0 0 16px; font-size:14px; color:#606060;">
                Use this one-time code to continue next.
              </p>
            </td>
          </tr>

          <!-- OTP Block -->
          <tr>
            <td class="px-24" align="center" style="padding:12px 24px 8px 24px;">
              <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:8px auto 16px;">
                <tr>
                  <td align="center"
                      style="font-size:28px; font-weight:700; letter-spacing:6px; color:#0A0A0A; padding:14px 24px; border:2px dashed #D4AF37; border-radius:10px;">
                    {{ $code }}
                  </td>
                </tr>
              </table>
              <p style="margin:0; font-size:13px; color:#606060;">
                This code expires in <strong>{{ $ttl }} minutes</strong>. For your security, don’t share it with anyone.
              </p>
            </td>
          </tr>

          <!-- Help / Support -->
          <tr>
            <td class="px-24" align="center" style="padding:20px 24px 8px;">
              <!-- Button -->
              <a href="{{ $supportUrl }}"
                 style="display:inline-block; text-decoration:none; background:#2E7D32; color:#FFFFFF; font-weight:600; font-size:14px; padding:12px 18px; border-radius:8px; border:1px solid #1f5723;">
                Need help? Contact Support
              </a>
              <div style="font-size:12px; color:#606060; margin-top:8px;">
                or visit: <a href="{{ $supportUrl }}" style="color:#2E7D32; text-decoration:underline;">{{ $supportUrl }}</a>
              </div>
            </td>
          </tr>

          <!-- Security Note -->
          <tr>
            <td class="px-24" style="padding:16px 24px 8px;">
              <p style="margin:0; font-size:12px; color:#606060;">
                Didn’t request this code? You can safely ignore this email. Your account remains protected.
              </p>
            </td>
          </tr>

          <!-- Divider -->
          <tr>
            <td style="padding:12px 24px 0;">
              <hr style="border:none; border-top:1px solid #eee; margin:0;">
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td class="px-24" align="center" style="padding:16px 24px 22px;">
              <p style="margin:0 0 4px; font-size:12px; color:#606060;">
                © {{ date('Y') }} {{ $appName ?? config('app.name', 'Laravel') }}. All rights reserved.
              </p>
              <p style="margin:0; font-size:11px; color:#606060;">
                This is an automated message. Please don’t reply to this email.
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
