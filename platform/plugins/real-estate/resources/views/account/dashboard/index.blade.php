@extends('plugins/real-estate::account.layouts.skeleton')
@section('content')
<!-- retrouveIndexAfficherMonCompte -->
<div class="dashboard crop-avatar">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb-3 dn db-ns">
        <div class="mb3">
          <div class="sidebar-profile">
            <div class="avatar-container mb-2">
              <div class="profile-image">
                <div class="avatar-view mt-card-avatar mt-card-avatar-circle" style="max-width: 150px">
                  <img src="{{ $user->avatar->url ? RvMedia::getImageUrl($user->avatar->url, 'thumb') : $user->avatar_url }}" alt="{{ $user->name }}" class="br-100" style="width: 150px;">
                  <div class="mt-overlay br2">
                    <span><i class="fa fa-edit"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="f4 b">{{ $user->name }}</div>
            <div class="f6 mb3 light-gray-text">
              <i class="fas fa-envelope mr2"></i><a href="mailto:{{ $user->email }}" class="gray-text">{{ $user->email }}</a>
            </div>
            <div class="mb3">
              <div class="light-gray-text mb2">
                <i class="fas fa-calendar-alt mr2"></i>{{ trans('plugins/real-estate::dashboard.joined_on', ['date' => $user->created_at->format('F d, Y')]) }}
              </div>
              @if ($user->dob)
              <div class="light-gray-text mb2">
                <i class="fas fa-child mr2"></i>{{ trans('plugins/real-estate::dashboard.dob', ['date' => $user->dob->format('F d, Y')]) }}
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-9 mb-3">
        <div class="container">
          @if(auth('account')->user()->status)
          {!! apply_filters(ACCOUNT_TOP_STATISTIC_FILTER, null) !!}
          <div class="row">
            <div class="col-md-4">
              <div class="white">
                <div class="br2 pa3 bg-light-blue mb3" style="box-shadow: 0 1px 1px #ccc;">
                  <div class="media-body">
                    <div class="f3">
                      <span class="fw6">{{ $user->properties()->where('moderation_status', \Botble\RealEstate\Enums\ModerationStatusEnum::APPROVED)->count() }}</span>
                      <span class="fr"><i class="far fa-check-circle"></i></span>
                    </div>
                    <p>{{ trans('plugins/real-estate::dashboard.approved_properties') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="white">
                <div class="br2 pa3 bg-light-red mb3" style="box-shadow: 0 1px 1px #ccc;">
                  <div class="media-body">
                    <div class="f3">
                      <span class="fw6">{{ $user->properties()->where('moderation_status', \Botble\RealEstate\Enums\ModerationStatusEnum::PENDING)->count() }}</span>
                      <span class="fr"><i class="fas fa-user-clock"></i></span>
                    </div>
                    <p>{{ trans('plugins/real-estate::dashboard.pending_approve_properties') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="white">
                <div class="br2 pa3 bg-light-silver mb3" style="box-shadow: 0 1px 1px #ccc;">
                  <div class="media-body">
                    <div class="f3">
                      <span class="fw6">{{ $user->properties()->where('moderation_status', \Botble\RealEstate\Enums\ModerationStatusEnum::REJECTED)->count() }}</span>
                      <span class="fr"><i class="far fa-edit"></i></span>
                    </div>
                    <p>{{ trans('plugins/real-estate::dashboard.rejected_properties') }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mr-2 ml-2 ">
            @livewire('programing.filtre-programing')
          </div>
        </div>
        @endif
        @if(!auth('account')->user()->status)
          <div class="container">
            <div class="container shadow " style="background-color: white;">
              <div class="row alert alert-dark ml-2 mr-2">
                <span>{{ $user->name }}</span>
              </div>
              <div class="row">
                <span class="fst-italic">
                  <p class="text-justify mt-4">
                    Nous tenons à vous informer que, actuellement, votre statut dans notre système ne vous désigne pas en tant qu'agent autorisé.
                    Cependant, nous sommes toujours ravis d'accueillir de nouveaux agents au sein de notre réseau. Si vous êtes intéressé à devenir un agent autorisé de notre entreprise, nous vous encourageons vivement à soumettre une demande.
                  </p>
                  <p class="mt-4">
                    Vous pouvez le faire en nous contactant à [adresse e-mail ou numéro de téléphone] et en fournissant les informations nécessaires pour que nous puissions examiner votre demande.
                    Nous apprécions votre intérêt à représenter notre entreprise et nous sommes impatients de discuter davantage de cette opportunité avec vous.
                  </p>
                </span>
              </div>
              <div class="row ">
                <div>
                  <button class="btn btn-outline-primary float-end mb-3 become-agent-modal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Devenir agent
                  </button>
                  <input type="hidden" id="username" value="{{ auth('account')->user()->username }}">
                  <input type="hidden" id="user_id" value="{{ auth('account')->user()->id }}">
                  <input type="hidden" id="user_email" value="{{ auth('account')->user()->email }}">
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
  @include('plugins/real-estate::account.modals.avatar')
  @livewireScripts
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header bg bg-secondary pt-1 pb-1">
        <h5 class="modal-title " id="exampleModalLabel">Devenir agent imobilier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="">
              <div class="processed-message text-uppercase text-center fst-italic hide" style="display: none;">
                <span id="success-info"> Demande en cours d'envoie .... </span>
              </div>
              <div class="container mt-2">
                <span class="fw-bold fst-italic text-primary float-end text-uppercase success-message" style="display: none;"> La demande a été envoyée avec succés </span>
              </div>
          </div>
        </div>
        <div class="container modal-document">
          <div class="row">
            <input class="mt-3" type="hidden" id="username_input">
            <input class="mt-3" type="hidden" id="user_id_input">
          </div>
          <div class="row">
            <div>
              <label>Type du document</label>
              <select class="form-control" name="" id="document-type">
                <option value="cnib"> CNIB</option>
                <option value="passport">PASSPORT</option>
              </select>
            </div>

            <div>
              <div class="mt-3 alert alert-danger">
                <label for="imageUpload" class="form-label">Document</label>
                <input type="file" class="form-control" id="document-file" name="imageUpload" accept="image/*">
              </div>
            </div>

            <div>
              <div class="mt-2 alert alert-danger">
                <label for="imageUpload" class="form-label">Photo d'identité</label>
                <input type="file" class="form-control" id="avatar-file" name="imageUpload" accept="image/*">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="close-btn" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary save-become-agent-data" id="save-become-agent-data">Enregistrer</button>
        <button type="button" class="btn btn-primary disabled" style="display: none;">Enregistrement . . .</button>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/addjs.js')}}"></script>
@endsection