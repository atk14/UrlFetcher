Change Log
==========

All notable changes to this project will be documented in this file.

[1.7.2] - 2022-09-03
--------------------

* 26a42ef - Method UrlFetcher::_cleanUpUri() fixed
* 93f1e3c - Method UrlFetcher::getContentType() returns null if there is no Content-Type header in the response

[1.7.1] - 2021-12-08
--------------------

* 897b700 - UrlFetcherViaCommand tuned & fixed

[1.7] - 2021-12-03
------------------

* 5033b5f - Added class UrlFetcherViaCommand for fetching data not from network socket but from a command (e.g. scripts/simulate_http_request in an ATK14 project)

[1.6.3] - 2021-07-13
--------------------

- Better error message on an unresolvable domain

[1.6.2] - 2021-02-07
--------------------

- Dependency fixed

[1.6.1] - 2021-02-06
--------------------

- Fix

[1.6] - 2021-02-06
------------------

- UrlFetcher::getContent() returns an instance of StringBufferTemporary

[1.5.1] - 2021-02-05
--------------------

- Memory consumption fixed

[1.5] - 2021-02-05
------------------

- Data is being written to the socket from StringBuffer and not from a string
- Method UrlFetcher::getFilename() improved

[1.4.3] - 2020-12-08
--------------------

- Handled better writing to the socket

[1.4.2] - 2020-02-12
--------------------

- Added jump from the fwrite cycle after reaching a number of errors

[1.4.1] - 2019-10-25
--------------------

- Method UrlFetcher::_cleanUpUri() fixed

[1.4] - 2019-10-21
------------------

- Added cleaning procedure that corrects some URL issues (for example, it converts "http://www.atk14.net/about/../" to "http://www.atk14.net/")

[1.3] - 2018-04-03
------------------

### Added
- PUT and DELETE HTTP requests can be performed by UrlFetcher; added methods put() and delete()

[1.2] - 2018-03-31
------------------

### Added
- Added method UrlFetcher::getStatusMessage()

### Changed
- Method UrlFetcher::getFilename() tries to extract a filename from the Content-Disposition header

[1.1.1] - 2018-03-04
--------------------

### Fixed
- User-Agent format fixed

[1.1] - 2017-11-30
------------------

### Added
- New method added UrlFetcher::getRequestMethod()

[1.0] - 2017-01-24
------------------

- UrlFetcher was extracted from the ATK14 Framework
