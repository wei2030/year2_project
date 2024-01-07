<!--begin::Main wrapper-->
<div
    id="kt_docs_search_handler_basic"

    data-kt-search-keypress="true"
    data-kt-search-min-length="2"
    data-kt-search-enter="true"
    data-kt-search-layout="inline">

    <!--begin::Input Form-->
    <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
        <!--begin::Hidden input(Added to disable form autocomplete)-->
        <input type="hidden"/>
        <!--end::Hidden input-->

        <!--begin::Icon-->
            <!--begin::Svg Icon | path: magnifier-->
        <!--end::Icon-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-lg form-control-solid px-15"
            name="search"
            value=""
            placeholder="Search by username, full name or email..."
            data-kt-search-element="input"/>
        <!--end::Input-->

        <!--begin::Spinner-->
        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
            <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
        </span>
        <!--end::Spinner-->

        <!--begin::Reset-->
        <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
            data-kt-search-element="clear">

            <!--begin::Svg Icon | path: cross-->
        </span>
        <!--end::Reset-->
    </form>
    <!--end::Form-->

    <!--begin::Wrapper-->
    <div class="py-5">
        <!--being::Search suggestion-->
        <div data-kt-search-element="suggestions">
            ...
        </div>
        <!--end::Suggestion wrapper-->

        <!--begin::Search results-->
        <div data-kt-search-element="results" class="d-none">
            ...
        </div>
        <!--end::Search results-->

        <!--begin::Empty search-->
        <div data-kt-search-element="empty" class="text-center d-none">
            ...
        </div>
        <!--end::Empty search-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Main wrapper-->