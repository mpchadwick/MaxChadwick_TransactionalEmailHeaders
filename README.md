# MaxChadwick_TransactionalEmailHeaders

A simple Magento extension for adding MIME headers to transactional emails.

This extension currently only supports [Mailgun Campaigns](http://documentation.mailgun.com/user_manual.html#campaign-analytics), and adds an additional **Template Mailgun Campaign** field to the Edit Email Template screen.

The value will then be added as the `X-Mailgun-Campaign-Id` header each time that email template is sent.