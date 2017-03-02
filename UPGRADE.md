UPGRADE
=======

Upgrading from 2.x to 3.0
-------------------------

Dropped support for the `2.x` releases of the `php-xapi/serializer` package.

This version also implements the support of the exceptions added in the `3.0` release
of the `php-xapi/serializer` package.

Upgrading from 1.x to 2.0
-------------------------

Added support for deserializing raw attachment contents. In order to achieve this
an optional `$attachments` argument has been added to the `deserializeStatement()`
and `deserializeStatements()` methods of the `StatementSerializer` class as well
as to the `StatementResultSerializer::deserializeStatementResult()`.

When being passed, this argument must be an array mapping SHA-2 hashes to an
array which in turn maps the `type` and `content` keys to the attachment's
content type and raw content data respectively.
