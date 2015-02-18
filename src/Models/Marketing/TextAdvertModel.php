<?php
namespace Fortifi\Sdk\Models\Marketing;

use Fortifi\FortifiApi\Foundation\Responses\FidResponse;
use Fortifi\FortifiApi\Marketing\Payloads\CreateTextAdvertPayload;
use Fortifi\FortifiApi\Marketing\Payloads\ListAdvertPayload;
use Fortifi\FortifiApi\Marketing\Payloads\UpdateTextAdvertPayload;
use Fortifi\FortifiApi\Marketing\Endpoints\TextAdvertEndpoint;
use Fortifi\FortifiApi\Marketing\Responses\TextAdvertResponse;
use Fortifi\FortifiApi\Marketing\Responses\TextAdvertsResponse;
use Fortifi\FortifiApi\Foundation\Payloads\FidPayload;
use Fortifi\FortifiApi\Foundation\Responses\BoolResponse;
use Fortifi\Sdk\Models\Api\FortifiApiModel;

class TextAdvertModel extends FortifiApiModel
{
  /**
   * @param string $companyFid
   * @param int    $limit
   * @param int    $page
   * @param string $sortField
   * @param string $sortDirection
   * @param int    $showDeleted
   * @param string $filter
   *
   * @return TextAdvertsResponse
   */
  public function all(
    $companyFid, $limit = null, $page = null,
    $sortField = null, $sortDirection = null,
    $showDeleted = null, $filter = null
  )
  {
    $payload                = new ListAdvertPayload();
    $payload->companyFid    = $companyFid;
    $payload->limit         = $limit;
    $payload->page          = $page;
    $payload->sortField     = $sortField;
    $payload->sortDirection = $sortDirection;
    $payload->showDeleted   = $showDeleted;
    $payload->filter        = $filter;

    $ep = TextAdvertEndpoint::bound($this->getApi());
    return $ep->all($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return TextAdvertResponse
   */
  public function retrieve($fid)
  {
    $payload      = new FidPayload();
    $payload->fid = $fid;

    $ep = TextAdvertEndpoint::bound($this->getApi());
    return $ep->retrieve($payload)->get();
  }

  /**
   * @param string $displayName
   * @param string $action
   * @param string $companyFid
   * @param string $language
   * @param string $headline
   * @param string $lineOne
   * @param string $lineTwo
   * @param string $displayUrl
   *
   * @return FidResponse
   */
  public function create($displayName, $action, $companyFid, $language,
    $headline, $lineOne, $lineTwo, $displayUrl
  )
  {
    $payload              = new CreateTextAdvertPayload();
    $payload->displayName = $displayName;
    $payload->action      = $action;
    $payload->companyFid  = $companyFid;
    $payload->language    = $language;
    $payload->headline    = $headline;
    $payload->lineOne     = $lineOne;
    $payload->lineTwo     = $lineTwo;
    $payload->displayUrl  = $displayUrl;

    $ep = TextAdvertEndpoint::bound($this->getApi());
    return $ep->create($payload)->get();
  }

  /**
   * @param string $fid
   * @param string $displayName
   * @param string $action
   * @param string $companyFid
   * @param string $language
   * @param string $headline
   * @param string $lineOne
   * @param string $lineTwo
   * @param string $displayUrl
   *
   * @return BoolResponse
   */
  public function update($fid, $displayName, $action, $companyFid,
    $language, $headline, $lineOne, $lineTwo, $displayUrl
  )
  {
    $payload              = new UpdateTextAdvertPayload();
    $payload->fid         = $fid;
    $payload->displayName = $displayName;
    $payload->action      = $action;
    $payload->companyFid  = $companyFid;
    $payload->language    = $language;
    $payload->headline    = $headline;
    $payload->lineOne     = $lineOne;
    $payload->lineTwo     = $lineTwo;
    $payload->displayUrl  = $displayUrl;

    $ep = TextAdvertEndpoint::bound($this->getApi());
    return $ep->update($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return BoolResponse
   */
  public function delete($fid)
  {
    $payload      = new FidPayload();
    $payload->fid = $fid;

    $ep = TextAdvertEndpoint::bound($this->getApi());
    return $ep->delete($payload)->get();
  }

  /**
   * @param string $fid
   *
   * @return BoolResponse
   */
  public function restore($fid)
  {
    $payload = FidPayload::create($fid);

    $ep = TextAdvertEndpoint::bound($this->getApi());
    return $ep->restore($payload)->get();
  }
}
