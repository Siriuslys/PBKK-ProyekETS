<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Subscription Plan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your subscription plan.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.plan') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
    
        <div>
            <x-input-label for="package" :value="__('Subscription Plan')" />
            <select id="package" name="package" class="mt-1 block w-full" onchange="togglePaymentSection()">
                <option value="0" {{ $user->package == 0 ? 'selected' : '' }}>Public</option>
                <option value="1" {{ $user->package == 1 ? 'selected' : '' }}>Premium</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('package')" />
        </div>
    
        <!-- Payment Section (shown if Premium is selected) -->
        <div id="payment-section" style="display: none;" class="mt-4">
            <p class="text-sm text-gray-600">{{ __("To upgrade to Premium, please enter your payment details below.") }}</p>
            
            <div>
                <x-input-label for="card_number" :value="__('Card Number')" />
                <x-text-input id="card_number" name="card_number" type="text" class="mt-1 block w-full" required />
                <x-input-error class="mt-2" :messages="$errors->get('card_number')" />
            </div>
    
            <div>
                <x-input-label for="expiry_date" :value="__('Expiry Date')" />
                <x-text-input id="expiry_date" name="expiry_date" type="text" class="mt-1 block w-full" placeholder="MM/YY" required />
                <x-input-error class="mt-2" :messages="$errors->get('expiry_date')" />
            </div>
    
            <div>
                <x-input-label for="cvv" :value="__('CVV')" />
                <x-text-input id="cvv" name="cvv" type="text" class="mt-1 block w-full" required />
                <x-input-error class="mt-2" :messages="$errors->get('cvv')" />
            </div>
        </div>
    
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
    
            @if (session('status') === 'plan-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Plan Updated.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    function togglePaymentSection() {
        var packageSelect = document.getElementById("package");
        var paymentSection = document.getElementById("payment-section");
        var cardNumberInput = document.getElementById("card_number");
        var expiryDateInput = document.getElementById("expiry_date");
        var cvvInput = document.getElementById("cvv");

        // Log the selected package value to the console
        console.log("Selected package:", packageSelect.value);

        if (packageSelect.value == "1") {
            paymentSection.style.display = "block"; // Show payment section if Premium is selected
            
            // Add required attribute
            cardNumberInput.setAttribute("required", "required");
            expiryDateInput.setAttribute("required", "required");
            cvvInput.setAttribute("required", "required");
        } else {
            paymentSection.style.display = "none"; // Hide payment section if Public is selected
            
            // Remove required attribute
            cardNumberInput.removeAttribute("required");
            expiryDateInput.removeAttribute("required");
            cvvInput.removeAttribute("required");
        }
    }

    // Run the function on page load to set the correct display state
    window.onload = togglePaymentSection;
</script>

