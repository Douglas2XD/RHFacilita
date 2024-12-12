
{{---

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h3>{{ __('Clima Organizacional') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clima.store') }}">
                        @csrf

                        <!-- Pergunta 1 -->
                        <div class="mb-4">
                            <label for="pergunta1" class="form-label">{{ __('1. Você se sente motivado a trabalhar na nossa empresa?') }}</label>
                            <select id="pergunta1" name="pergunta1" class="form-select @error('pergunta1') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta1')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 2 -->
                        <div class="mb-4">
                            <label for="pergunta2" class="form-label">{{ __('2. A comunicação interna na empresa é clara e eficiente?') }}</label>
                            <select id="pergunta2" name="pergunta2" class="form-select @error('pergunta2') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta2')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 3 -->
                        <div class="mb-4">
                            <label for="pergunta3" class="form-label">{{ __('3. Você sente que suas opiniões são ouvidas e valorizadas?') }}</label>
                            <select id="pergunta3" name="pergunta3" class="form-select @error('pergunta3') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta3')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 4 -->
                        <div class="mb-4">
                            <label for="pergunta4" class="form-label">{{ __('4. Você tem as ferramentas e recursos necessários para realizar o seu trabalho?') }}</label>
                            <select id="pergunta4" name="pergunta4" class="form-select @error('pergunta4') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta4')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 5 -->
                        <div class="mb-4">
                            <label for="pergunta5" class="form-label">{{ __('5. A carga de trabalho é equilibrada?') }}</label>
                            <select id="pergunta5" name="pergunta5" class="form-select @error('pergunta5') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta5')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 6 -->
                        <div class="mb-4">
                            <label for="pergunta6" class="form-label">{{ __('6. Você está satisfeito com o ambiente de trabalho?') }}</label>
                            <select id="pergunta6" name="pergunta6" class="form-select @error('pergunta6') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta6')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 7 -->
                        <div class="mb-4">
                            <label for="pergunta7" class="form-label">{{ __('7. Você acredita que existe um bom relacionamento entre os colegas de trabalho?') }}</label>
                            <select id="pergunta7" name="pergunta7" class="form-select @error('pergunta7') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta7')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 8 -->
                        <div class="mb-4">
                            <label for="pergunta8" class="form-label">{{ __('8. Você se sente reconhecido pelos seus esforços e conquistas?') }}</label>
                            <select id="pergunta8" name="pergunta8" class="form-select @error('pergunta8') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta8')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 9 -->
                        <div class="mb-4">
                            <label for="pergunta9" class="form-label">{{ __('9. Você tem oportunidades de crescimento e desenvolvimento profissional?') }}</label>
                            <select id="pergunta9" name="pergunta9" class="form-select @error('pergunta9') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta9')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Pergunta 10 -->
                        <div class="mb-4">
                            <label for="pergunta10" class="form-label">{{ __('10. Você está satisfeito com o equilíbrio entre vida pessoal e profissional?') }}</label>
                            <select id="pergunta10" name="pergunta10" class="form-select @error('pergunta10') is-invalid @enderror" required>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                                <option value="as vezes">Às vezes</option>
                            </select>
                            @error('pergunta10')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Botão de Enviar -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                {{ __('Enviar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




---}}